function computeCartTotal()
{
    user_id = $('#user_id').val();
    console.log(user_id);
    var params = "user_id=" + user_id;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'compute-cart-total.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "ok") {
            console.log(resp_json.total);
            $('.cart-total').html("₹"+resp_json.total);
        }
    }
    xhr.send(params);
}
function changeCartQuantity(product_id){
    quantity = $('.cart_quantity_'+product_id).val();
    var params = "product_id=" + product_id + "&quantity=" + quantity;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-change-cart-quantity.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "ok") {
            computeCartTotal();
        }
    }
    xhr.send(params);
}

function deleteCartItem(product_id){
    var params = "product_id=" + product_id ;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-delete-cart-item.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "ok") {
            computeCartTotal();
            $('.cart-item-'+product_id).html("<td colspan='3'>"+resp_json.product_name+" was removed from cart!</td>")
        }
    }
    xhr.send(params);
}
function deleteWishlistItem(product_id){
    var params = "product_id=" + product_id ;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-delete-wishlist-item.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "ok") {
            $('.cart-item-'+product_id).html("<td colspan='3'>"+resp_json.product_name+" was removed from wishlist!</td>")
        }
    }
    xhr.send(params);
}

function populateDistrict(state_id){
    // console.log(state_id);
    var params = "state_id=" + state_id ;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'retrieve-districts.php', true); 
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = xhr.responseText;
        console.log(resp_json);
        $('#district_id').html(resp_json);

    }
    xhr.send(params);

}

$('.add-address').on('submit', function(e) {
    e.preventDefault();
    
    var building_name = $(this).find('input[name="building_name"]').val();
    var street = $(this).find('input[name="street"]').val();
    var landmark = $(this).find('input[name="landmark"]').val();
    var zip = $(this).find('input[name="zip"]').val();
    var state_id = $(this).find('select[name="state_id"]').val();
    var district_id = $(this).find('select[name="district_id"]').val();
    $('.add-address-button').html("Submitting");

    var params =  "building_name=" + building_name + "&street=" + street + "&landmark=" + landmark + "&zip=" + zip + "&state_id=" + state_id + "&district_id=" + district_id;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-add-address.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "success") {
            window.location.replace("cart.php");
        }
    }
    xhr.send(params);
});

function proceedToCheckOut(){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-cart.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "ok") {
            console.log("successs");
            $("#sec-cart").hide();
            $("#sec-thankyou").show();
            setTimeout(function() {
                window.location.replace("index.php");

              }, 3000);
        }
    }
    xhr.send();
    console.log("working");
}

$(document).ready(function(){
    console.log("ready");
    computeCartTotal();
});

function checkoutErrFn(){
    $('.checkout-err').html("<h5>You Have an Item Out Of Stock In Your Cart. Please Remove To Proceed</h5>");

}


