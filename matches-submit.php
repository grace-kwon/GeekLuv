<?php
	$name = $_GET['name'];
	
	// find the person 
	$filename = 'singles.txt';
	$handler = fopen($filename, 'r');
	while(!feof($handler)) {
		$line = fgets($handler, 1024);
		$person = line2person($line);
		if(strcasecmp($person[0], $name) == 0) {
			$user = $person;
			break;
		}
	}
	fclose($handler);

	$matches = array();
	$filename = 'singles.txt';
	$handler = fopen($filename, 'r');
	while(!feof($handler)) {
		$line = fgets($handler, 1024);
		$person = line2person($line);
		// gender
		if($user[1] == $person[1]) {
			continue;
		}
		// personality type
		$user_type = str_split($user[3]);
		$found = false;
		for($i = 0; $i < count($user_type); $i++) {
			if(strpos($person[3], $user_type[$i]) !== false) {
				$found = true;
			}
		}
		if(!$found) {
			continue;
		}
		// os
		if(strcasecmp($user[4], $person[4]) != 0) {
			continue;
		}
		// age
		$min_age = intval($user[5]);
		$max_age = intval($user[6]);
		$person_age = intval($person[2]);
		if($person_age < $min_age || $person_age > $max_age) {
			continue;
		}
		
		// matches
		array_push($matches, $person);
	}
	fclose($handler);
	
	function line2person($line) {
		$token = strtok($line, ",");
		$person = array();
		while($token !== false) {
			array_push($person, $token);
			$token = strtok(",");
		}
		return $person;
	}
?>
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
			<strong>Matches for <?=$name?></strong>
			<?php
				for($i = 0; $i < count($matches); $i++) {
					$person = $matches[$i];
					$img_filename = "images/userm.png";
					if(strcasecmp($person[1], "F") == 0)
						$img_filename = "images/user.png";
			?>
			<div class="match">
				<p><?=$person[0]?></p>
				<img src="<?=$img_filename?>"/>
				<ul>
					<li><strong>gender:</strong></li><?=$person[1]?>
					<li><strong>age:</strong></li><?=$person[2]?>
					<li><strong>type:</strong></li><?=$person[3]?>
					<li><strong>OS:</strong></li><?=$person[4]?>
				</ul>
			</div>
			<?php
				}
			?>
		</div>

<?php
	require_once "common.php";
	my_footer();
?>	
	</body>
</html>
