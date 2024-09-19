<?= $this->extend('layout/home-layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mt-5">
                <div class="row g-0">
                    <!-- Colonne pour le formulaire de connexion -->
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <div class="card-body">
                            <?php $session = session(); ?>
                            <?php if ($session->getFlashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= $session->getFlashdata('error') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            
                            <form method="post" action="<?= base_url("login/do_login"); ?>">
                                <h1 class="text-center">Login Here</h1>

                                <div class="mb-3">
                                    <label for="email" class="form-label"><i class="bi bi-envelope-at"></i> Email address</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" value="<?= old('email') ?>">
                                    <?php
                                    $errors = session()->getFlashdata('errors');
                                    if (isset($errors['email'])): ?>
                                        <div class="text-danger">
                                            <?= esc($errors['email']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label"><i class="bi bi-lock"></i> Password</label>
                                    <div class="input-group">
                                        <input name="password" type="password" class="form-control" id="password" placeholder="Your password">
                                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                            <i class="bi bi-eye-slash" id="togglePasswordIcon"></i>
                                        </span>
                                    </div>
                                    <?php
                                    if (isset($errors['password'])): ?>
                                        <div class="text-danger">
                                            <?= esc($errors['password']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-3 text-center">
                                    <input type="submit" value="Login" name="login" class="btn btn-dark" />
                                </div>
                            </form>
                            <div class="text-center">
                                <a href="<?= site_url("register"); ?>" style="color: #1E8449;">Don't have an account? Register here.</a>
                            </div>
                        </div>
                    </div>

                    <!-- Colonne pour l'image -->
                    <div class="col-md-6 d-none d-md-block">
                        <div class="card-body p-0">
                            <img src="<?= base_url('public/images/login.jpg') ?>" alt="Login Image" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Style pour la page de connexion */
    .card {
        border-radius: 8px; /* Coins arrondis pour la carte */
        box-shadow: 0 4px 8px rgba(0,0,0,0.2); /* Ombre légère autour de la carte */
        overflow: hidden; /* Assurer que l'image ne dépasse pas de la carte */
        max-width: 100%; /* Assurer que la carte ne dépasse pas de la largeur de l'écran */
    }

    .card-body {
        background-color: #ffffff; /* Fond blanc pour le corps de la carte */
        border-radius: 8px; /* Coins arrondis pour le corps de la carte */
        padding: 2rem; /* Espacement interne pour le corps de la carte */
    }

    .form-control {
        border: 1px solid #ced4da; /* Bordure légère */
        border-radius: 5px; /* Coins arrondis */
        box-shadow: none; /* Supprimer l'ombre */
    }

    .input-group-text {
        background-color: #e9ecef; /* Fond légèrement gris pour le bouton */
        border: 1px solid #ced4da; /* Bordure légèrement grise */
        border-radius: 0 5px 5px 0; /* Coins arrondis pour le bouton */
    }

    .btn-primary {
        background-color: #007bff; /* Couleur du bouton */
        border: none; /* Supprimer la bordure */
        border-radius: 5px; /* Coins arrondis pour le bouton */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Couleur du bouton au survol */
    }

    .alert-dismissible .btn-close {
        margin: -0.5rem -0.5rem -0.5rem auto; /* Ajuster la position du bouton de fermeture */
    }

    .img-fluid {
        width: 100%; /* Assurer que l'image occupe toute la largeur de la carte */
        height: auto; /* Ajuster la hauteur proportionnellement */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const togglePasswordIcon = document.querySelector('#togglePasswordIcon');
        
        togglePassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle the icon
            togglePasswordIcon.classList.toggle('bi-eye');
            togglePasswordIcon.classList.toggle('bi-eye-slash');
        });
    });
</script>
<?= $this->endSection() ?>
