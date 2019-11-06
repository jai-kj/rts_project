<?php
    include("../database.php");
    $error = '';
    if(isset($_POST['newInsert'])){
        $route = $_POST['journey'];
        $tID = $_POST['trainId'];
        $tName = ucfirst($_POST['trainName']);
        $src = strtoupper($_POST['srcId']);
        $srcName = ucfirst($_POST['srcName']);
        $dest = strtoupper($_POST['destId']);
        $destname = ucfirst($_POST['destName']);
        $seats = array();
        $seatType = ['sleeper', '1AC', '2AC'];
        array_push($seats, $_POST['sleeperCount']);
        array_push($seats, $_POST['1AC_Count']);
        array_push($seats, $_POST['2AC_Count']);
        if($tID === "" || $tName === "" || $src === "" || $srcName === "" || $dest === "" || $destname === "" ){
            $error = "* All Fields Required";
        }
        else
        {
            $bool = true;
            for($i = 0; $i < 3 ; $i++){
                if($seats[$i] < 0){
                    $error = "Seat count can't be negative";
                    $bool = false;
                }
            }
            if($bool){
                if($route == 2){
                    if($tID % 2 != 0){
                        $trainId = $tID + 1;
                        $trainInsert2 = "insert into train values('$trainId','$tName','$dest','$src','$destname','$srcName')";
                    }
                    elseif($tId % 2 == 0){
                        $trainId = $tID - 1;
                        $trainInsert2 = "insert into train values('$trainId','$tName','$dest','$src','$destname','$srcName')";    
                    }
                    if(mysqli_query($conn, $trainInsert2)){
                        for($i = 0; $i < 3 ; $i++){
                            $seatInsert2 = "insert into seats values('$seatType[$i]','$trainId','$seats[$i]')";
                            mysqli_query($conn, $seatInsert2);
                        }
                    }
                    else{
                        $error = "Values of 2nd train not Inserted!";
                    }
                }
                $trainInsert = "insert into train values('$tID','$tName','$src','$dest','$srcName','$destname')";
                if(mysqli_query($conn, $trainInsert)){
                    for($i = 0; $i < 3 ; $i++){
                        $seatInsert = "insert into seats values('$seatType[$i]','$tID','$seats[$i]')";
                        mysqli_query($conn, $seatInsert);
                    }
                    echo "<script>alert('Values Inserted!');</script>";
                }
                else{
                $error = "Values not Inserted!";
                }
            }
            mysqli_close($conn);
        }
    }
?>
