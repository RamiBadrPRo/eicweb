<?php
$servername = "localhost";
$username = "root";
$password = "";//md5 of reverse of username

try {
    $conn = new PDO("mysql:host=$servername;dbname=scheduler", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    die();
    }
?>
