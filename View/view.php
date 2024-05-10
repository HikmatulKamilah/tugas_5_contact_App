<?php

class homepage {
    public function index($page = 'homepage/index')
    {
        echo $page;
    }

    public function view($page, $data)
    {
        // Jika halaman yang diminta ada, tampilkan
        if (file_exists($page)) {
            // Include halaman
            include($page);
        } else {
            // Jika halaman tidak ditemukan, tampilkan pesan kesalahan
            echo "Halaman tidak ditemukan";
        }
    }
}

// Contoh penggunaan:
$home = new homepage();
$home->index();  // Ini akan mencetak 'homepage/index'

// Data contoh
$data = [
    'title' => 'Halaman Registrasi',
    'content' => 'Ini adalah halaman registrasi'
];

$home->view('registrasi/index.php', $data);  // Ini akan memanggil metode view() dengan argumen
$home->index('homepage/index');  // Ini juga akan mencetak 'homepage/index'
?>
