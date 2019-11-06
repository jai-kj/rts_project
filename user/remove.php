<?php
    include('../database.php');
    session_start();
    $userName = $_SESSION['login_user'];
    $bId = $_POST['bookingID'];
    $checkUser = "select u_name from booking,user where u_id = user_id and b_id = '$bId'";
    $resultUser = mysqli_query($conn, $checkUser);
    $user_name = mysqli_fetch_array($resultUser);
    if($userName == $user_name[0]){
        $seats = "select no_of_pass,train_id,s_type from booking where b_id ='$bId'";
        if($seat_Result = mysqli_query($conn, $seats)){
            $seatDetails = mysqli_fetch_array($seat_Result);
            $update = "update seats set seat_count = seat_count + '$seatDetails[0]' where t_id = '$seatDetails[1]' and seat_type = '$seatDetails[2]'";
            if(mysqli_query($conn, $update)){
                $delete_pass = " delete from passenger where book_id = '$bId'";
                if(mysqli_query($conn, $delete_pass)){
                    $delete_booking = "delete from booking where b_id = '$bId'";
                    if(mysqli_query($conn, $delete_booking)){    
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
