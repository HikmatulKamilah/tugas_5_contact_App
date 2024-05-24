<?php
$url = isset($url) ? $url : 'login';

if ($url === 'login') {
    ?>
    <h1>Login</h1>
    <form method="POST" action="<?php echo BASEURL; ?>controllers/AuthController.php?action=SaveLogin">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <?php
} else if ($url === 'register') {
    ?>
    <h1>Register</h1>
    <form method="POST" action="<?php echo BASEURL; ?>controllers/AuthController.php?action=newRegister">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="number" name="umur" placeholder="Umur" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    <?php
}
?>
