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

$('.add-stock').on('submit', function(e) {
    e.preventDefault();
    
    var product_id = $(this).find('input[name="product_id"]').val();
    var quantity = $(this).find('input[name="quantity"]').val();
    $('.add-stock-btn').html("Adding");

    var params =  "product_id=" + product_id + "&quantity=" + quantity ;
    console.log(params);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-add-stock.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "ok") {
            window.location.replace("seller-product-details.php?id="+product_id);
        }
    }
    xhr.send(params);
});