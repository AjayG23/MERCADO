$(document).ready(function(){
    // var Id = document.getElementById('id').value;
    // $('.add-form').on('submit', function(e) {
    //     e.preventDefault();
    //     var id = $(this).find('input[name="id"]').val();
    //     document.getElementById("submit-Id").innerHTML = "Submitting";
    //     var params = "Id=" + id;
    //     var xhr = new XMLHttpRequest();
    //     xhr.open('POST', 'submit-data.php', true);
    //     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    //     xhr.onload = function () {
    //         var resp_json = JSON.parse(xhr.responseText);
    //         if (resp_json.status == "ok") {
    //             console.log("Success: Id Added");
    //             document.getElementById("submit-Id").innerHTML = "Submit";
    //         }

    //     }
    //     xhr.send(params);
    // });

     console.log("Document Ready");
});

$(".signup-form").hide();
function showSignForm(){
   
    $(".signup-text").hide();
    $(".signup-form").show();
    console.log("clocked");
}