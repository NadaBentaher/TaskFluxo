<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->setAutoRoute(true);

$routes->get('login', 'Login::index');
$routes->get('register', 'Register::index');

$routes->post('login', 'Login::do_login');
$routes->post('register/do_register', 'Register::do_register');

// $routes->get('admin','UserController::index');

$routes->get('logout','Login::logout');
$routes->get('employees','EmployeeController::index');
$routes->get('employees/create','EmployeeController::create');
$routes->post('employees/add','EmployeeController::store');
$routes->get('employee/edit/(:num)','EmployeeController::edit/$1');
$routes->put('employee/update/(:num)','EmployeeController::update/$1');
$routes->get('employee/delete/(:num)','EmployeeController::delete/$1');
$routes->get('employee/confirm-delete/(:num)', 'EmployeeController::confirmdelete/$1');

$routes->get('projects','ProjectController::index');
$routes->get('projects/create','ProjectController::create');
$routes->post('projects/add','ProjectController::store');
$routes->get('project/edit/(:num)','ProjectController::edit/$1');
$routes->put('project/update/(:num)','ProjectController::update/$1');
$routes->get('project/delete/(:num)','ProjectController::delete/$1');
$routes->get('project/confirm-delete/(:num)', 'ProjectController::confirmdelete/$1');


$routes->get('tasks','TaskController::index');
$routes->get('tasks/create','TaskController::create');
$routes->get('tasks/getEmployeesByDepartment/(:segment)', 'TaskController::getEmployeesByDepartment/$1');
$routes->post('tasks/add','TaskController::store');
$routes->get('task/edit/(:num)','TaskController::edit/$1');
$routes->put('task/update/(:num)','TaskController::update/$1');
$routes->get('task/delete/(:num)','TaskController::delete/$1');
$routes->get('task/confirm-delete/(:num)', 'TaskController::confirmdelete/$1');

$routes->get('admin', 'DashController::index');
$routes->get('employeeTasks', 'TaskController::employeeTasks');
$routes->post('tasks/updateStatus/(:num)', 'TaskController::updateStatus/$1');

$routes->get('employeeTasks/create', 'TaskController::createTask');
$routes->post('employeeTasks/add','TaskController::storeTask');
$routes->get('about', 'Home::about');

// $routes->get('profile/edit', 'ProfileController::edit');


// $routes->get('profile/edit', 'ProfileController::editProfile');
// $routes->get('profile/change_password', 'ProfileController::changePassword');
// $routes->post('profile/update', 'ProfileController::updateProfile');
// $routes->post('profile/update_password', 'ProfileController::updatePassword');

