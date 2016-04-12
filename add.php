<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
	$(document).ready(function($) {
	  var list_target_id = 'cat1'; //first select list ID
	  var list_select_id = 'cat2'; //second select list ID
	 
	 
	  $('#'+list_select_id).change(function(e) {
		//Grab the chosen value on first select list change
		var selectvalue = $(this).val();
	 
		//Display 'loading' status in the target select list
		$('#'+list_target_id).html('<option value="">Loading...</option>');
	 
		if (selectvalue == "") {
			//Display initial prompt in target select if blank value selected
		   $('#'+list_target_id).html(initial_target_html);
		} else {
		  //Make AJAX request, using the selected value as the GET
		  $.ajax({url: 'ajax-getvalues.php?svalue='+selectvalue,
				 success: function(output) {
					//alert(output);
					$('#'+list_target_id).html(output);
				},
			  error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status + " "+ thrownError);
			  }});
			}
		});
	});
</script>
</head>
<body>
	<form name="wine" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<select id="cat" name="cat1">
				<option value="">Top-level category</option>
			<?php foreach($cat1List as $cat) {
				echo '<option value="'.$cat["id"].'">'.$cat["cat"].' - '.$cat["id"].'</option>';
			} ?>
		</select>
		<br>
		<select id="cat" name="cat2">
				<option value="">Mid-level category</option>
			<?php foreach($cat2List as $cat) {
				echo '<option value="'.$cat["id"].'">'.$cat["parent"].": ".$cat["cat"].' - '.$cat["id"].'</option>';
			} ?>
		</select>
		<br>
		<select id="cat" name="cat3">
				<option value="">Bottom-level category</option>
			<?php foreach($cat3List as $cat) {
				echo '<option value="'.$cat["id"].'">'.$cat["parent"].": ".$cat["cat"].' - '.$cat["id"].'</option>';
			} ?>
		</select>
		<br>
		Title:
		<input type="text" name="title" />
		<br>
		Rating :
		<input type="radio" name="rating" value="1" />1
		<input type="radio" name="rating" value="2" />2
		<input type="radio" name="rating" value="3" />3
		<input type="radio" name="rating" value="4" />4
		<input type="radio" name="rating" value="5" />5
		<br>
		Notes:
		<input type="text" name="notes" />
		<br>
		PIN:
		<input type="text" name="pin" size="10" />
		<input type="submit" name="add" value="Add" />	
	</form>
</body>
