<?php $pageTitle = 'Project Management'; ?>
<?= $this->extend('layout/dashboard-layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card mt-0">
                <div class="card-body">
                    <form method="post" action="<?= base_url('project/update/'.$project['project_id']) ?>">
                        <a href="<?= base_url('projects'); ?>" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        <h1 class="text-center">Edit Project</h1>
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="mb-3">
                            <label for="project_name" class="form-label"><i class="bi bi-card-text"></i> Project Name</label>
                            <input name="project_name" type="text" value="<?= $project['project_name']; ?>" class="form-control" id="project_name" placeholder="Project Name" value="<?= old('project_name') ?>">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label"><i class="bi bi-flag"></i> Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="To Do" <?= $project['status'] == 'To Do' ? 'selected' : '' ?>>To Do</option>
                                <option value="In Progress" <?= $project['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                                <option value="Completed" <?= $project['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="department" class="form-label"><i class="bi bi-building"></i> Department</label>
                            <select name="department" class="form-control" id="department">
                                <option value="IT" <?= $project['department'] == 'IT' ? 'selected' : '' ?>>IT</option>
                                <option value="HR" <?= $project['department'] == 'HR' ? 'selected' : '' ?>>HR</option>
                                <option value="Marketing" <?= $project['department'] == 'Marketing' ? 'selected' : '' ?>>Marketing</option>
                                <option value="QA" <?= $project['department'] == 'QA' ? 'selected' : '' ?>>QA</option>
                                <option value="Legal" <?= $project['department'] == 'Legal' ? 'selected' : '' ?>>Legal</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="deadline" class="form-label"><i class="bi bi-calendar2-event"></i> Deadline</label>
                            <input name="deadline" type="date" value="<?= $project['deadline']; ?>" class="form-control" id="deadline" placeholder="Project Deadline" value="<?= old('deadline') ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="total_duration" class="form-label"><i class="bi bi-clock"></i> Total Duration</label>
                            <input name="total_duration" type="text" value="<?= $project['total_duration']; ?>" class="form-control" id="total_duration" placeholder="Total Duration" readonly>
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
<?= $this->endSection(); ?>
