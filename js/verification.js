$(document).ready(function(){
    $('.verification-form').on('submit', function(e) {
        e.preventDefault();
        
        var otp = $(this).find('input[name="otp"]').val();
        

        document.getElementById("verify-button").innerHTML = "Submitting";
        var params =  "otp=" + otp;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'submit-verification.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            var resp_json = JSON.parse(xhr.responseText);
            if (resp_json.status == "success") {
                window.location.replace("index.php");
            }
            else{

                document.getElementById("otp-response").innerHTML = resp_json.status;
                document.getElementById("verify-button").innerHTML = "Submit";

                if(resp_json.attempt===3)
                {
                    document.getElementById("verify-button").disabled = true;

                    setTimeout(function() {
                        window.location.replace("index.php");

                      }, 3000);
                }

            }
           

        }
        xhr.send(params);
        
    });

     
});