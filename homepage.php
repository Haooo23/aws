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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-5GXi7WbGMuZlTMbNdM1hiF+Qz3eXpbeuLz9XTv2T5MI5jldVP9hl0BfKVz4CEstB" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px auto;
            max-width: 800px;
            background-color: #1a1a1a; /* Dark background */
            color: #e0e0e0; /* Light text */
            padding: 20px;
        }
        h1, h2 {
            text-align: center; /* Center main titles */
            color: #007bff; /* Blue titles */
            margin-bottom: 20px;
        }
        .card {
            border: 1px solid #333; /* Dark border */
            border-radius: 10px;
            margin-bottom: 20px;
            background-color: #2a2a2a; /* Dark card background */
            color: #e0e0e0; /* Light card text */
        }
        .card-body {
            padding: 20px;
        }
        pre {
            background-color: #333; /* Dark code background */
            border: 1px solid #555; /* Dark border */
            border-radius: 4px;
            padding: 10px;
            overflow-x: auto;
            color: #e0e0e0; /* Light code text */
        }
        code {
            font-family: "SFMono-Regular", Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            color: #99ccff; /* Light code text */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Docker Project Setup</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2>Step 1 — Create a Nginx Container</h2>
                <ol>
                    <li>Create a directory for your project and navigate to it:
                        <pre><code>mkdir ~/docker-project
cd ~/docker-project</code></pre></li>
                    <li>Create a <code>docker-compose.yml</code> file for launching the Nginx container:
                        <pre><code>nano docker-compose.yml</code></pre></li>
                    <li>Add the following configuration to the <code>docker-compose.yml</code> file:
                        <pre><code>version: "3.9"
services:
  nginx:
    image: nginx:latest
    container_name: nginx-container
    ports:
      - 80:80</code></pre></li>
                    <li>Launch the Nginx container:
                        <pre><code>docker-compose up -d</code></pre></li>
                    <li>Verify that the Nginx container is running:
                        <pre><code>docker ps</code></pre></li>
                    <li>Access your Nginx container using the URL <code>http://your-server-ip</code> in a web browser.</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2>Step 2 — Create a PHP Container</h2>
                <ol>
                    <!-- Steps for creating PHP container -->
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2>Step 3 — Create a MariaDB Container</h2>
                <ol>
                    <!-- Steps for creating MariaDB container -->
                </ol>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-sE1DHoA8PfPv/gFJ8r+jzM8P9anQhiqE2ImFNmzx3sveZhLI1m4qAx3Dw3gX" crossorigin="anonymous"></script>
</body>
</html>
