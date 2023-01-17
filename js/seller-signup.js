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

        document.getElementById("signup-button").innerHTML = "Submitting";
        var params = "user_name=" + user_name + "&email=" + email + "&mobile=" + mobile + "&password=" + password;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'submit-customer-signup.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            var resp_json = JSON.parse(xhr.responseText);
            if (resp_json.status == "ok") {
                console.log("Success: Id Added");
                document.getElementById("signup-button").innerHTML = "Submit";
                document.getElementById("signup-content").innerHTML = "Thank You For Signing Up !";
                // $("#sign-button").hide();
                // $(".signup-text").show();
                // $(".signup-form").hide();

            }
           

        }
        xhr.send(params);
        console.log(user_name);
    });

   

     console.log("Document Ready");
});

