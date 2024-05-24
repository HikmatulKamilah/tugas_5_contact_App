<?php
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Jika belum login, arahkan pengguna ke halaman login
    header("Location: login.php");
    exit();
}

require_once 'database.php'; 
require_once 'classcontact.php';
$arr = classcontact::select(); 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link href="style.css" rel="stylesheet"> 
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 sidebar">
            <h1 class="text-center">HOMEPAGE</h1>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Setting
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Notification
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Profil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        Logout
                    </a>
                </li>
            </ul>
            <hr>
        </div>
        <div class="col-9">
            <div>
                <h1 class="text-center cool-9">TABEL PEMBELI IPHONE</h1>
                <table id="myTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php foreach ($arr as $data): ?>
                        <tr> 
                            <td><?= $data['id_pembeli'] ?></td> 
                            <td><input type="text" value="<?= $data['nomor_telepon'] ?>" class="form-control nomor_telepon" readonly></td> 
                            <td><input type="text" value="<?= $data['nama'] ?>" class="form-control nama" readonly></td> 
                            <td> 
                                <button class="btn btn-primary edit-btn">Edit</button> 
                                <button class="btn btn-primary save-btn" style="display:none;">Save</button> 
                                <button class="btn btn-danger delete-btn">Delete</button> <!-- Tombol Hapus -->
                            </td> 
                        </tr> 
                        <?php endforeach; ?>
                    </tbody> 
                </table>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-success tambah-btn">Tambah</button> <!-- Tombol Tambah -->
            </div>
        </div>        
    </div>
</div>

<script>
// Your JavaScript code here
</script>
</body>
</html>
