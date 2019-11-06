<?php  
    include("../database.php");
    if(!empty($_POST['source']) && !empty($_POST['destination'])){
        $src = $_POST['source'];
        $dest = $_POST['destination'];
        $train = "select train_no,t_name from train where src = '$src' and dest = '$dest' order by train_no";
        $details = mysqli_query($conn, $train);
        $count = mysqli_num_rows($details);
        if($count > 0){
            echo '<option value ="">Select Train</option>';
            while($row = mysqli_fetch_assoc($details)){
                echo '<option value="'.$row['train_no'].'">'.$row['train_no'].' '.$row['t_name'].'</option>';
            }
        }else{
            echo '<option value="">No Trains Available</option>';
        }
    }
    mysqli_close($conn);
?>