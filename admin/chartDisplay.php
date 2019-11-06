<?php
    include("../database.php");
    $trainId = $_POST['trainId'];
    $passArray = array();
    $pass = "select book_id,pssg_id,pssg_name,pssg_age,pssg_gender,src,dest,s_type from passenger, booking,train where book_id = b_id and train_id = train_no and train_no = '$trainId' order by s_type";
    if($result = mysqli_query($conn, $pass)){
        while($row = mysqli_fetch_assoc($result)){
            $passArray[] = $row;
        }
    }
    mysqli_close($conn);
    print json_encode($passArray);
?>
