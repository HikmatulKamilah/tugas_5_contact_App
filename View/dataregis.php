<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_registrasi';

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
