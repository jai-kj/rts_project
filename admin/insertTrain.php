<?php include('insertNewDb.php'); ?>
<div class="container my-5">
    <form action="" method="POST" id="inputForm">
        <h3>Insert New Train Details</h3>
        <div class="row">
            <div class="col-md-6">
                <input type="radio" name="journey" value="1" checked>One-way Train Route
            </div>
            <div class="col-md-6">
                <input type="radio" name="journey" value="2">Two-way Train Route
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <input type="number" name="trainId" id="trainId" class="form-control" placeholder="Enter Train Id" />
            </div>
            <div class="col-md-6">
                <input type="text" name="trainName" id="trainName" class="form-control" placeholder="Enter Train name" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="srcId" id="srcId" class="form-control" placeholder="Enter Source Id" />
            </div>
            <div class="col-md-3">    
                <input type="text" name="srcName" id="srcName" class="form-control" placeholder="Enter Source Name" />
            </div>
            <div class="col-md-3">
                <input type="text" name="destId" id="destId" class="form-control" placeholder="Enter Destination Id" />
            </div>
            <div class="col-md-3">
                <input type="text" name="destName" id="destName" class="form-control" placeholder="Enter Destination Name" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <input type="number" name="sleeperCount" id="sleeperCount" class="form-control" placeholder="Enter Sleeper seats" />
            </div>
            <div class="col-md-4">
                <input type="number" name="1AC_Count" id="1AC_Count" class="form-control" placeholder="Enter 1AC seats" />
            </div>
            <div class="col-md-4">
                <input type="number" name="2AC_Count" id="2AC_Count" class="form-control" placeholder="Enter 2AC seats" />
            </div>
        </div>
        <div class="row">
            <input type="submit" name="newInsert" id="newInsert" class="btn submit-btn" value="Insert" />
        </div>
        <span style="color:red;"><?php echo $error ?></span>
    </form>
</div>
