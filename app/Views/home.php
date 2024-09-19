<?= $this->extend('layout/home-layout') ?>

<?= $this->section('content') ?>

<!-- Main Container -->
<div class="main-container d-flex flex-column min-vh-100">
    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="container">
            <h1 class="display-4">Welcome to TaskFluxo</h1>
            <p class="lead">Manage your tasks efficiently and effectively.</p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 d-flex justify-content-center">
                    <div class="feature-card card bg-dark text-white text-center p-4 border-0 rounded floating-card">
                        <i class="fas fa-tasks fa-3x mb-3"></i>
                        <h3>Task Management</h3>
                        <p>Organize and manage your tasks efficiently.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4 d-flex justify-content-center">
                    <div class="feature-card card bg-dark text-white text-center p-4 border-0 rounded floating-card">
                        <i class="fas fa-project-diagram fa-3x mb-3"></i>
                        <h3>Project Tracking</h3>
                        <p>Keep track of project progress and deadlines.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4 d-flex justify-content-center">
                    <div class="feature-card card bg-dark text-white text-center p-4 border-0 rounded floating-card">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h3>Team Collaboration</h3>
                        <p>Collaborate with your team seamlessly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta text-center py-5 position-relative overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="display-4 mb-3">Ready to Get Started?</h2>
                    <p class="lead mb-4">Join TaskFluxo today and streamline your task management. Sign up now and start your journey to better productivity!</p>
                    <a href="<?= site_url("register"); ?>" class="btn btn-light btn-lg shadow-sm">Register Now</a>
                </div>
            </div>
        </div>
        <div class="paint-splash"></div>
    </section>
</div>

<style>
    body {
        background-size: cover;
        background-position: center;
        color: #fff;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .main-container {
        display: flex;
        flex-direction: column;
    }

    .welcome-section {
        position: relative;
        background: url('public/images/company.png') no-repeat center center;
        background-size: cover;
        color: #fff;
        padding: 80px 0; /* Adjust padding as needed */
        text-align: center;
    }

    .welcome-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
        z-index: 1;
    }

    .welcome-section .container {
        position: relative;
        z-index: 2;
    }

    .welcome-section h1, .welcome-section p {
        margin: 0;
        position: relative;
        z-index: 2;
    }

    .features {
        padding: 50px 0;
        text-align: center;
    }

    .card {
        background: rgba(0, 0, 0, 0.7);
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .card-title {
        color: #f0f0f0;
    }

    .card-text {
        color: #dcdcdc;
    }

    .card-container {
        margin: 0 auto;
        max-width: 1200px;
    }

    .floating-card {
        transform: translateY(-10px);
        transition: transform 0.3s ease-in-out;
    }

    .floating-card:hover {
        transform: translateY(-15px);
    }

    .cta {
        background: linear-gradient(145deg, rgba(0, 123, 255, 0.8), rgba(0, 255, 255, 0.8));
        color: #fff;
        position: relative;
        overflow: hidden;
        padding: 50px 0;
    }

    .cta .paint-splash {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 300%;
        height: 300%;
        background: radial-gradient(circle, rgba(255, 0, 150, 0.5) 0%, rgba(255, 165, 0, 0.5) 100%);
        transform: translate(-50%, -50%) rotate(-30deg);
        opacity: 0.6;
        z-index: 1;
    }

    .cta .container {
        position: relative;
        z-index: 2;
    }

    .cta h2, .cta p {
        color: #fff;
    }

    .cta .btn {
        background: #fff;
        color: #007bff;
        border: none;
        border-radius: 30px;
        padding: 10px 30px;
        font-weight: bold;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }

    .cta .btn:hover {
        background: #007bff;
        color: #fff;
    }
</style>

<?= $this->endSection() ?>
