function addToCart(product_id)
{
    console.log(product_id);
    var params = "product_id=" + product_id;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-add-cart.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "ok") {
            window.location.replace("product-details.php?id="+product_id);
        }
    }
    xhr.send(params);
}
function addToWishlist(product_id)
{
    console.log(product_id);
    var params = "product_id=" + product_id;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-add-wishlist.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "ok") {
            window.location.replace("product-details.php?id="+product_id);
        }
    }
    xhr.send(params);
}