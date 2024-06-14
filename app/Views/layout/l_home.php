<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('/style/home.css'); ?>">
</head>

<body>
    <!-- --navbar-- -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #1D1B34;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/books">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/categories">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pengguna'); ?>">Dashboard</a>
                    </li>
                </ul>
                <form class="d-flex" action="/home/search" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('konten'); ?>