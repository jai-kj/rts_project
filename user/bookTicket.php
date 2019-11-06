<?php
    session_start();
    include("../database.php");
    $passCount = $_POST['no_of_pass'];
    $loginId = $_SESSION['login_id'];
    $trainId = $_POST['train_no'];
    $seatType = $_POST['seat_type'];
    $pssg_name = $_POST['passeng_name'];
    $pssg_age = $_POST['passeng_age'];
    $pssg_gender = $_POST['passeng_gender'];

    $seatStatus = "select seat_count from seats where t_id = '$trainId' and seat_type = '$seatType'";
    if($seatBooked = mysqli_query($conn, $seatStatus)){
        $seatCount = mysqli_fetch_array($seatBooked);
        if($seatCount[0] < $passCount){
            echo -10;
        }
        else{
            $booking_Id = null;
            $search_bId = "select max(b_id) from booking";
            if($result_bID = mysqli_query($conn, $search_bId)){
                $row_bId = mysqli_fetch_array($result_bID);
                $booking_Id = $row_bId[0] + 1;
            }
            else{
                $booking_Id = 1;
            }
            $insert = "insert into booking(b_id,no_of_pass,u_id,train_id,s_type) values ('$booking_Id','$passCount', '$loginId', '$trainId', '$seatType')";
            
            if($result = mysqli_query($conn, $insert)){
                $update = "update seats set seat_count = seat_count - '$passCount' where t_id = '$trainId' and seat_type = '$seatType'";
                if($seatResult = mysqli_query($conn, $update)){
                    $passenger = ``;
                    for($i = 0; $i < $passCount; $i++){
                        $passengerDetails = "insert into passenger(book_id,pssg_name,pssg_age,pssg_gender) values('$booking_Id','$pssg_name[$i]','$pssg_age[$i]','$pssg_gender[$i]')";
                        if(mysqli_query($conn, $passengerDetails)){
                            echo true;
                        }
                        else{
                            echo false;
                        }
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
    }
    else{
        echo false;
    }
?>  
