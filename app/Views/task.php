
<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<?php $pageTitle = 'Task Data'; ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <?php if (session()->getFlashdata('status')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?= session()->getFlashdata('status') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0 text-center flex-grow-1">Task Data</h3>
                <a href="<?= base_url('tasks/create') ?>" class="btn btn-success btn-md">Add</a>
            </div>

            <div class="card-body">
                <table class="table  table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <!-- <th scope="col"><i class="bi bi-hash"></i> ID</th> -->
                            <th scope="col"><i class="bi bi-file-earmark-text"></i> Task Name</th>
                            <th scope="col"><i class="bi bi-projector"></i> Project</th>
                            <th scope="col"><i class="bi bi-person"></i> Assigned To</th>
                            <th scope="col"><i class="bi bi-flag"></i> Status</th>
                            <th scope="col"><i class="bi bi-star"></i> Priority</th>
                            <!-- <th scope="col"><i class="bi bi-calendar"></i> Created At</th> -->
                            <th scope="col"><i class="bi bi-calendar2-event"></i> Due Date</th>
                            <th scope="col"><i class="bi bi-clock"></i>Duration</th>
                            <th scope="col"><i class="bi bi-gear"></i> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($tasks): ?>
                            <?php foreach ($tasks as $row): ?>
                                <tr>
                                    <!-- <td><?= $row['task_id']; ?></td> -->
                                    <td><?= $row['task_name']; ?></td>
                                    <td><?= $row['project_name']; ?></td>
                                    <td><?= $row['assigned_to_name']; ?></td>
                                    <td><?= $row['status']; ?></td>
                                    <td><?= $row['priority']; ?></td>
                                    <!-- <td><?= $row['created_at']; ?></td> -->
                                    <td><?= $row['due_date']; ?></td>
                                    <td><?= $row['estimated_duration']; ?></td>
                                    <td>
                                        <a href="<?= base_url('task/edit/'.$row['task_id']) ?>" class="btn btn-info btn-sm">Edit</a>
                                        <button type="button" value="<?= $row['task_id']; ?>" class="confirm_del_btn btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>

<script>
    $(document).ready(function () {
        $('.confirm_del_btn').click(function(e) {
            e.preventDefault();
            var id = $(this).val();
            if (confirm('Are you sure you want to delete this task?')) {
                $.ajax({
                    url: "http://localhost/taskfluxo/task/confirm-delete/" + id,
                    success: function (response) {
                        window.location.reload();
                        alert("Task Deleted Successfully");
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText); // Check the console for errors
                        alert("Error deleting task. Please try again."); // Generic error message
                    }
                });
            }
        });
    });
</script>

<?= $this->endSection() ?>
