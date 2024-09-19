
<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<?php $pageTitle = 'Task Data'; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card mt-0">
                <div class="card-body">
                    <form method="post" action="<?= base_url('task/update/'.$task['task_id']) ?>">
                        <a href="<?= base_url('tasks'); ?>" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        <h1 class="text-center">Edit Task</h1>
                        <input type="hidden" name="_method" value="PUT" />

                        <div class="mb-3">
                            <label for="task_name" class="form-label"><i class="bi bi-file-earmark-text"></i> Task Name</label>
                            <input name="task_name" type="text" value="<?= $task['task_name']; ?>" class="form-control" id="task_name" placeholder="Task Name" value="<?= old('task_name') ?>">
                        </div>

                        <div class="mb-3">
                            <label for="project_id" class="form-label"><i class="bi bi-projector"></i> Project</label>
                            <select name="project_id" class="form-control" id="project_id">
                                <option value="">Select Project</option>
                                <?php foreach ($projects as $project): ?>
                                    <option value="<?= $project['project_id']; ?>" <?= $project['project_id'] == $task['project_id'] ? 'selected' : '' ?> data-department="<?= $project['department']; ?>">
                                        <?= $project['project_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="assigned_to" class="form-label"><i class="bi bi-person"></i> Assigned To</label>
                            <select name="assigned_to" class="form-control" id="assigned_to">
                                <option value="">Select Employee</option>
                                <?php foreach ($employees as $employee): ?>
                                    <option value="<?= $employee['id']; ?>" <?= $employee['id'] == $task['assigned_to'] ? 'selected' : '' ?>>
                                        <?= $employee['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label"><i class="bi bi-flag"></i> Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="To Do" <?= $task['status'] == 'To Do' ? 'selected' : '' ?>>To Do</option>
                                <option value="In Progress" <?= $task['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                                <option value="Completed" <?= $task['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="priority" class="form-label"><i class="bi bi-star"></i> Priority</label>
                            <select name="priority" class="form-control" id="priority">
                                <option value="Low" <?= $task['priority'] == 'Low' ? 'selected' : '' ?>>Low</option>
                                <option value="Medium" <?= $task['priority'] == 'Medium' ? 'selected' : '' ?>>Medium</option>
                                <option value="High" <?= $task['priority'] == 'High' ? 'selected' : '' ?>>High</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="due_date" class="form-label"><i class="bi bi-calendar2-event"></i> Due Date</label>
                            <input name="due_date" type="date" value="<?= $task['due_date']; ?>" class="form-control" id="due_date" placeholder="Task Due Date" value="<?= old('due_date') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="estimated_duration" class="form-label"><i class="bi bi-clock"></i> Estimated Duration (format HH:MM or J HH:MM)</label>
                            <input name="estimated_duration" type="text" value="<?= $task['estimated_duration']; ?>" class="form-control" id="estimated_duration" placeholder="Estimated Duration" value="<?= old('estimated_duration') ?>">
                        </div>
                        <div class="mb-3 text-center">
                            <input type="submit" value="Update" class="btn btn-dark" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('project_id').addEventListener('change', function() {
    var projectSelect = this;
    var department = projectSelect.options[projectSelect.selectedIndex].getAttribute('data-department');

    fetch('<?= base_url("tasks/getEmployeesByDepartment") ?>/' + department)
        .then(response => response.json())
        .then(data => {
            var employeeSelect = document.getElementById('assigned_to');
            employeeSelect.innerHTML = '<option value="">Select Employee</option>';

            data.forEach(employee => {
                var option = document.createElement('option');
                option.value = employee.id;
                option.text = employee.name;
                employeeSelect.appendChild(option);
            });
        });
});
</script>

<?= $this->endSection(); ?>
