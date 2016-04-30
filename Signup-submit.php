<!DOCTYPE html>
<html>
	
	<head>
		<title>Signup-Submit</title>
		
		<meta charset="utf-8" />
		
		<!-- instructor-provided CSS and JavaScript links; do not modify -->
		<link href="images/heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="Geekluv.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

	<?php
	//header open
	require_once "common.php";
	my_header();

	//data processing
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$type = $_POST['type'];
	$os = $_POST['os'];
	$min_age = $_POST['min'];
	$max_age = $_POST['max'];


	//form validation
	$err_message =  nl2br("<font color='red'><b>AN ERROR OCCURRED DURING THE SIGNUP PROCESS.</b></font>\n
	<b>MOST FREQUENT MISTAKES</b>:\n
	1. All fields must be filled out (no blanks!)\n
	2. All fields must not contain any illegal characters (only letters, numbers, and spaces!)\n
	3. Your name must not match an existing user (to be implemented)\n
	<b>MORE POSSIBLE MISTAKES (basics):</b>\n
	1. All ages must be a number \n
	2. The minimum age must be less than the maximum age\n
	3. Your personality type must be one of the 16 personality types (4 letters)<br><br>");

	$userinfo = array($name, $gender, $age, $type, $os, $min_age, $max_age);
	$dbinfo = fopen("singles.txt", "r");

	//name check (overlapping names denied)
	if ($dbinfo) {
    while (($line = fgets($dbinfo)) !== false) {
        list($username) = explode(',', $line);
        if($username==$name) {
        	echo $err_message;
			?> <p>
			<a href="signup.php"><img src="images/back.gif" alt="icon" />Back to signup page</a>
			</p>
			<?php
			exit;
        }
    }
    fclose($dbinfo);

	} else {
    	echo "database error-- inquire administrator.";
    }

    //everything else check (no blanks, no special characters, etc.)
	foreach ($userinfo as $userinf) {
		if(!isset($userinf) || trim($userinf) == "") {
			echo $err_message;
			?> <p>
			<a href="signup.php"><img src="images/back.gif" alt="icon" />Back to signup page</a>
			</p>
			<?php
			exit;
		} else if (!preg_match("/^[a-zA-Z\s\d]+$/", $userinf)) {
			echo $err_message; ?>
			<p>
			<a href="signup.php"><img src="images/back.gif" alt="icon" />Back to signup page</a>
			</p>
			<?php
			exit;
		} else if ($min_age > $max_age) {
			echo $err_message; ?>
			<p>
			<a href="signup.php"><img src="images/back.gif" alt="icon" />Back to signup page</a>
			</p>
			<?php
			exit;
		} else if(!is_numeric($age) || !is_numeric($min_age) || !is_numeric($max_age)) {
			echo $err_message; ?>
			<p>
			<a href="signup.php"><img src="images/back.gif" alt="icon" />Back to signup page</a>
			</p>
			<?php
			exit;
		} else if(!preg_match("/^[a-zA-Z]+$/", $type)) {
			echo $err_message; ?>
			<p>
			<a href="signup.php"><img src="images/back.gif" alt="icon" />Back to signup page</a>
			</p>
			<?php
			exit;
		}
	}

	//update user database (singles.txt)
	$file = 'singles.txt';
	$current = file_get_contents($file);
	$current .= $name . "," . $gender . "," . $age . "," . $type . "," . $os . "," . $min_age . "," . $max_age . "\n";
	file_put_contents($file, $current);
	}
	?>

		<div>
			<strong>Thank you!</strong>
			<p>Welcome o NerdLuv, <?=$name ?>!</p>
			<p>
				Now <a href="matches.php">log in to see your matches!</a>
			</p>
		</div>

<?php
	require_once "common.php";
	my_footer();
?>	
	</body>
</html>
