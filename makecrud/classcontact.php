<?php 
require_once 'database.php'; 
require_once 'homepage.php'; 
class classcontact { 
    static function select() {
        global $conn; 
        $sql = "SELECT * FROM db_pelanggan"; 
        $result = $conn->query($sql); 
        $arr = array (); 
        
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)){
                $arr[] = $row; 
            }
        }
        return $arr; 
    }

   static function insert($nomor_telepon, $owner) { 
       global $conn; 
       $sql = "INSERT INTO db_pelanggan (nomor_telepon, nama) VALUES (?, ?)"; 
       $stmt = $conn->prepare($sql); 
       $stmt->bind_param('ss', $nomor_telepon, $owner); 
       $stmt->execute(); 
    $result = $stmt->affected_rows > 0 ? true : false; 
        return $result; 
    }
}
?>
