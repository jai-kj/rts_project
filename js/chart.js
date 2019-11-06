$(document).ready(function(){
    $("#source").on("change",function(){
        var source = $("#source").val();
        if(source){
            $.ajax({
                type: "POST",
                url: "../user/dest.php",
                data: {source: source},
                success: function(html){
                    $('#destination').html(html);
                    $('#train').html('<option value="">Select Source and Destination First</option>');
                }
            });
        }
        else{
            $('#destination').html('<option value ="">Select Source First</option>');
            $('#train').html('<option value ="">Select Source and Destination First</option>');
        }
    });
});

$(document).ready(function(){
    $('#trainChart').on("change",function(){
        var source = $("#source").val();
        var dest = $("#destination").val();
        if(source && dest){
            $.ajax({
                type: "POST",
                url: "../user/trainSearch.php",
                data: {source: source, destination: dest},
                success: function(html){
                    $('#train').html(html);
                }
            });
        }
        else{
            $('#train').html('<option value ="">Select Source and Destination First</option>');
        }

    });
});

function showChart(){
    var train = $('#train').val();
    if(train == ""){
        document.getElementById("error").innerHTML = "* All Train Details Required";
        return;
    }
    else{
        document.getElementById("error").innerHTML = "";
        $.ajax({
            type: 'POST',
            url: 'chartDisplay.php',
            datatype: 'json',
            data: {trainId : train},
            success: function(response){
                var result = JSON.parse(response);
                let output = ``;
                output += ` <table border="1" class="displayTables">
                            <tr>
                                <th>Booking ID</th>
                                <th>Pssg ID</th>
                                <th>Pssg Name</th>
                                <th>Pssg Age</th>
                                <th>Pssg Gender</th>
                                <th>Src</th>
                                <th>Dest</th>
                                <th>Seat Type</th>
                                <th>Status</th>
                            </tr>`;
                for(let row of result){
                    output += ` <tr>
                                    <td>${row['book_id']}</td>
                                    <td>${row['pssg_id']}</td>
                                    <td>${row['pssg_name']}</td>
                                    <td>${row['pssg_age']}</td>
                                    <td>${row['pssg_gender']}</td>
                                    <td>${row['src']}</td>
                                    <td>${row['dest']}</td>
                                    <td>${row['s_type']}</td>
                                    <td>Confirmed</td>
                                </tr>`;
                }
                document.getElementById("passDetails").innerHTML = output;
            }
        });
    }
}
