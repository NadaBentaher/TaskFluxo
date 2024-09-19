<?= $this->extend('layout/home-layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mt-5">
                <div class="row g-0">
                    <!-- Column for the registration form -->
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <div class="card-body">
                            <?php $session = session(); ?>
                            <?php if (!is_null($session->getFlashdata('success_message'))): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?= $session->getFlashdata('success_message'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif ?>

                            <form method="post" action="<?= base_url("register/do_register"); ?>">
                                <h1 class="text-center">Register Here</h1>

                                <div class="mb-3">
                                    <label for="name" class="form-label"><i class="bi bi-person"></i> Name</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" value="<?= old('name') ?>">
                                    <?php
                                    $errors = session()->getFlashdata('errors');
                                    if (isset($errors['name'])): ?>
                                        <div class="text-danger">
                                            <?= esc($errors['name']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label"><i class="bi bi-envelope-at"></i> Email address</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" value="<?= old('email') ?>">
                                    <?php
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

                                <div class="mb-3">
                                    <label for="cpassword" class="form-label"><i class="bi bi-lock"></i> Confirm your Password</label>
                                    <div class="input-group">
                                        <input name="cpassword" type="password" class="form-control" id="cpassword" placeholder="Confirm Your password">
                                        <span class="input-group-text" id="toggleCPassword" style="cursor: pointer;">
                                            <i class="bi bi-eye-slash" id="toggleCPasswordIcon"></i>
                                        </span>
                                    </div>
                                    <?php
                                    if (isset($errors['cpassword'])): ?>
                                        <div class="text-danger">
                                            <?= esc($errors['cpassword']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-3">
                                    <label for="mobile" class="form-label"><i class="bi bi-telephone"></i> Mobile number</label>
                                    <input name="mobile" type="tel" class="form-control" id="mobile" placeholder="Your phone number" value="<?= old('mobile') ?>">
                                    <?php
                                    if (isset($errors['mobile'])): ?>
                                        <div class="text-danger">
                                            <?= esc($errors['mobile']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-3 text-center">
                                    <input type="submit" value="Register" class="btn btn-dark" />
                                </div>
                            </form>
                            <div class="text-center">
                                <a href="<?= site_url("login"); ?>" style="color: green;">Already Have an account?</a>
                            </div>
                        </div>
                    </div>

                    <!-- Column for the image -->
                    <div class="col-md-6 d-none d-md-block">
                        <div class="img-container">
                            <img src="<?= base_url('public/images/login.jpg') ?>" alt="Register Image" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<style>
    /* Style for the registration page */
    .card {
        border-radius: 8px; /* Rounded corners for the card */
        box-shadow: 0 4px 8px rgba(0,0,0,0.2); /* Light shadow around the card */
        overflow: hidden; /* Ensure image does not overflow card */
        max-width: 100%; /* Ensure card does not exceed screen width */
    }

    .card-body {
        background-color: #ffffff; /* White background for card body */
        border-radius: 8px; /* Rounded corners for card body */
        padding: 2rem; /* Padding inside card body */
    }

    .form-control {
        border: 1px solid #ced4da; /* Light border */
        border-radius: 5px; /* Rounded corners */
        box-shadow: none; /* Remove shadow */
    }

    .input-group-text {
        background-color: #e9ecef; /* Light grey background for button */
        border: 1px solid #ced4da; /* Light grey border */
        border-radius: 0 5px 5px 0; /* Rounded corners for button */
    }

    .btn-dark {
        background-color: #343a40; /* Dark background for button */
        border: none; /* Remove border */
        border-radius: 5px; /* Rounded corners for button */
    }

    .btn-dark:hover {
        background-color: #23272b; /* Darker background on hover */
    }

    .alert-dismissible .btn-close {
        margin: -0.5rem -0.5rem -0.5rem auto; /* Adjust close button position */
    }

    .img-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .img-fluid {
        width: 100%; /* Ensure image takes up full width */
        height: auto; /* Adjust height proportionally */
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

        const toggleCPassword = document.querySelector('#toggleCPassword');
        const cpassword = document.querySelector('#cpassword');
        const toggleCPasswordIcon = document.querySelector('#toggleCPasswordIcon');
        
        toggleCPassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            cpassword.setAttribute('type', type);
            
            // Toggle the icon
            toggleCPasswordIcon.classList.toggle('bi-eye');
            toggleCPasswordIcon.classList.toggle('bi-eye-slash');
        });
    });
</script>

<?= $this->endSection() ?>
