
// $(document).on('keyup', '.bs-searchbox input', function(e) {
//     console.log($(this).val());
//     var search_word = $(this).val();
//     var params = "search_word="+ search_word;
//     if(search_word.length!=0){
//         var xhr = new XMLHttpRequest();
//         xhr.open('POST', 'retrieve-search.php', true);
//         xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//         xhr.onload = function () {
//             var resp_json = xhr.responseText;
//             $('#search-ul').html(resp_json);
//             console.log(resp_json);
//         }
//         xhr.send(params); 
//     }else{
//         $('#search-ul').html("");
//     }
// });

$('#search-bar').keyup(function() {
    var search_word = $('#search-bar').val();
    var params = "search_word="+ search_word;
    if(search_word.length!=0){
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'retrieve-search.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            var resp_json = xhr.responseText;
            $('#search-ul').html(resp_json);
        }
        xhr.send(params); 
    }else{
        $('#search-ul').html("");
    }
    console.log(search_word);
    

    
});