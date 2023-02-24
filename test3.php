<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0" />
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
	</script>
	
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js">
	</script>
	
	<link href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		rel="stylesheet" />

	<style>
		.typeahead {
			width: 50%;
			top: 60px !important;
			left: 50px !important;
		}
	</style>
</head>

<body style="text-align: center">
	<div>
		<b><p>Suggest the states of India</p></b>

		<input type="text" class="typeahead"
			data-provide="typeahead"
			placeholder="Enter name of states of India " />
	</div>

	<script>
	
		// Initializes input( name of states)
		// with a typeahead
		var $input = $(".typeahead");
		

		$input.keyup(function () {
			var current = $input.typeahead("getActive");
            console.log($input.val());
            // var search_word = $(this).val();
            // var params = "search_word="+ search_word;
            // if(search_word.length!=0){
            //     var xhr = new XMLHttpRequest();
            //     xhr.open('POST', 'retrieve-search.php', true);
            //     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            //     xhr.onload = function () {
            //         var resp_json = xhr.responseText;
            //         $('#search-now').html(resp_json);
            //         console.log(resp_json);
            //     }
            //     xhr.send(params); 
            $input.typeahead({
			source: [
				"Tamil",
                "Tarah",
                "talamae",
                "Taha",
				"West Bengal",
			],
			autoSelect: true,
		});
			matches = [];

			if (current) {

				// Some item from your input matches
				// with entered data
				if (current.name == $input.val()) {
					matches.push(current.name);

				}
			}
		});

	</script>
</body>

</html>
