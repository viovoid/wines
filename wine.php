<head>
	<title>Wine</title>
	<style type="text/css">
		body {color: white; background: black;}
	</style>
</head>
<?php
	// edit a single wine
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$controller = new Controller();
	//	$controller->view($_GET["id"]);
	}

	// add a wine
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$controller = new Controller();
		if($_POST["pin"] == "3049") {
			$controller->submit();
			die();
		} else {
			// load the selected mode (add/view)
			$controller->mode($_POST["mode"]);
		}
		die();
	}
?>

Welcome to your personal wine review database.
<form name="mode" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<button type="submit" name ="mode" value="add">Add</button>
	<button type="submit" name="mode" value="view">View</button>
</form>
