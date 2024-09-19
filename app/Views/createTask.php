<?= $this->extend('layout/home-layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <!-- Image Section -->
        <div class="col-md-6 pr-md-4"> <!-- Add padding-right here -->
            <img src="<?= base_url('public/images/taskimage.png') ?>" alt="Task Image" class="img-fluid floating bouncing" style="width: 100%; height: auto;">
        </div>

        <!-- Form Section -->
        <div class="col-md-6">
            <div class="card mt-0">
                <div class="card-body">
                    <a href="<?= base_url('employeeTasks'); ?>" class="btn btn-secondary mb-3">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                    <form method="post" action="<?= base_url("employeeTasks/add"); ?>">
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
                            <label for="assigned_to_name" class="form-label"><i class="bi bi-person"></i> Assigned To</label>
                            <input type="text" name="assigned_to_name" class="form-control" id="assigned_to_name" value="<?= $logged_in_employee_name ?>" readonly>
                            <input type="hidden" name="assigned_to" id="assigned_to" value="<?= $logged_in_employee_id ?>"> <!-- Use the ID of the logged-in user -->
                        </div>

                        <div class="mb-3">
                            <label for="estimated_duration">Estimated duration (format HH:MM or D HH:MM)</label>
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
<br>
<br>
<script>
document.getElementById('project_id').addEventListener('change', function() {
    var projectSelect = this;
    var department = projectSelect.options[projectSelect.selectedIndex].getAttribute('data-department');

    fetch('<?= base_url("tasks/getEmployeesByDepartment") ?>/' + department)
        .then(response => response.json())
        .then(data => {
            var employeeSelect = document.getElementById('assigned_to');
            employeeSelect.innerHTML = '';

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
