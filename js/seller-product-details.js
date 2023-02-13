//CONFIRM DELETE

$('div[id^="confirm-"]').hide();

function confirmShow() {
        $('#delete-discard').hide();
    setTimeout(function () {
        $('#confirm-discard').fadeIn('slow');
    }, 500);
}

function confirmHide() {
        $('#confirm-discard').hide();
    setTimeout(function () {
        $('#delete-discard').fadeIn('slow');
    }, 500);
}

function confirmDelete(id){
    console.log(id);
    var params = "product_id=" + id;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-delete-product.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "ok") {
            window.location.replace("seller-products.php");
        }
    }
    xhr.send(params);
}

function fileSelected()
{
    document.getElementById("select-text").innerHTML = "File Selected";
    $('.seller-image-upload').css("background-color", "#28a745");
    $('.seller-image-upload').css("color", "#fff");
}

function ndpFileSelected()
{
    $('#ndp-add-img').attr('src','img/design/add-img-selected.jpg');
    
}