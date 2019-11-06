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
                }
            });
        }
        else{
            $('#destination').html('<option value ="">Select Source First</option>');
        }
    });
});

