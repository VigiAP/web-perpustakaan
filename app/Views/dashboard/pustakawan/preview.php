<!DOCTYPE html>
<html>
<head>
    <title>Kartu Anggota Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background-color: #007e33; /* Warna hijau */
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        .card h1 {
            background-color: #00c851; /* Warna hijau terang */
            margin: -20px -20px 20px -20px;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }
        .table {
            color: white;
        }
        .table th, .table td {
            border-top: none;
        }
        .table th {
            width: 50%;
            text-align: left;
        }
        .table td {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>KARTU ANGGOTA PERPUSTAKAAN</h1>
        <table class="table">
            <tr>
                <th>Nama Anggota :</th>
                <td><?= esc($username) ?></td>
            </tr>
            <tr>
                <th>Password :</th>
                <td><?= esc($password) ?></td>
            </tr>
            <tr>
                <th>No. Handphone :</th>
                <td><?= esc($no_hp) ?></td>
            </tr>
            <tr>
                <th>Role :</th>
                <td><?= esc($role) ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
