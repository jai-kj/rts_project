function remove(){
    var bId = $("input[name=remove]").val();
    if(bId === "")
    {
        alert("Book Id can't be empty");
    }
    else{
        var r = confirm("Do you want to cancel the Ticket?");
        if(r == true){
            $.ajax({
                type: "POST",
                url: "remove.php",
                data: {
                    bookingID: bId
                },
                success: function(data){
                    if(data == true){
                        alert("Ticket Cancelled");
                    }
                    else if(data == false){
                        alert("Ticket Not Cancelled");
                    }
                    window.location.replace("history.php");
                }
            });
        }
    }
}
