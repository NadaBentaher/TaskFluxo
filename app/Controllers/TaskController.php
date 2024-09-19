<?php

namespace App\Controllers;
use \App\Models\TaskModel;
use  \App\Models\ProjectModel;
use  \App\Models\UserModel;


class TaskController extends BaseController
{
    public function index()
    {   
        $data['pageTitle'] = 'Task Management';
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getTasksWithDetails();
        return view('task', $data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Task Management';
        $projectModel = new ProjectModel();
        $userModel = new UserModel();
        
        $data['projects'] = $projectModel->findAll();
        // $data['employees'] = $userModel->findAll();
        
        return view('taskCreate', $data);
    }
    public function getEmployeesByDepartment($department)
    {
        $user = new UserModel();
        $employees = $user->where('department', $department)->where('role !=', 'admin')->findAll();
        
        return $this->response->setJSON($employees);
    }
    public function store()
    {
        $taskModel = new TaskModel();
        $data = [
            'task_name' => $this->request->getPost('task_name'),
            'project_id' => $this->request->getPost('project_id'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            // 'status' => $this->request->getPost('status'),
            'priority' => $this->request->getPost('priority'),
            // 'created_at' => date('Y-m-d'), // assuming the current date as creation date
            'due_date' => $this->request->getPost('due_date'),
            'estimated_duration' => $this->request->getPost('estimated_duration'),
        ];
        $taskModel->save($data);
        $this->updateProjectTotalDuration($data['project_id']);
        return redirect('tasks')->with('status', 'Task Inserted Successfully');
    }
    public function edit($id = null)
    {
        $data['pageTitle'] = 'Task Management';

        $taskModel = new TaskModel();
        $projectModel = new ProjectModel();
        $userModel = new UserModel();

        // Fetch the task data
        $data['task'] = $taskModel->find($id);

        // Fetch all projects for the dropdown
        $data['projects'] = $projectModel->findAll();

        // Fetch all employees for the dropdown
        $data['employees'] = $userModel->where('role !=', 'admin')->findAll();

        return view('taskEdit', $data);
    }
    public function update($id = null)
{
    $taskModel = new TaskModel();
    // Get the current data for the task if needed
    // $currentData = $taskModel->find($id);

    $data = [
        'task_name' => $this->request->getPost('task_name'),
        'project_id' => $this->request->getPost('project_id'),
        'assigned_to' => $this->request->getPost('assigned_to'),
        'status' => $this->request->getPost('status'),
        'priority' => $this->request->getPost('priority'),
        'due_date' => $this->request->getPost('due_date'),
        'estimated_duration' => $this->request->getPost('estimated_duration'),
    ];

    // Optionally, retain any current data if necessary
    // $data['created_at'] = $currentData['created_at'];

    $taskModel->update($id, $data);
    $this->updateProjectTotalDuration($data['project_id']);

    return redirect()->to(base_url('tasks'))->with('status', 'Task Updated Successfully');
}
    public function confirmdelete($id = null)
    {
        $taskModel = new TaskModel();
        $taskModel->delete($id);
        return;
    }

    public function employeeTasks()
    {
        $session = session();
        $userId = $session->get('id');
        $role = $session->get('role');
    
        
        if ($role !== 'employee') {
            return redirect()->to(base_url('/')); // Redirect to home if not an employee
        }
    
        $taskModel = new TaskModel();
        $tasks = $taskModel->where('assigned_to', $userId)->findAll(); // Ensure your tasks table has an 'assigned_to' field
    
     
    
        $data = [
            'tasks' => $tasks
        ];
    
        // echo view('common/header');
        
        return view('employee_tasks', $data);
        // echo view('common/footer');
    }
    public function updateStatus($taskId)
    {
        $taskModel = new TaskModel();
        $data = [
            'status' => $this->request->getPost('status'),
            'estimated_duration' => $this->request->getPost('estimated_duration')
        ];
    
        $taskModel->update($taskId, $data);
    
        return redirect()->to(base_url('employeeTasks'))->with('status', 'Task updated successfully.');
    }
    
private function updateProjectTotalDuration($project_id)
    {
        $taskModel = new TaskModel();
        $projectModel = new ProjectModel();
        $tasks = $taskModel->where('project_id', $project_id)->findAll();
        $totalMinutes = 0;

        foreach ($tasks as $task) {
            $duration = $task['estimated_duration'];
            $parts = explode(' ', $duration);

            if (count($parts) == 2) {
                // Format is "D HH:MM"
                $days = (int)$parts[0];
                list($hours, $minutes) = explode(':', $parts[1]);
            } else {
                // Format is "HH:MM"
                $days = 0;
                list($hours, $minutes) = explode(':', $parts[0]);
            }

            $totalMinutes += ($days * 24 * 60) + ($hours * 60) + $minutes;
        }

        // Convert total minutes back to "D HH:MM" format
        $totalDays = floor($totalMinutes / (24 * 60));
        $totalMinutes %= (24 * 60);
        $totalHours = floor($totalMinutes / 60);
        $totalMinutes %= 60;

        $totalDuration = ($totalDays > 0 ? $totalDays . ' ' : '') . sprintf('%02d:%02d', $totalHours, $totalMinutes);

        $projectModel->update($project_id, ['total_duration' => $totalDuration]);
    }
    // public function createTask(){
    //     $projectModel = new ProjectModel();
    //     $userModel = new UserModel();
        
    //     $data['projects'] = $projectModel->findAll();
    //     return view('createTask',$data);
    // }
    public function createTask()
{
    $session = session();
    $userId = $session->get('id');
    $userModel = new UserModel();
    $projectModel = new ProjectModel();

    // Fetch the logged-in user's department
    $user = $userModel->find($userId);
    $userDepartment = $user['department'];

    // Fetch projects that belong to the user's department
    $projects = $projectModel->where('department', $userDepartment)->findAll();

    // Pass the necessary data to the view
    $data = [
        'pageTitle' => 'Add Task',
        'projects' => $projects,
        'logged_in_employee_id' => $userId, // Pass the logged-in user's ID to the view
        'logged_in_employee_name' => $user['name'] // Pass the employee's name for display
    ];

    return view('createTask', $data);
}

    public function storeTask()
{
    $taskModel = new TaskModel();
    $data = [
        'task_name' => $this->request->getPost('task_name'),
        'project_id' => $this->request->getPost('project_id'),
        'assigned_to' => $this->request->getPost('assigned_to'),
        'priority' => $this->request->getPost('priority'),
        'due_date' => $this->request->getPost('due_date'),
        'estimated_duration' => $this->request->getPost('estimated_duration'),
    ];
    echo 'Assigned to: ' . $data['assigned_to']; // Debugging statement

    // Check if assigned_to exists in users table
    $userModel = new UserModel();
    if (!$userModel->find($data['assigned_to'])) {
        return redirect()->back()->with('error', 'Assigned user does not exist');
    }

    $taskModel->save($data);
    $this->updateProjectTotalDuration($data['project_id']);
    return redirect('employeeTasks')->with('status', 'Task Inserted Successfully');
}
}