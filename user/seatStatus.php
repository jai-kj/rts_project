<?php
    include('../database.php');
    $trainId = $_POST['trainId'];
    $seatBooked = "select seat_count from seats where t_id = '$trainId'";
    $seatArray = array();
    if($seatResult = mysqli_query($conn, $seatBooked)){
        $seatArray[] = mysqli_fetch_all($seatResult);
    }
    mysqli_close($conn);
    print json_encode($seatArray);
?>