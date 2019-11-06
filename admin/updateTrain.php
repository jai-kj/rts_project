<?php include('../user/booking.php'); ?>
<div class="container my-5">
    <form action="" method="POST" id="inputForm">
        <h3>View Train Details</h3>
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
        <div class="row">
            <input type="submit" name="showTrains" class="btn submit-btn" value="Show All Trains" />
        </div>
        <div id="trains" style="overflow-x:auto">
            <?php
            include("../database.php");
            if(isset($_POST['showTrains'])){
                $_src = $_POST['source'];
                $_dest = $_POST['destination'];
                if(!empty($_src) && !empty($_dest)){
                    $show = "select * from train where src = '$_src' and dest= '$_dest'";
                }
                else{
                    $show = "select * from train";
                }
                $result = mysqli_query($conn, $show);
                $tableRows = mysqli_num_rows($result);
                echo "<table border='1' class='displayTables'><tr><th>Train Id</th><th>Train Name</th><th>Source Id</th><th>Source Name</th><th>Destination Id</th><th>Destination Name</th><th>Sleeper</th><th>1AC</th><th>2AC</th></tr>";
                }
                ?>
            <?php while($row = mysqli_fetch_array($result)):; ?>
            <?php 
                $sleeper = "select seat_count from seats where t_id = '$row[0]' and seat_type = 'sleeper'";
                $_1AC = "select seat_count from seats where t_id = '$row[0]' and seat_type = '1AC'";
                $_2AC = "select seat_count from seats where t_id = '$row[0]' and seat_type = '2AC'";
                $sleeperResult = mysqli_query($conn, $sleeper);
                $sleeperCount = mysqli_fetch_array($sleeperResult);
                $_1ACResult = mysqli_query($conn, $_1AC);
                $_1ACCount = mysqli_fetch_array($_1ACResult);
                $_2ACResult = mysqli_query($conn, $_2AC);
                $_2ACCount = mysqli_fetch_array($_2ACResult);
            ?>
            <tr>
                <td><?php echo $row['train_no']; ?></td>
                <td><?php echo $row['t_name']; ?></td>
                <td><?php echo $row['src']; ?></td>
                <td><?php echo $row['src_name']; ?></td>
                <td><?php echo $row['dest']; ?></td>
                <td><?php echo $row['dest_name']; ?></td>
                <td><?php echo $sleeperCount[0]; ?></td>
                <td><?php echo $_1ACCount[0]; ?></td>
                <td><?php echo $_2ACCount[0]; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <label>No. of Trains : <?php echo $tableRows ?>
        <?php mysqli_close($conn); ?>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/search_admin.js"></script>


