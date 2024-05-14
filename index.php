<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../asset/img/aws_logo.png" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .login-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .login-box h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .input-container {
            position: relative;
            margin-bottom: 20px;
        }

        .input-container i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .input-container input {
            padding-left: 30px;
            height: 40px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
        }

        .login-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 0;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        .theme-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo "<script>alert('Credenziali errate. Login fallito!');</script>";
        unset($_SESSION['error_message']);
    }
    ?>
    <div class="login-container">
        <div class="login-box">
            <h1>Login</h1>
            <form method="post" action="login.php" class="login-form">
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" maxlength="30" name="username" required>
                </div>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" minlength="5" maxlength="16" name="password" required>
                </div>
                <button type="submit" class="login-button">Login</button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="login.js"></script>
</body>

</html>
