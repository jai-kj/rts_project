<?php
    include("config.php");
    $conn = mysqli_connect($configuration['server'],$configuration['username'],$configuration['password'],$configuration['database']);
    if(!$conn){
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
?>