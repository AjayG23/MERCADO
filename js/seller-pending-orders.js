function acceptOrder(order_id,product_id){
    var params = "order_id=" + order_id + "&product_id=" + product_id ;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-accept-order.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        var resp_json = JSON.parse(xhr.responseText);
        if (resp_json.status == "ok") {
            window.location.replace("seller-pending-orders.php");
        }
    }
    xhr.send(params);
}