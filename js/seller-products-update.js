$(document).ready(function(){
    
    $('.seller-products-update').on('submit', function(e) { 
        e.preventDefault();
        var product_name = $(this).find('input[name="name"]').val();
        var category_id = $(this).find('select[name="category_id"]').val();
        var description = $(this).find('textarea[name="description"]').val();
        var quantity = $(this).find('input[name="quantity"]').val();
        var mrp = $(this).find('input[name="mrp"]').val();
        var discount = $(this).find('input[name="discount"]').val();
        var product_id = $(this).find('input[name="product_id"]').val();

         
            var params = "product_name=" + product_name + "&category_id=" + category_id + "&description=" + description + "&quantity=" + quantity+ "&mrp=" + mrp+ "&discount=" + discount + "&product_id=" + product_id ;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'submit-seller-products-update.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                console.log(xhr.responseText);
                var resp_json = JSON.parse(xhr.responseText);
                if (resp_json.status == "ok") {
                    document.getElementById("update-response").innerHTML = "Updated successfully You Will Be Redirected In 3 Seconds";

                    setTimeout(function() {

                        window.location.replace("seller-product-details.php?id="+product_id);

                      }, 3000);       
                
               
                }}
            xhr.send(params);
        });  

     console.log("Document Ready");
});

function populateSubCategory(category_id){
    var category_id_now = $(this).find('input[name="category_id_now"]').val();
    // console.log(state_id);
    var params = "category_id=" + category_id ;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'retrieve-subcategory.php', true); 
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = xhr.responseText;
        console.log(resp_json);
        $('#category_id').html(resp_json);

    }
    xhr.send(params);

}
