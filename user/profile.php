<?php 
    include('../urlCheck.php');
?>
<?php include("booking.php"); ?>
<?php include("header.php"); ?>
<link rel="stylesheet" href="../css/profile.css" type="text/css">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="container my-5" id="bookContainer">
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post" id="book-ticket">
                    <h3 style= "text-align: center"><strong>BOOK TICKET</strong></h3>
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
                <div class="form-btn mb-4">
                    <input onclick="seatStatusDetails();" type="button" name ="seat_details" id="seat_details" class="btn submit-btn" value="Show Seats Availability" style="background-color: #343A40"/>
                </div>
                <div id="seatings"></div>
                <div class="row my-4">
                    <div class="col-md-6 mb-4">
                        <label for="seat">Seat Type</label>
                        <select name="s_type" id="s_type" class="custom-select form-control">
                            <option value="">Select Seat Type</option>
                            <?php while($row_seatType = mysqli_fetch_array($result3)):; ?>
                            <option value="<?php echo $row_seatType[0]; ?>">
                                <?php 
                                    switch($row_seatType[0]){
                                        case 'sleeper': $fare = 375;
                                                        break;
                                        case '1AC': $fare = 750;
                                                    break;
                                        case '2AC': $fare = 1500;
                                                    break; 
                                    }
                                    echo $row_seatType[0]." = ₹".$fare; 
                                ?>
                            </option>
                            <?php endwhile; ?> 
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="seat">No. of Passengers</label>
                        <select name="no_of_Pass" id="no_of_Pass" class="custom-select form-control">
                            <option value="">Select Count</option>
                            <?php for($i = 1; $i<= 6;$i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';}?>
                        </select>
                    </div>
                </div>
                <div class="form-btn">
                    <input onclick="showcase();" type="button" name ="pass_details" id="pass_details" class="btn submit-btn" value="Enter Passenger Details"/>
                </div>
            </div>
        </div>
        <span id="error" style="color: red;"></span>
        <div id="passengerDetails"></div>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/train.js"></script>
    <script type="text/javascript" src="../js/ticket.js"></script>
</body>
<?php include("footer.php"); ?>
