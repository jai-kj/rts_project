<?php include('login.php'); ?>
<?php include("./user/header.php"); ?>
<link rel="stylesheet" href="./css/index.css" type="text/css">
</head>

<body>
    <h1>Railway Ticketing System</h1>
    <div class="container" id="form-cont">
        <form action="" method="POST">
            <h3><strong>Login</strong></h3>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                <span class="error" style="color:red"><?php echo $error; ?></span>
            </div>
            <a href="newpass.php">Forgot Password?</a>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-light" value="Sign in" />
            </div>
            <div class="form-group">
                <a href="register.php">New User? Register Here</a>
            <div>
        </form>
    </div>
<?php include("./user/footer.php"); ?>
