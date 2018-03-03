<?php
include "phpserver.php";
$name =  $entry = "";
if(isset($_POST["name"]) &&  !empty($_POST["name"])) {
    if(isset($_POST["entry"]) && preg_match("/[*_]{20}/",$_POST["entry"])) {
    $name = $_POST["name"];
    $entry = $_POST["entry"];
    $addNew = $conn->prepare("INSERT INTO lists values(NULL,:name,:entry);");
    $addNew->execute(Array(
        ":name"=>$name,
        ":entry"=>$entry
    ));
    echo "success";
    }
}
else { echo "1: Veuillez ecrire un nom ou groupe"; }
?>