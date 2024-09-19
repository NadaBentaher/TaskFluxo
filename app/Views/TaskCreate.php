<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<?php $pageTitle = 'Task Data'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card mt-0">
                <div class="card-body">
                    <a href="<?= base_url('tasks'); ?>" class="btn btn-secondary mb-3">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                    <form method="post" action="<?= base_url("tasks/add"); ?>">
                        <h1 class="text-center">Add Task</h1>

                        <div class="mb-3">
                            <label for="task_name" class="form-label"><i class="bi bi-file-earmark-text"></i> Task Name</label>
                            <input name="task_name" type="text" class="form-control" id="task_name" placeholder="Task Name" value="<?= old('task_name') ?>">
                        </div>

                        <div class="mb-3">
                            <label for="project_id" class="form-label"><i class="bi bi-projector"></i> Project</label>
                            <select name="project_id" class="form-control" id="project_id">
                                <option value="">Select Project</option>
                                <?php foreach($projects as $project): ?>
                                    <option value="<?= $project['project_id']; ?>" data-department="<?= $project['department']; ?>">
                                        <?= $project['project_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="assigned_to" class="form-label"><i class="bi bi-person"></i> Assigned To</label>
                            <select name="assigned_to" class="form-control" id="assigned_to">
                                <option value="">Select Employee</option>
                                <!-- Options will be populated based on project selection -->
                            </select>
                        </div>
                        
                        <div class="mb-3">
                           <label for="estimated_duration">Estimated duration (format HH:MM ou J HH:MM)</label>
                                <input type="text" id="estimated_duration" name="estimated_duration" class="form-control" placeholder="e.g., 2:30 or 1 04:30" required>

                        </div>

                        <div class="mb-3">
                            <label for="priority" class="form-label"><i class="bi bi-star"></i> Priority</label>
                            <select name="priority" class="form-control" id="priority">
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="due_date" class="form-label"><i class="bi bi-calendar2-event"></i> Due Date</label>
                            <input name="due_date" type="date" class="form-control" id="due_date" value="<?= old('due_date') ?>">
                        </div>

                        <div class="mb-3 text-center">
                            <input type="submit" value="Save" class="btn btn-dark" />
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
