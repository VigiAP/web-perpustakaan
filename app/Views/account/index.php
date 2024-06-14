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
    .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 35%;
    }
    .login-container img {
        width: 100px;
        margin-bottom: 20px;
    }
    .login-container h4 {
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

<div class="login-container">
    <img src="<?= base_url('logo/logo.svg') ?>" alt="Logo">
    <h4>Login</h4>
   
    <?php 
    if(session()->getFlashdata('pesan')){
        echo '<div class="alert alert-danger" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }
    ?>
     <?php 
    if(session()->getFlashdata('pesan2')){
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan2');
        echo '</div>';
    }
    ?>
    <form action="<?= base_url('/accounts/login') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button><br>
        <a href="<?= base_url('/Accounts/register') ?>" class="btn btn-secondary mt-2">Register</a>
    </form>
</div>

<?php $this->endSection(); ?>
