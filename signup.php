<!DOCTYPE html>
<html>
	
	<head>
		<title>Signup</title>
		
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
			<form action="signup-submit.php" method="post">
				<fieldset>
					<legend>New User Signup:</legend>
					<strong>Name: </strong><input type="text" name="name" size="16"/><br>
					<strong>Gender: </strong><input type="radio" name="gender" value="M" /> Male <input type="radio" name="gender" value="F" /> Female<br>
					<strong>Age: </strong><input type="text" name="age" size="6"/><br>
					<strong>Personality type: </strong><input type="text" name="type" size="6" maxlength="4"/>
					<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp" target="_blank">(Dont't know your type?)</a><br>
					<strong>Favorite OS: </strong>
						<select name="os">
							<option value="windows">Windows</option>
							<option value="mac">Mac</option>
							<option value="Linux">Linux</option>
						</select><br>
					<strong>Seeking age: </strong><input type="text" name="min" size="6" placeholder="min"/>to<input type="text" name="max" size="6" placeholder="max"/><br>
					<input type="submit" value="Sign Up" />
				</fieldset>
			</form>
		</div>

<?php
	require_once "common.php";
	my_footer();
?>	
	</body>
</html>
