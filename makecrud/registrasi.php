<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body> 
    <div class="register-constrain"> 
        <div class="card login-form"> 
            <div class="card-body"> 
                <h1 class="card-title text-center">REGISTER HERE!</h1>
                <form method="POST" action="index.html"> <!-- Ganti 'index.html' dengan URL atau nama file index Anda -->
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName" name="name" aria-describedby="nameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Create Account</button>
                </form>
            </div> 
        </div> 
    </div> 
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Password: $password <br>";
}
?>

