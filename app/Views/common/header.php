    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TaskFluxo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= site_url();?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= site_url('about');?>">About us</a>
                    </li>
                    
                    <?php $session = session(); ?>
                    <?php if ($session->get('role') === 'employee'): ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url('employeeTasks'); ?>">My Tasks</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= site_url();?>">Contact</a>
                        </li> -->
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <?php if ($session->get('loginned') == "loginned"): ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url($session->get('role') == "admin" ? "admin" : "dashboard") ?>">
                            <i class="bi bi-person-circle"></i> <?= esc($session->get('name')) ?>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url("logout"); ?>">
                            <i class="bi bi-box-arrow-right"></i></i> Logout
                            </a>
                        </li> 
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-check"></i> Authentication
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= site_url("login"); ?>"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                                <li><a class="dropdown-item" href="<?= site_url("register"); ?>"><i class="bi bi-person-add"></i> Register</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
