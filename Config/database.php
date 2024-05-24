<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_pelanggan';


$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}


//$result = $conn->query("SELECT * FROM db_pelanggan");
//$arr = array(); 
//if ($result->num_rows > 0) {
  //  while ($row = mysqli_fetch_assoc($result)){
       // $arr[] = $row; 
   // }
//}


// var_dump($arr); 
?> 
<?php
$host = 'localhost';
$db = 'auth_db';
$user = 'root';  // Sesuaikan dengan pengguna database Anda
$pass = 'db_pelanggan';      // Sesuaikan dengan kata sandi database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
