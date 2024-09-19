<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskMOdel extends Model
{// Define the table name
    protected $table      = 'tasks';
    
    // Define the primary key
    protected $primaryKey = 'task_id';
    
    // Define allowed fields for mass assignment
    protected $allowedFields = [
        'task_name', 
        'project_id',
        'estimated_duration',
        'assigned_to', 
        'status', 
        'priority', 
        'due_date', 
        'created_at'
    ];

    public function getTasksWithDetails()
    {
        return $this->select('tasks.*, projects.project_name, users.name as assigned_to_name')
                    ->join('projects', 'projects.project_id = tasks.project_id')
                    ->join('users', 'users.id = tasks.assigned_to')
                    ->findAll();
    }

   
}