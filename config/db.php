<?php
function getConnection(): PDO{
    $host = "localhost";
    $port = 3306;
    $database = "db_perpus";
    $username = "root";
    $password = "devola3465";

    return new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
}
?>