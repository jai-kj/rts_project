function showcase()
{
    var src = $("#source").val();
    var dest = $("#destination").val();
    var t_id = $("#train").val();
    var s_type = $("#s_type").val();
    let output = ``;
    const id = document.getElementById("no_of_Pass").value;
    if(src == "" || dest == "" || t_id == "" || s_type == "" || id == ""){
        document.getElementById("error").innerHTML = "* All Train Details Required";
        return;
    }
    else{
        document.getElementById("error").innerHTML = "";
        for (var i=1;i<=id;i++){
            output += ` <h5>Passenger ${i}</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control" type="text" id="name${i}" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control" id="age${i}" placeholder = "Enter Age">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-control" id="gender${i}">
                                        <option value="">Select Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="O">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>`;
        }
        output += ` <div class="form-btn">
                        <input type="submit" name="book_ticket" id="book_ticket" class="btn submit-btn" value="Book"/>
                    </div><span id="book_error" style="color:red"></span>`;
        document.getElementById("passengerDetails").innerHTML = output;

        function allLetter(inputText){
            var letters = /^[A-Za-z ]+$/;
            if(inputText.value.match(letters)){
                return true;
            }
            else{
                return false;
            }
        }

        $("#book_ticket").on("click",function(){
            
            var pssg_name = new Array();
            var pssg_age = new Array();
            var pssg_gender = new Array();

            for(var i = 1; i <= id; i++){
                var check = allLetter(document.getElementById(`name${i}`));
                if(check == false){
                    document.getElementById('book_error').innerHTML = "Name should only contain alphabets!";
                    return;
                }
                else if(document.getElementById(`age${i}`).value <= 0){   
                    document.getElementById('book_error').innerHTML = "Age must be greater than 0";
                    return;
                }    
                else{
                    document.getElementById('book_error').innerHTML = "";   
                    pssg_name.push(document.getElementById(`name${i}`).value);
                    pssg_age.push(document.getElementById(`age${i}`).value);
                    pssg_gender.push(document.getElementById(`gender${i}`).value);
                }
            }
            for(var i = 1; i<= id; i++){
                if(pssg_name[i-1] == "" || pssg_age[i-1] == "" || pssg_gender[i-1] == ""){
                    document.getElementById("book_error").innerHTML = "* All Passenger Details Required";
                    return;
                }
            }
            document.getElementById("book_error").innerHTML = "";
            $.ajax({
                type: "POST",
                url: "bookTicket.php",
                data: { train_no: t_id, 
                    seat_type: s_type, 
                    no_of_pass: id, 
                    passeng_name: pssg_name,
                    passeng_age: pssg_age,
                    passeng_gender: pssg_gender 
                },
                success: function(data){
                    if(data == -10){
                        alert("Tickets are not available");
                    }
                    else if(data == false){
                        alert("Ticket Not Booked");
                    }
                    else{
                        alert("Ticket Booked");
                    }
                    window.location.replace("profile.php");
                }
            });
        });
    }
}
