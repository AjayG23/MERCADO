$(document).ready(function(){
    //signup
    $('.signup-details').on('submit', function(e) {
        e.preventDefault();
        var user_name = $(this).find('input[name="user_name"]').val();
        var unit_name = $(this).find('input[name="unit_name"]').val();
        var email = $(this).find('input[name="email"]').val();
        var mobile = $(this).find('input[name="mobile"]').val();
        var password = $(this).find('input[name="password"]').val();
        var c_password = $(this).find('input[name="c_password"]').val();
        if(password===c_password)
        {
            var params = "email=" + email + "&mobile=" + mobile ;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'crosscheck-signup.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                console.log(xhr.responseText);
                var resp_json = JSON.parse(xhr.responseText);
                if (resp_json.status == "ok") {
                        
                    document.getElementById("signup-button").innerHTML = "Submitting";
                    var params2 = "user_name=" + user_name + "&unit_name=" + unit_name + "&email=" + email + "&mobile=" + mobile + "&password=" + password;
                    var xhr2 = new XMLHttpRequest();
                    xhr2.open('POST', 'submit-seller-signup.php', true);
                    xhr2.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr2.onload = function () {
                        var resp_json = JSON.parse(xhr2.responseText);
                        if (resp_json.status == "ok") {
                            console.log("Success: Id Added");
                            document.getElementById("signup-button").innerHTML = "Submit";
                            document.getElementById("thankyou-response").innerHTML = "Thank You For Signing Up !";
                            $(".signup-details").hide();
                            $(".header-hide").hide();
                        }
                    

                    }
                    xhr2.send(params2);
                }
                else{
                    document.getElementById("signup-response").innerHTML = resp_json.status;
                }
               
    
            }
            xhr.send(params);
            
        }
        else{
                document.getElementById("signup-response").innerHTML = "Password Mismatch";
            }

    });

   

     console.log("Document Ready");
});

