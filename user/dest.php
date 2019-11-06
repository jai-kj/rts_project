<?php
    include("../database.php");
    if(!empty($_POST['source'])){
        $src = $_POST['source'];
        $destDetail = "select distinct(dest),dest_name from train where src = '$src' order by dest";
        if($dest = mysqli_query($conn, $destDetail)){
            echo '<option value ="">Select Destination</option>';
            while($row = mysqli_fetch_array($dest)){
                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
            }
        }else{
            echo '<option value="">No Destinations Available</option>';
        }
    }
    mysqli_close($conn);
?>