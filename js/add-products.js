function populateSubCategory(category_id){
    // console.log(category_id);
    var params = "category_id=" + category_id ;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'retrieve-subcategory.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = xhr.responseText;
        console.log(resp_json);
        $('#subcategory_id').html(resp_json);

    }
    xhr.send(params);

}