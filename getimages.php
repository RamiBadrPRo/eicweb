<?php
include 'phpserver.php';
$getImages = $conn->query('SELECT url,title,description from images');
echo json_encode($getImages->fetchAll());
?>
