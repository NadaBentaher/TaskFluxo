<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table      = 'projects';
    protected $primaryKey = 'project_id';
    protected $allowedFields = ['project_name', 'status','department','created_at','deadline','total_duration'];

   
}