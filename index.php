<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #125ca5;
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="index.html" class="btn btn-primary mr-2">Home</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
require "connect.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
        session_start();
        $_SESSION['logged'] = true;
        header("location: adminInterface.html");
        
    } else {

        $res = $conn -> query("SELECT * FROM utenti WHERE username = '$username' AND password = '$password'");
        if ($res->num_rows > 0) {
            $row = $res->fetch_array(); 
            $idUtente = $row['ID'];
            session_start();
            $_SESSION['idUtente'] = $idUtente;
            $_SESSION['logged'] = true;
            header("location: clientInterface.html");
            
        } else {
            echo "Invalid username or password";
        }
    }
}else{
    //echo "errore nei dati";
    header("location: login.html");
}
?>
