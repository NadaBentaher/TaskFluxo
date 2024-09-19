<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\ProjectModel;
use App\Models\UserModel;

class DashController extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $projectModel = new ProjectModel();
        $employeeModel = new UserModel();

        // Assuming 'role' field exists in UserModel and 'employee' is a role
        $totalEmployees = $employeeModel->where('role', 'employee')->countAllResults();

        $data = [
            'pageTitle' => 'Dashboard',
            'totalTasks' => $taskModel->countAll(),
            'tasksByStatus' => $taskModel->select('status, COUNT(*) as count')->groupBy('status')->findAll(),
            'totalProjects' => $projectModel->countAll(),
            'projectsByStatus' => $projectModel->select('status, COUNT(*) as count')->groupBy('status')->findAll(),
            'totalEmployees' => $totalEmployees,
            'tasksByPriority' => $taskModel->select('priority, COUNT(*) as count')->groupBy('priority')->findAll(),
            'upcomingDeadlines' => $taskModel->where('due_date >', date('Y-m-d'))->orderBy('due_date', 'ASC')->findAll(5), // Show top 5 upcoming deadlines
            // 'recentActivities' => $taskModel->orderBy('updated_at', 'DESC')->findAll(5), // Show top 5 recent activities
        ];

        return view('adminpanel', $data);
    }
}
