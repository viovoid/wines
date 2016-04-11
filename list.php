<table border="1">
	<tr>
		<th>EDIT</th>
		<th>Category 1</th>
		<th>Category 2</th>
		<th>Category 3</th>
		<th>Title</th>
		<th>% ABV</th>
		<th>Rating</th>
		<th>Notes</th>
	</tr>
	<?php foreach($reviews as $rev) {
		echo '<tr>'.
				'<td><a href="index.php?id='.$rev["id"].'">EDIT</a></td>'.
				'<td>'.$rev["c1"].'</td>'.
				'<td>'.$rev["c2"].'</td>'.
				'<td>'.$rev["c3"].'</td>'.
				'<td>'.$rev["title"].'</td>'.
				'<td>'.$rev["abv"].'</td>'.
				'<td>'.$rev["rating"].'</td>'.
				'<td>'.$rev["notes"].'</td>'.
			'</tr>';
	} ?>
</table>
