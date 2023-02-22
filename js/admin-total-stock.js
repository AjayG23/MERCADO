$('.form-stock-data').on('submit', function(e) {
    e.preventDefault();
    
    var start_date = $(this).find('input[name="start_date"]').val();
    var end_date = $(this).find('input[name="end_date"]').val();
    var seller_id = $(this).find('select[name="seller_id"]').val();
    $('.stock-button').html("Submitting");
    window.location.replace("admin-total-stock.php?start_date="+start_date+"&end_date="+end_date+"&seller_id="+seller_id);
});