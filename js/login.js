$(document).ready(function(){
    //signup
    $('.signup-details').on('submit', function(e) {
        e.preventDefault();
        var user_name = $(this).find('input[name="user_name"]').val();
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
                    var params2 = "user_name=" + user_name + "&email=" + email + "&mobile=" + mobile + "&password=" + password;
                    var xhr2 = new XMLHttpRequest();
                    xhr2.open('POST', 'submit-customer-signup.php', true);
                    xhr2.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr2.onload = function () {
                        var resp_json = JSON.parse(xhr2.responseText);
                        if (resp_json.status == "ok") {
                            console.log("Success: Id Added");
                            document.getElementById("signup-button").innerHTML = "Submit";
                            document.getElementById("signup-content").innerHTML = "Thank You For Signing Up !";
                            $("#sign-button").hide();
                            $(".signup-text").show();
                            $(".signup-form").hide();
            
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

    //login
    $('.login-form').on('submit', function(e) {
        e.preventDefault();
        console.log("enter login");
        var email = $(this).find('input[name="email"]').val();
        var password = $(this).find('input[name="password"]').val();
        

        document.getElementById("signup-button").innerHTML = "Submitting";
        var params =  "email=" + email + "&password=" + password;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'submit-login.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            console.log(xhr.responseText);
            var resp_json = JSON.parse(xhr.responseText);
            if (resp_json.status == "success") {
                console.log("Login Success");
                document.getElementById("login-response").innerHTML = "";
                if(resp_json.user_type==="C"){
                window.location.replace("index.php");
                }else if(resp_json.user_type==="S"){
                    window.location.replace("seller-home.php");
                }else{
                    window.location.replace("admin-home.php");
                }
            }
            else if(resp_json.status=="verify"){
                window.location.replace("verification.php");
            }
            else{
                document.getElementById("login-response").innerHTML = resp_json.status;

            }
           

        }
        xhr.send(params);
        
    });

     console.log("Document Ready");
});

$(".signup-form").hide();
function showSignForm(){
   
    $(".signup-text").hide();
    $(".signup-form").show();
    console.log("clocked");
}
