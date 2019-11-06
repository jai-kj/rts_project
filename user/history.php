<?php include('../urlCheck.php'); ?>
<?php include('header.php'); ?>
<link rel="stylesheet" href="../css/history.css" type="text/css">
</head>
<body>
    <?php 
        include('navbar.php');
        include('../database.php');
        $loginId = $_SESSION['login_id'];
        $booking = "select * from booking where u_id = '$loginId' order by b_id desc";
        $bookResult1 = mysqli_query($conn, $booking);
    ?> 
    <div class="container">
        <br><h3><strong>Your Previous Bookings</strong></h3>
        <?php while($bookingResult = mysqli_fetch_array($bookResult1)):; ?>
        <?php $sum = 0; ?>
            <div id="tickets">
                <div class="row" id="ticketStyle">
                    <div class="col-md-4 col-6">
                        Booking Id: <?php echo $bookingResult['b_id']; ?>
                    </div>
                    <div class="col-md-4 col-6">
                        Seat Type: <?php echo $bookingResult['s_type']; ?>
                    </div>
                    <div class="col-md-4">
                        Price: 
                        <?php
                            switch($bookingResult['s_type']){
                                case 'sleeper': $fare = 375;
                                                break;
                                case '1AC': $fare = 750;
                                            break;
                                case '2AC': $fare = 1500;
                                            break; 
                            }
                            $sum = $fare * $bookingResult['no_of_pass'];
                            echo "₹".$sum;
                        ?>
                    </div>
                </div>
                <?php
                    $passDetail = "select * from passenger where book_id = '$bookingResult[0]'";
                    $passRecord = mysqli_query($conn, $passDetail);
                    $train = "select src,dest from train,booking where train_no = train_id and train_id= '$bookingResult[3]'";
                    $trainDetails = mysqli_query($conn, $train);
                    $trains = mysqli_fetch_array($trainDetails);
                ?>
                <div class="row" id="ticketStyle">
                    <div class="col-md-4">
                        Train Id: <?php echo $bookingResult[3]; ?>
                    </div>
                    <div class="col-md-4 col-6">
                        Source: <?php echo $trains[0]; ?>
                    </div>
                    <div class="col-md-4 col-6">
                        Destination : <?php echo $trains[1]?>
                    </div>
                </div>
                <div class="row" id="tableStyle">
                    <div class="col-lg-12">Passenger Details</div>
                    <table id="ticketTable">
                            <tr><th id="row-name">Name</th><th id="row-age">Age</th><th id="row-gender">Gender</th></tr>
                            <?php while($passengers = mysqli_fetch_array($passRecord)):; ?>
                            <tr>
                                <td><?php echo $passengers['pssg_name']; ?></td>
                                <td><?php echo $passengers['pssg_age']; ?></td>
                                <td><?php echo $passengers['pssg_gender']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                    </table>
                </div>
            </div>
        <?php endwhile; ?>   

    <form action="" id="ticketDetail">
        <label for="remove">Ticket</label>
        <input name="remove" class="form-control" type="number" placeholder="Enter Booking ID" />
        <input onclick="remove()" type="button" name ="removeTicket" id="removeTicket" class="btn submit-btn" style="background-color: red" value="Cancel Ticket" />
    </form>

</body>
<script type="text/javascript" src="../js/remove.js"></script>
<?php include('footer.php'); ?>
