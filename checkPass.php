<?php 
    include("database.php");
    $uName = mysqli_real_escape_string($conn, $_POST['u_name']);
    $quesId = $_POST['question'];
    $ans = mysqli_real_escape_string($conn, ucfirst($_POST['answer']));
    $check = "select q_id,answer from user where u_name = '$uName'";
    if($checkRes = mysqli_query($conn, $check)){
        $checkDetail = mysqli_fetch_array($checkRes);
        if($quesId === $checkDetail['q_id']){
            if($ans === $checkDetail['answer']){
                echo true;
            }
            else{
                echo false;
            }
        }
        else{
            echo false;
        }
    }
    else{
        echo false;
    }
    mysqli_close($conn);
?>