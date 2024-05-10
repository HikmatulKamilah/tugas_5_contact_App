<?php 
class homepage {
    public function index($page = 'homepage/index/registrasi')
    {
        echo $page; 
    }

    public function view($page, $data)
    {
        // Lakukan sesuatu dengan data dan tampilkan halaman
        echo "Menampilkan halaman: $page";
    }
}

// Contoh penggunaan:
$home = new homepage();
$home->index();  // Ini akan mencetak 'homepage/index'
$home->view('registrasi/index', $data);  // Ini akan memanggil metode view() dengan argumen
$home->index('homepage/index');  // Ini juga akan mencetak 'homepage/index'
?>
