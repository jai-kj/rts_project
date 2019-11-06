<?php
    include("../database.php");
    $seek_src = "select distinct(src),src_name from train order by src";
    $seek_seatType = "select distinct(seat_type) from seats";
    $result1 = mysqli_query($conn, $seek_src);
    $result3 = mysqli_query($conn, $seek_seatType);  
    mysqli_close($conn);
?>
