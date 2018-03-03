<?php
include "phpserver.php";
$name = $descr =  "";
if(isset($_POST["name"]) && isset($_POST["descr"]) && !empty($_POST["name"]) && !empty($_POST["descr"])) {
    $name = $_POST["name"];
    $descr = $_POST["descr"];
    $addNew = $conn->prepare("INSERT INTO gr values(NULL,:name,:descr);");
    $addNew->execute(Array(
        ":name"=>$name,
        ":descr"=>$descr
    ));
    echo "Success";
}
else {
    echo "hi";
}
?>