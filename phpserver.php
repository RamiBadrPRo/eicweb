<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=eic", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    die();
    }

function check4type($type) {
    $ok = false;
    $a = ['png','jpg','jpeg','gif'];
    foreach ($a as $ty) {
      if(strtolower($type) == $ty){ $ok = true; break;}
    }
}
?>
