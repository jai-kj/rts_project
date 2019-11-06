<?php include('./user/header.php'); ?>
<link rel="stylesheet" href="./css/index.css" type="text/css">
</head>

<body>
    <div class="container" id="form-cont">
        <form action="" method="POST">
            <h3><strong>Forgot Password</strong></h3>
            <div class="form-group">
                <input type="text" class="form-control" name="gUsername" id="gUsername" placeholder="Enter Username">
            </div>
            <div class="form-group" style="text-align:left" id="select">
                <?php 
                    include_once('database.php');
                    $select = "select * from security";
                    $selectResult = mysqli_query($conn, $select);
                ?>
                <label for="security">Security Question</label>
                <select name="security" id="security" class="custom-select form-control">
                    <option value="">Select security question</option>
                    <?php while($selectques = mysqli_fetch_array($selectResult)):; s?>
                    <option value="<?php echo $selectques[0]; ?>"><?php echo $selectques[1]; ?></option>
                    <?php endwhile; mysqli_close($conn); ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" id="answer" name="answer" class="form-control" placeholder="Enter Answer" />
            </div>
            <div class="form-group">
                <input onclick="checkPass()" name="check_pass" class="btn btn-light" value="Check Details" />
            </div>
            <div class="form-group" id="newPass"></div>
            <span style="color:red" id="error"></span>
            <div class="form-group">
                <a href="index.php">Continue to Login</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="./js/createPass.js"></script>
<?php include('./user/footer.php'); ?>
