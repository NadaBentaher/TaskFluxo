<?php

namespace App\Controllers;
use \App\Models\UserModel;

class EmployeeController extends BaseController
{
    public function index()
    {   $data['pageTitle'] = 'Employee Management';
        $employee = new UserModel();
        $data['employees'] = $employee->where('role !=', 'admin')->findAll();
        return view('employee',$data);
    }
    public function create(){
        $data['pageTitle'] = 'Employee Management';
        return view('create',$data);
    }
    public function store()
    {
        $employees = new UserModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hash the password
            'Mobile_Number' => $this->request->getPost('Mobile_Number'),
            'department' => $this->request->getPost('department'),
            'role' => $this->request->getPost('role'),
        ];
        $employees->save($data);
        return redirect('employees')->with('status','Inserted Successfully');
    }
    public function edit($id = null)
    {   
        $data['pageTitle'] = 'Employee Management';
        $employee= new UserModel();
        $data['employee']= $employee->find($id);
        return view('edit',$data);

    }
    public function update($id = null){
        $employee = new UserModel();
        $currentData = $employee->find($id);

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            //'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hash the password
            'Mobile_Number' => $this->request->getPost('Mobile_Number'),
            'department' => $this->request->getPost('department'),
            'role' => $this->request->getPost('role'),
        ];

        // Check if the password field is filled
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            // Hash the new password and add it to the data array
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        } else {
            // If the password is not filled, retain the current password
            $data['password'] = $currentData['password'];
        }
            $employee->update($id,$data);
            return redirect()->to(base_url('employees'))->with('status','Employee Updated Successfully');
        }
    public function delete($id = null)
    {
        $employee = new UserModel();
        $employee->delete($id);
        return redirect()->back()->with('status','Student Deleted Successfully');
    }
    public function confirmdelete($id = null)
    {
        $employee = new UserModel();
        $employee->delete($id);
        return;
    }
    
}
