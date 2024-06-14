<?php $this->extend('layout/l_login'); ?>

<?php $this->section('konten'); ?>

<style>
    body {
        background-color: #4CAF50;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .register-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 35%;
    }
    .register-container img {
        width: 100px;
        margin-bottom: 20px;
    }
    .register-container h4 {
        margin-bottom: 20px;
    }
    .form-control {
        margin-bottom: 10px;
    }
    .btn-primary {
        background-color: #4CAF50;
        border: none;
        width: 100%;
    }
    .btn-secondary {
        border: none;
        width: 100%;
    }
    .btn-primary:hover {
        background-color: #45a049;
    }
</style>

<div class="register-container">
<img src="<?= base_url('logo/logo.svg') ?>" alt="Logo">
    <h4>Register</h4>
    <?php 
    if(session()->getFlashdata('pesan')){
        echo '<div class="alert alert-danger" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }
    ?>
    <form action="/Accounts/registerPost" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="mb-3">
            <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Telepon">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="<?= base_url('/Accounts/') ?>" class="btn btn-secondary mt-2">Login</a>
    </form>
</div>

<?php $this->endSection(); ?>
