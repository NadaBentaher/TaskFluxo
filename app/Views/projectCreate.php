<?php $pageTitle = 'Project Management'; ?>
<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card mt-0">
                <div class="card-body">
                    <a href="<?= base_url('projects'); ?>" class="btn btn-secondary mb-3">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                    <form method="post" action="<?= base_url("projects/add"); ?>">
                        <h1 class="text-center">Add Project</h1>

                        <div class="mb-3">
                            <label for="project_name" class="form-label"><i class="bi bi-person"></i> Project Name</label>
                            <input name="project_name" type="text" class="form-control" id="project_name" placeholder="Project Name" value="<?= old('project_name') ?>">
                        </div>
<!-- 
                        <div class="mb-3">
                            <label for="status" class="form-label"><i class="bi bi-flag"></i> Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="Not Started">Not Started</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div> -->

                        <div class="mb-3">
                            <label for="department" class="form-label"><i class="bi bi-building"></i> Department</label>
                            <select name="department" class="form-control" id="department">
                                <option value="IT">IT</option>
                                <option value="HR">HR</option>
                                <option value="Marketing">Marketing</option>
                                <option value="QA">QA</option>
                                <option value="Legal">Legal</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="deadline" class="form-label"><i class="bi bi-calendar"></i> Deadline</label>
                            <input name="deadline" type="date" class="form-control" id="deadline" value="<?= old('deadline') ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="total_duration" class="form-label"><i class="bi bi-clock"></i> Total Duration (format HH:MM or J HH:MM)</label>
                            <input type="text" id="total_duration" name="total_duration" class="form-control" readonly>
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
<?= $this->endSection(); ?>
