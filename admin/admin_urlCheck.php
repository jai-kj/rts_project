<?php 
    include('../urlCheck.php');
    if($login_session !== 'admin'){
        echo "Error viewing page! Please Login again";
        echo "<br><a href='/rts/index.php'>To Login, Click here</a>";
        session_destroy();
        header('Location:../logout.php');
    }
?>
