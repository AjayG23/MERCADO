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

$('.add-rating').on('submit', function(e) {
    e.preventDefault();
    
    var product_id = $(this).find('input[name="product_id"]').val();
    var comment = $(this).find('textarea[name="rating_comment"]').val();
    var rating = $(this).find('select[name="form_rating"]').val();
    $('.rating-button').html("Submitting");

    var params =  "product_id=" + product_id + "&comment=" + comment + "&rating=" + rating ;
    console.log(params);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-rating.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "ok") {
            window.location.replace("product-details.php?id="+product_id);
        }
    }
    xhr.send(params);
});

$('.update-rating').on('submit', function(e) {
    e.preventDefault();
    
    var product_id = $(this).find('input[name="product_id"]').val();
    var review_id = $(this).find('input[name="review_id"]').val();
    var comment = $(this).find('textarea[name="rating_comment"]').val();
    var rating = $(this).find('select[name="form_rating"]').val();
    $('.update-rating-button').html("Updating");

    var params =  "product_id=" + product_id + "&comment=" + comment + "&rating=" + rating + "&review_id=" + review_id ;
    console.log(params);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-update-rating.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "ok") {
            window.location.replace("product-details.php?id="+product_id);
        }
    }
    xhr.send(params);
});