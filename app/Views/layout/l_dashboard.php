<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css'); ?> ">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('plugins/jqvmap/jqvmap.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css'); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('plugins/daterangepicker/daterangepicker.css'); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('plugins/summernote/summernote-bs4.min.css'); ?>">
   <!-- Custom CSS -->
    <style>
        .small-box {
            width: 250px;
            /* Adjust the width as needed */
            height: 150px;
            /* Adjust the height as needed */
        }

        .main-sidebar {
            background-color: #006400;
            /* Dark green color */
        }

        .main-sidebar .nav-link {
            color: #ffffff !important;
            /* Set text color to white */
        }

        .main-sidebar .nav-icon {
            color: #ffffff !important;
            /* Set icon color to white */
        }

        .user-panel .info h5,
        .user-panel .info small {
            color: #ffffff !important;
            /* Set text color to white */
        }

        .content-wrapper {
            background-color: #e0f7e0;
            /* Light green background */
        }

        .card {
            border-radius: 10px;
            /* Rounded corners */
        }

        .card-header {
            background-color: #4CAF50;
            /* Green header */
            color: white;
        }

        .card-body {
            background-color: white;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('logo/logo.svg'); ?>" alt="Foto" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand" style="background-color: #4CAF50;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"
                            style="color: white;"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="text-white">
                    <h5>Sistem Informasi Perpustakaan</h5>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-success elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php if (session()->get('role') === 'admin'): ?>
                        <img src="<?= base_url('logo/admin.png'); ?>" class="img-circle elevation-2" alt="Admin Image"
                            style="width: 65px; height: 60px;">
                        <?php elseif (session()->get('role') === 'pustakawan'): ?>
                        <img src="<?= base_url('logo/pustaka.jpg'); ?>" class="img-circle elevation-2"
                            alt="Pustakawan Image" style="width: 65px; height: 60px;">
                        <?php else: ?>
                        <img src="<?= base_url('logo/pengguna.png'); ?>" class="img-circle elevation-2"
                            alt="Pengguna Image" style="width: 65px; height: 60px;">
                        <?php endif; ?>
                    </div>
                    <div class="info">
                        <h5 class="d-block text-white"><?= session()->get('username'); ?></h5>
                        <small class="d-block text-white"><?= session()->get('role'); ?></small>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">


                        <?php if (session()->get('role') === 'admin'): ?>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Kelola User
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/admin'); ?>" class="nav-link">
                                        <i class="fas fa-user-cog nav-icon"></i>
                                        <p>Admin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/petugas'); ?>" class="nav-link">
                                        <i class="fas fa-user-tie nav-icon"></i>
                                        <p>Petugas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/pengguna'); ?>" class="nav-link">
                                        <i class="fas fa-user-friends nav-icon"></i>
                                        <p>Pengguna</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('accounts/logout'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (session()->get('role') === 'pustakawan'): ?>
                        <li class="nav-item">
                            <a href="<?= base_url('/pustakawan'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Pustaka
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('/pustakawan/kelola_buku'); ?>" class="nav-link">
                                        <i class="fas fa-book-reader nav-icon"></i>
                                        <p>Kelola Buku</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/pustakawan/daftar_anggota'); ?>" class="nav-link">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Daftar Anggota</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/pustakawan/sirkulasi'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-sync-alt"></i>
                                <p>Sirkulasi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('/pustakawan/laporan'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('accounts/logout'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (session()->get('role') == 'pengguna'): ?>
                        <li class="nav-item">
                            <a href="<?= base_url('/pengguna'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book-reader"></i>
                                <p>
                                    Koleksi Buku
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('bookmarkController/bookmarkPengetahuan'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengetahuan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('bookmarkController/bookmarkNovel'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Novel</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('bookmarkController/bookmarkLainnya'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lainnya</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Peminjaman
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-undo"></i>
                                <p>
                                    Pengembalian
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-concierge-bell"></i>
                                <p>
                                    Layanan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/pengguna/home'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Kembali Ke Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('accounts/logout'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <?= $this->renderSection('konten'); ?>

        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <!-- ./wrapper -->


    <!-- jQuery -->
    <script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('plugins/chart.js/Chart.min.js'); ?>"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('plugins/sparklines/sparkline.js'); ?>"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('plugins/moment/moment.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
    <!-- Summernote -->
    <script src="<?= base_url('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('dist/js/adminlte.js'); ?>"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
</body>

</html>