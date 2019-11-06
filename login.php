<?php
    session_start();
    $error = "";
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Define $username and $password
        if (empty($username) || empty($password)) {
            $error = "Username or Password can't be empty";
        }
        else{
            if($username === "admin" && $password === "admin@jai.23"){
                $_SESSION['login_user'] = $username;
                header("Location:./admin/admin.php");
            }
            else{
                include("database.php");

                //To protect MySQL injection for Security purpose
                $username = mysqli_real_escape_string($conn, $username);
                $password = mysqli_real_escape_string($conn, $password);
                $password = md5($password);
                $search = "select user_id,u_name,u_pass from user where u_name = '$username'";
                if($result = mysqli_query($conn, $search)){
                    $db_user = mysqli_fetch_array($result);
                    if($username == $db_user['u_name']){
                        if($password == $db_user['u_pass']){
                            $_SESSION['login_id'] = $db_user['user_id'];
                            $_SESSION['login_user'] = $db_user['u_name']; // Initializing Session
                            header("location: ./user/profile.php"); // Redirecting To Other Page        
                        }
                        else{
                            $error = "Password is Incorrect";
                        }
                    }
                    else{
                        $error = "Username doesn't Exist";
                    }
                }
                else{
                    $error = "Invalid Username";
                }  
                mysqli_free_result($result); // Closing Connection
                mysqli_close($conn);
            }
        }
    }
?>