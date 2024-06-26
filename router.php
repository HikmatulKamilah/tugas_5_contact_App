<?php
class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct ()
    {
        $url = $this->parseURL();

        // Mencari file controller
        if ($url && file_exists('../app/controllers/' . $url[0] . 'Controller.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
            
        // Memuat file controller
        require_once '../app/controllers/' . $this->controller . 'Controller.php';
        $this->controller = new $this->controller;

        // Method
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Parameter
        $this->params = $url ? array_values($url) : [];

        // Memanggil method dalam controller dengan parameter yang diberikan
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL() 
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            return null; // Mengembalikan null jika $_GET['url'] tidak diatur
        }
    }
}
?>

<?php
$request_uri = $_SERVER['REQUEST_URI'];

// Tentukan bagaimana permintaan akan ditangani
if ($request_uri == '/login') {
    include 'index.php'; // Ganti dengan path file login Anda
} elseif ($request_uri == '/homepage') {
    include 'homepage.php'; // Ganti dengan path file homepage Anda
} else {
    // Jika permintaan tidak sesuai dengan yang diharapkan, lakukan penanganan lainnya
    echo "404 Not Found";
}
?>

