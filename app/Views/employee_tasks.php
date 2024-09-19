<?= $this->extend('layout/home-layout') ?>
<?= $this->section('content') ?>
<style>
    .card-title, .card-text, .card-body small {
        color: #000 !important; /* Ensure text color is black */
    }
 

.footer {
    margin-top: auto;
}

</style>
<div class="container mt-5">
    <?php if (session()->getFlashdata('status')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> <?= session()->getFlashdata('status') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="row">
            <div class="col-md-6 pr-md-4">
                <!-- Display the image with floating and bouncing animations -->
                <img src="<?= base_url('public/images/taskimage.png') ?>" alt="Task Image" class="img-fluid floating bouncing" style="width: 100%; height: auto;">
            </div>
            <div class="col-md-6 pl-md-4">
                <h1 class="text-center" style="color: #F1C40F;">My Tasks
                    <a href="<?= base_url('employeeTasks/create') ?>" class="btn btn-success btn-sm float-end">Add</a>
                </h1><br>
                <?php if (!empty($tasks)): ?>
                    <?php foreach ($tasks as $task): ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title"><?= esc($task['task_name']) ?></h5>
                                    <button class="btn btn-info btn-sm" onclick="toggleEditForm(<?= $task['task_id'] ?>)">Edit</button>
                                </div>
                                <p class="card-text" id="status-display-<?= $task['task_id'] ?>"><?= esc($task['status']) ?></p>
                                <form id="edit-form-<?= $task['task_id'] ?>" class="edit-form" style="display:none;" action="<?= base_url('tasks/updateStatus/' . $task['task_id']) ?>" method="post">
                                    <select name="status" class="form-control">
                                        <option value="To Do" <?= $task['status'] == 'To Do' ? 'selected' : '' ?>>To Do</option>
                                        <option value="In Progress" <?= $task['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                                        <option value="Completed" <?= $task['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                                    </select>
                                    <input type="text" name="estimated_duration" class="form-control mt-2" value="<?= esc($task['estimated_duration']) ?>" placeholder="Estimated Duration">
                                    <button type="submit" class="btn btn-success btn-sm mt-2">Save</button>
                                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="toggleEditForm(<?= $task['task_id'] ?>)">Cancel</button>
                                </form>
                                <p class="card-text"><small class="text-muted"><?= esc($task['priority']) ?></small></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center"><h5>No tasks assigned.</h5></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <br>
    <br>
    <script>
        function toggleEditForm(taskId) {
            const statusDisplay = document.getElementById('status-display-' + taskId);
            const editForm = document.getElementById('edit-form-' + taskId);
            const isFormVisible = editForm.style.display === 'block';

            statusDisplay.style.display = isFormVisible ? 'block' : 'none';
            editForm.style.display = isFormVisible ? 'none' : 'block';
        }
    </script>
<?= $this->endSection(); ?>
