<?php

namespace App\Controllers;
use \App\Models\ProjectModel;

class ProjectController extends BaseController
{
    public function index()

    {   $data['pageTitle'] = 'Project Management';
        $project = new ProjectModel();
        $data['projects'] = $project->findAll();
        return view('project',$data);
    }
    public function create(){
        $data['pageTitle'] = 'Project Management';
        return view('projectCreate',$data);
    }
    public function store()
    {
        $project = new ProjectModel();
        $data = [
            'project_name' => $this->request->getPost('project_name'),
            // 'status' => $this->request->getPost('status'),
            'department' => $this->request->getPost('department'),
            // 'created_at' => date('Y-m-d'), // assuming the current date as creation date
            'deadline' => $this->request->getPost('deadline'),
        ];
        $project->save($data);
        return redirect('projects')->with('status', 'Project Inserted Successfully');
    }
   
    public function edit($id = null)
    {
        $data['pageTitle'] = 'Project Management';
        $project = new ProjectModel();
        $data['project'] = $project->find($id);
        return view('projectEdit', $data);


    }
    public function update($id = null)
{
    $projectModel = new ProjectModel();
    // $currentData = $projectModel->find($id);

    $data = [
        'project_name' => $this->request->getPost('project_name'),
        'status' => $this->request->getPost('status'),
        'department' => $this->request->getPost('department'),
        'deadline' => $this->request->getPost('deadline'),
    ];

    // // Retain the current created_at value
    // $data['created_at'] = $currentData['created_at'];

    $projectModel->update($id, $data);
    return redirect()->to(base_url('projects'))->with('status', 'Project Updated Successfully');
}
public function delete($id = null)
{
    $project = new ProjectModel();
    $project->delete($id);
    return redirect()->back()->with('status','Project Deleted Successfully');
}
public function confirmdelete($id = null)
{
    $project = new ProjectModel();
    $project->delete($id);
    return;
}


}
