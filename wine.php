<head>
	<title>Wine</title>
	<style type="text/css">
		body {color: white; background: black;}
	</style>
</head>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'GET') {

	}

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$controller = new Controller();
		if($_POST["pin"] == "3049") {
			$controller->submit();
			die();
		} else
		$controller->mode($_POST["mode"]);
		die();
	}
?>

Welcome to your personal wine review database.
<form name="mode" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<button type="submit" name ="mode" value="add">Add</button>
	<button type="submit" name="mode" value="view">View</button>
</form>
