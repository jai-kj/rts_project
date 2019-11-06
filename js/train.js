$(document).ready(function(){
    $("#source").on("change",function(){
        var source = $("#source").val();
        if(source){
            $.ajax({
                type: "POST",
                url: "dest.php",
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
    $('#book-ticket').on("change",function(){
        var source = $("#source").val();
        var dest = $("#destination").val();
        if(source && dest){
            $.ajax({
                type: "POST",
                url: "trainSearch.php",
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

function seatStatusDetails(){
    var t_id = $("#train").val();
    if(t_id == ""){
        document.getElementById("error").innerHTML = "* All Train Details Required";
        return;
    }
    else{
        document.getElementById("error").innerHTML = "";
        $.ajax({
            type: 'POST',
            url: 'seatStatus.php',
            datatype: 'json',
            data: {trainId: t_id},
            success: function(response){
                var seatResult = JSON.parse(response);
                let seatOutput = ``;
                seatOutput += ` <table border="1" class="tables">
                                <tr><th>Sleeper</th><th>1AC</th><th>2AC</th></tr>
                                <tr><td>${seatResult[0][0]}</td><td>${seatResult[0][1]}</td><td>${seatResult[0][2]}</td></tr>
                                </table>`;
                document.getElementById("seatings").innerHTML = seatOutput;
            }
        });
    }
}
