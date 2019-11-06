<?php
    include("database.php");
    $error = "";
    $select = "select * from security";
    $selectResult = mysqli_query($conn, $select);
    if(isset($_POST['reg_submit'])){
        $username = $_POST['username'];
        $mobNo = (string)$_POST['phoneNo'];
        $pass = $_POST['password'];
        $confirm_pass = $_POST['confirm_password'];
        $quesId = $_POST['security'];
        $answer = ucfirst($_POST['answer']);
        if($username =="" || $pass == "" || $confirm_pass == "" || $quesId == "" || $answer == ""){
            $error = "* All Fields Required";
        }
        elseif(strlen($mobNo) != 10){
            $error = "Mobile Number must be of 10 digits only!";
        }
        elseif($pass !== $confirm_pass){
            $error ="Passwords don't match";
        }
        else{
            $username = mysqli_real_escape_string($conn, $username);
            $pass = mysqli_real_escape_string($conn, $pass);
            $pass = md5($pass);

            $insert = "insert into user(u_name,u_pass,q_id,answer,mobNo) values('$username','$pass','$quesId','$answer','$mobNo')";
            $insertResult = mysqli_query($conn, $insert);
            if(!$insertResult){
                $error ="Username already exists!";
            }
            elseif($insertResult){
                header('Location:index.php');
            }
        }
    }
    mysqli_close($conn);
?>
