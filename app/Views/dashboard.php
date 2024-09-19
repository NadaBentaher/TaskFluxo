<?= $this->extend('layout/home-layout') ?>
<?= $this->section('content') ?>

<style>
    body {
        background: linear-gradient(to right, #f8f9fa, #e9ecef);
        font-family: 'Arial', sans-serif;
    }
    .profile-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fefefe;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .welcome-message {
        font-size: 1.8em;
        color: #333;
        margin-bottom: 30px;
        text-align: center;
    }
    .profile-layout {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap; /* Allows content to wrap on smaller screens */
    }
    .profile-card {
        flex: 1;
        padding: 20px;
        background: #fff;
        border: 1px solid #e1e1e1;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        position: relative;
        text-align: center; /* Center text */
        margin-right: 20px; /* Add spacing between card and image */
        max-width: 100%;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .profile-card:hover {
        transform: scale(1.02);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }
    .profile-card::before {
        content: '';
        position: absolute;
        top: -20px;
        left: 50%;
        width: 80px;
        height: 80px;
        background: #F1C40F;
        border-radius: 50%;
        transform: translateX(-50%);
        z-index: 0;
        border: 4px solid #f1c40f;
    }
    .profile-card img {
        border-radius: 50%;
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 4px solid #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        position: relative;
        z-index: 1;
        margin-bottom: 20px;
        transition: transform 0.3s;
    }
    .profile-card img:hover {
        transform: scale(1.1);
    }
    .profile-card h2 {
        margin: 0;
        font-size: 2em;
        color: #333;
        position: relative;
        z-index: 1;
        font-family: 'Roboto', sans-serif;
        font-weight: 600;
    }
    .profile-card p {
        margin: 5px 0;
        color: #666;
        font-size: 1em;
        position: relative;
        z-index: 1;
        font-family: 'Georgia', serif;
    }
    .profile-card .info {
        margin-top: 20px;
    }
    .profile-card .info label {
        font-weight: bold;
        color: #2980b9;
    }
    .welcome-image {
        width: 100%;
        max-width: 400px; /* Adjust max width as needed */
        border-radius: 10px;
        display: block;
        opacity: 0;
        transform: translateY(-20px);
        transition: opacity 1s ease-in-out, transform 1s ease-in-out;
        height: auto; /* Ensure the image maintains its aspect ratio */
    }
    .welcome-image.show {
        opacity: 1;
        transform: translateY(0);
    }
    .text-center a {
        margin: 5px;
        display: inline-block;
        padding: 10px 20px;
        font-size: 1em;
        text-decoration: none;
        border-radius: 5px;
        color: #fff;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
    }
    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>

<div class="container mt-5 profile-container">
    <div class="welcome-message">
        <h1>Welcome back, <?= esc($user['name']) ?>!</h1>
        <p>Here's your profile information.</p>
        <br>
    </div>
    <div class="profile-layout">
        <!-- Profile Card -->
        <div class="profile-card">
            <!-- Placeholder image, replace with user's actual profile picture if available -->
            <img src="<?= base_url('public/images/profile.jpg') ?>" alt="Profile Picture">
            <h2><?= esc($user['name']) ?></h2>
            <p><?= esc($user['role']) ?></p>

            <div class="info">
                <p><i class="fas fa-envelope"></i> <label>Email:</label> <?= esc($user['email']) ?></p>
                <p><i class="fas fa-phone"></i> <label>Mobile Number:</label> <?= esc($user['Mobile_Number']) ?></p>
                <p><i class="fas fa-building"></i> <label>Department:</label> <?= esc($user['department']) ?></p>
            </div>
        </div>
        <!-- Welcome Image with Animation -->
        <img src="<?= base_url('public/images/welcome.jpg') ?>" alt="Welcome" class="welcome-image">
    </div>
    <br><br>
    <div class="text-center mt-4">
        <!-- <a href="<?= base_url('profile/edit') ?>" class="btn btn-primary">Edit Profile</a>
        <a href="<?= base_url('profile/change_password') ?>" class="btn btn-secondary">Change Password</a> -->
    </div>
</div>
<br>
<br>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const image = document.querySelector('.welcome-image');
        if (image) {
            image.classList.add('show');
        }
    });
</script>
<?= $this->endSection() ?>

