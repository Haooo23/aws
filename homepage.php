<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Username';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker Project Setup</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h1,
        h2 {
            color: #007bff;
        }

        .container {
            margin-top: 50px;
        }

        ol {
            list-style-type: decimal;
            padding-left: 20px;
        }

        pre code {
            display: block;
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Docker Project Setup</h1>

        <h2>Step 1 — Create a Nginx Container</h2>
        <ol>
            <li>Create a directory for your project and navigate to it:
                <pre><code>mkdir ~/docker-project
cd ~/docker-project</code></pre></li>
            <!-- Add other steps -->
        </ol>

        <h2>Step 2 — Create a PHP Container</h2>
        <ol>
            <li>Create a directory for your PHP code inside your project:
                <pre><code>mkdir ~/docker-project/php_code</code></pre></li>
            <!-- Add other steps -->
        </ol>

        <h2>Step 3 — Create a MariaDB Container</h2>
        <ol>
            <li>Edit the <code>docker-compose.yml</code> file to add an entry for a MariaDB container:
                <pre><code>nano ~/docker-project/docker-compose.yml</code></pre></li>
            <!-- Add other steps -->
        </ol>
    </div>
</body>

</html>
