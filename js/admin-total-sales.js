$('.form-sales-data').on('submit', function(e) {
    e.preventDefault();
    
    var start_date = $(this).find('input[name="start_date"]').val();
    var end_date = $(this).find('input[name="end_date"]').val();
    $('.stock-button').html("Submitting");
    window.location.replace("admin-total-sales.php?start_date="+start_date+"&end_date="+end_date);
});