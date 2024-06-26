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
            background-color: #1a1a1a; 
            color: #e0e0e0; 
            padding: 20px;
        }
        h1, h2 {
            text-align: center; 
            color: #007bff; 
            margin-bottom: 20px;
        }
        .card {
            border: 1px solid #333; 
            border-radius: 10px;
            margin-bottom: 20px;
            background-color: #2a2a2a; 
            color: #e0e0e0; 
        }
        .card-body {
            padding: 20px;
        }
        pre {
            background-color: #333; 
            border: 1px solid #555; 
            border-radius: 4px;
            padding: 10px;
            overflow-x: auto;
            color: #e0e0e0; 
        }
        code {
            font-family: "SFMono-Regular", Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            color: #99ccff; 
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
                    <li>Create a directory for your PHP code inside your project:
                        <pre><code>mkdir ~/docker-project/php_code</code></pre></li>
                    <li>Clone your PHP code into the <code>php_code</code> directory.
                        <!-- Replace [GitHub URL] with the actual URL of your PHP code -->
                        <pre><code>git clone [GitHub URL] ~/docker-project/php_code/</code></pre></li>
                    <li>Create a <code>Dockerfile</code> for the PHP container:
                        <pre><code>nano ~/docker-project/php_code/Dockerfile</code></pre></li>
                    <li>Add the following lines to the <code>Dockerfile</code>:
                        <pre><code>FROM php:7.0-fpm
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli</code></pre></li>
                    <li>Create a directory for Nginx inside your project directory:
                        <pre><code>mkdir ~/docker-project/nginx</code></pre></li>
                    <li>Create an Nginx default configuration file to run your PHP application:
                        <pre><code>nano ~/docker-project/nginx/default.conf</code></pre></li>
                    <li>Add the following Nginx configuration to the <code>default.conf</code> file:
                        <pre><code>server {
    listen 80 default_server;
    root /var/www/html;
    index index.html index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt { access_log off; log_not_found off; }

    access_log off;
    error_log /var/log/nginx/error.log error;

    sendfile off;

    client_max_body_size 100m;

    location ~ .php$ {
        fastcgi_split_path_info ^(.+.php)(/.+)$;
        fastcgi_pass php:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_read_timeout 300;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_intercept_errors off;
        fastcgi_buffer_size 16k;
        fastcgi_buffers 4 16k;
    }

    location ~ /.ht {
        deny all;
    }
}</code></pre></li>
                    <li>Create a <code>Dockerfile</code> inside the <code>nginx</code> directory to copy the Nginx default config file:
                        <pre><code>nano ~/docker-project/nginx/Dockerfile</code></pre></li>
                    <li>Add the following lines to the <code>Dockerfile</code> in the <code>nginx</code> directory:
                        <pre><code>FROM nginx
COPY ./default.conf /etc/nginx/conf.d/default.conf</code></pre></li>
                    <li>Update the <code>docker-compose.yml</code> file with the provided contents.</li>
                    <pre><code>version: "3.9"
services:
   nginx:
     build: ./nginx/
     ports:
       - 80:80
  
     volumes:
         - ./php_code/:/var/www/html/

   php:
     build: ./php_code/
     expose:
       - 9000
     volumes:
        - ./php_code/:/var/www/html/
                    </code></pre></li>
                    <li>Launch the containers:
                        <pre><code>cd ~/docker-project
docker-compose up -d</code></pre></li>
                    <li>Verify that the containers are running:
                        <pre><code>docker ps</code></pre></li>
                    <li>Access your PHP web content using the URL <code>http://your-server-ip</code> in a web browser.</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2>Step 3 — Create a MariaDB Container</h2>
                <ol>
                    <li>Edit the <code>docker-compose.yml</code> file to add an entry for a MariaDB container:
                        <pre><code>nano ~/docker-project/docker-compose.yml</code></pre></li>
                    <li>Update the <code>docker-compose.yml</code> file with the provided MariaDB configuration.
                        <!-- Replace [MariaDB Configuration] with your actual MariaDB configuration -->
                        <pre><code>version: "3.9"
services:
   nginx:
     build: ./nginx/
     ports:
       - 80:80
  
     volumes:
         - ./php_code/:/var/www/html/

   php:
     build: ./php_code/
     expose:
       - 9000
     volumes:
        - ./php_code/:/var/www/html/


   db:    
      image: mariadb  
      volumes: 
        -    mysql-data:/var/lib/mysql
      environment:  
       MYSQL_ROOT_PASSWORD: mariadb
       MYSQL_DATABASE: ecomdb 


volumes:
    mysql-data:</code></pre></li>
                    <li>Run the command:
                        <pre><code>docker-compose up -d</code></pre></li>
                    <li>Create a CLI session inside the MariaDB container:
                        <pre><code>docker exec -it [db container id or name] /bin/sh</code></pre></li>
                    <li>Access MariaDB as the root user:
                        <pre><code>mariadb -u root -pmariadb</code></pre></li>
                    <li>Create a new user for the database and grant all privileges to the new user.</li>
                    <pre><code> CREATE TABLE utente;
 CREATE utenti 'username'@'localhost' IDENTIFIED BY "password";
 GRANT ALL PRIVILEGES ON utente TO 'username'@'localhost';
 FLUSH PRIVILEGES;
                    </code></pre></li>
                    <li>Exit the MariaDB shell.</li>
                    <pre><code>exit</code></pre></li>
                    <li>Load product inventory information into the database using the provided SQL script.</li>
                    <pre><code>cat > db-load-script.sql <-EOF
USE utente;
CREATE TABLE utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO utenti (username, password) VALUES ('Stilton', 'stilton');

EOF</code></pre></li>
                    <li>Run the SQL script:</li>
                    <pre><code>mariadb -u root -pmariadb < db-load-script.sql</code></pre></li>
                    <li>Make sure that the <code>index.php</code> file in your PHP code is properly configured with the username and password to connect to the MariaDB database.</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-sE1DHoA8PfPv/gFJ8r+jzM8P9anQhiqE2ImFNmzx3sveZhLI1m4qAx3Dw3gX" crossorigin="anonymous"></script>
</body>
</html>

