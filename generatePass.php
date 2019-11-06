<?php 
    include("database.php");
    $uName = $_POST['username'];
    $newpass = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $newpass = md5($newpass);
    $insertPass = "update user set u_pass = '$newpass' where u_name = '$uName'";
    if($updatePass = mysqli_query($conn, $insertPass)){
        echo true;
    }
    else{
        echo false;
    }
    mysqli_close($conn);
?>