<?php
    include("register_db.php");
?>
<?php include("./user/header.php"); ?>
<link rel="stylesheet" href="./css/index.css" type="text/css">
</head>

<body>    
    <div class="container" id="form-cont">
        <form action="" method="POST">
            <h3><strong>Register</strong></h3>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="phoneNo" id="phoneNo" placeholder="Enter Mobile Number" />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password" />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" />
            </div>
            <div class="form-group" style="text-align:left" id="select">
                <label for="security">Security Question</label>
                <select name="security" id="security" class="custom-select form-control">
                    <option value="">Select security question</option>
                    <?php while($selectques = mysqli_fetch_array($selectResult)):; s?>
                    <option value="<?php echo $selectques[0]; ?>"><?php echo $selectques[1]; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" id="answer" name="answer" class="form-control" placeholder="Enter Answer" />
                <span class="error" style="color:red"><br><?php echo $error; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="reg_submit" class="btn btn-light" value="Sign up" />
            </div>
            <div class="form-group">
                <a href="index.php">Registered? Login Now</a>
            <div>
        </form>
    </div>
<?php include("./user/footer.php"); ?>
