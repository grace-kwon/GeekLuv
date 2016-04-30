<!DOCTYPE html>
<html>
	
	<head>
		<title>Matches</title>
		
		<meta charset="utf-8" />
		
		<!-- instructor-provided CSS and JavaScript links; do not modify -->
		<link href="images/heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="Geekluv.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
<?php
	require_once "common.php";
	my_header();
?>
		<div>
			<form action="matches-submit.php" method="get">
				<fieldset>
					<legend>Returning User:</legend>
					<strong>Name:</strong><input type="text" size="16" name="name">
					<input type="submit" value="View My Matches" />
				</fieldset>
			</form>
		</div>

<?php
	require_once "common.php";
	my_footer();
?>	
	</body>
</html>
