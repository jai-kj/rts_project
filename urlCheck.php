<?php
    include("login.php");
    $login_session = $_SESSION['login_user'];
    if(!isset($login_session))
    {
    	//Do not allow anyone to access by page by clicking back button.
        echo "Error viewing page! Please Login again";
        echo "<br><a href='../'>To Login, Click here</a>";
        session_destroy();
        header("logout.php");
        exit;
    }
?>
