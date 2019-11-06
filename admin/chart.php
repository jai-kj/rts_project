<?php 
    include('admin_urlCheck.php'); 
    include("../user/header.php"); 
    include("../user/booking.php"); 
    if($_SESSION['login_user'] !== 'admin'){
        header('Location:../logout.php');
	}
?>
<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php include('admin_nav.php'); ?>
    <div class="container my-5">
        <div id="inputForm">
            <div class="row">
                <div class="col-lg-12">
                    <form id="trainChart">
                        <h3 style= "text-align: center"><strong>Show Train Chart</strong></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="source">From</label>
                                    <select name="source" id="source" class="custom-select form-control">
                                        <option value="">Select Source</option>
                                        <?php while($row_src = mysqli_fetch_array($result1)):; ?>
                                        <option value="<?php echo $row_src[0]; ?>"><?php echo $row_src[1] ; ?></option>
                                        <?php endwhile; ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="destination">To</label>
                                    <select name="destination" id="destination" class="custom-select form-control">
                                        <option value="">Select Source First</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="train">Train</label>
                            <select name="train" id="train" class="custom-select form-control">
                                <option value="">Select Source and Destination First</option> 
                            </select>
                        </div>
                    </div>
                    <div class="form-btn">
                        <input onclick="showChart();" type="button" name="chartShow" id="chartShow" class="btn submit-btn" value="Show Chart" />
                    </div>
                </div>  
            </div>
            <span id="error" style="color: red;"></span>
            <div class="row" id="passDetails" style="overflow-x:auto"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/chart.js"></script>
    <script type="text/javascript" src="../js/admin.js"></script>
</body>
<?php include("../user/footer.php"); ?>
