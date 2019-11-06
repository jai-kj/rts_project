function checkPass(){
    var username = $('#gUsername').val();
    var ques = $('#security').val();
    var ans = $('#answer').val();
    if(username == "" || ques == "" || ans == ""){
        document.getElementById('error').innerHTML = "* All Values Required";
    }
    else{
        document.getElementById('error').innerHTML = "";
        $.ajax({
            type: 'POST',
            url: 'checkPass.php',
            data: {u_name: username, question: ques, answer: ans},
            success: function(response){
                if(response == false){
                    document.getElementById('error').innerHTML = "Incorrect security question or security answer";
                    return;
                }
                else{
                    document.getElementById('error').innerHTML = "";
                    var output = ``;
                    output +=  `    <input type="password" class="form-control" id="newPassword" placeholder="Enter New Password" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="newConfirmPassword" placeholder="Confirm New Password" />
                                </div>
                                <div class="form-group">
                                    <input onclick="createNewPass();" name="gen_pass" class="btn btn-light" value="Create New Password"/>
                                </div>`;
                    document.getElementById('newPass').innerHTML = output;
                }
            }
        });
    }
}

function createNewPass(){
    var username = $('#gUsername').val();
    var newpass = $('#newPassword').val();
    var confirm_newpass = $('#newConfirmPassword').val();
    // alert(username+" "+newpass+" "+confirm_newpass);
    if(newpass === "" || confirm_newpass === ""){
        document.getElementById('error').innerHTML = "Passoword can't be Empty";
        return;
    }
    else if(newpass !== confirm_newpass){
        document.getElementById('error').innerHTML = "Passwords Entered doesn't Match";
        return;
    }
    else{
        document.getElementById('error').innerHTML = "";
        $.ajax({
            type: 'POST',
            url: 'generatePass.php',
            data: {
                    username: username,
                    newpassword: newpass
                },
            success:function(response){
                if(response == true){
                    alert('Password Updated');
                    window.location.href = "../index.php";
                }
                else if(response == false){
                    alert('Password could not be Updated');
                }
            }
        });
    }
}