<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="<?= base_url('employees') ?>" class="text-decoration-none">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $totalEmployees ?></h3>
                        <p>Total Employees</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= base_url('employees') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="<?= base_url('projects') ?>" class="text-decoration-none">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $totalProjects ?></h3>
                        <p>Total Projects</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <a href="<?= base_url('projects') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="<?= base_url('tasks') ?>" class="text-decoration-none">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= $totalTasks ?></h3>
                        <p>Total Tasks</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <a href="<?= base_url('tasks') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </a>
        </div>
    </div>
    <!-- Add other sections if needed -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tasks by Status</h5>
                    <ul class="list-group">
                        <?php foreach ($tasksByStatus as $status): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $status['status'] ?>
                                <span class="badge badge-primary badge-pill"><?= $status['count'] ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Projects by Status</h5>
                    <ul class="list-group">
                        <?php foreach ($projectsByStatus as $status): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $status['status'] ?>
                                <span class="badge badge-primary badge-pill"><?= $status['count'] ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tasks by Priority</h5>
                    <ul class="list-group">
                        <?php foreach ($tasksByPriority as $priority): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $priority['priority'] ?>
                                <span class="badge badge-primary badge-pill"><?= $priority['count'] ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Upcoming Deadlines</h5>
                    <ul class="list-group">
                        <?php foreach ($upcomingDeadlines as $task): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $task['task_name'] ?>
                                <span class="badge badge-warning badge-pill"><?= $task['due_date'] ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>


<style>
    .small-box {
    position: relative;
    border-radius: 5px;
    background: #fff;
    color: #fff;
    display: block;
    padding: 20px;
    box-shadow: 0 0 0 1px rgba(0,0,0,0.1), 0 4px 8px rgba(0,0,0,0.1);
    overflow: hidden;
    text-align: center;
}

.small-box .inner {
    padding: 10px;
}

.small-box h3 {
    font-size: 2.5rem;
    margin: 0;
}

.small-box p {
    font-size: 1.2rem;
}

.small-box .icon {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 4rem;
    opacity: 0.15;
}

.small-box-footer {
    display: block;
    background: rgba(0,0,0,0.1);
    color: #fff;
    padding: 10px;
    text-align: center;
    font-size: 0.8rem;
    border-radius: 0 0 5px 5px;
}

.small-box-footer:hover {
    text-decoration: none;
    background: rgba(0,0,0,0.2);
}

.bg-info {
    background-color: #17a2b8 !important;
}

.bg-success {
    background-color: #28a745 !important;
}

.bg-warning {
    background-color: #ffc107 !important;
}

.bg-danger {
    background-color: #dc3545 !important;
}

</style>