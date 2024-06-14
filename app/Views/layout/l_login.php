<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
</head>
<body>

<?= $this->renderSection('konten'); ?>

    
</body>
</html>