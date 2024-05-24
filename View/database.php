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
