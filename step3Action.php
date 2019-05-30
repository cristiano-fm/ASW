<?php
session_start();
include('openconn.php');

if(empty($_FILES["fileToUpload"]["name"])) {
	$_SESSION['file'] = "media/default_pic.jpg";

} else {
	$filename=$_FILES["fileToUpload"]["name"];
	$extension=end(explode(".", $filename));
	$newfilename= $_SESSION['nickname'] .".".$extension;
	$target_dir = "media/profile_pics/";
	$target_file = $target_dir . $newfilename;
	$_SESSION['file'] = $target_file;

	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		//saved image
	} else {
		header('Location: Error.php');
		exit();
	};
};

$sql = "INSERT INTO USER VALUES ('{$_SESSION['nickname']}', '{$_SESSION['email']}', MD5('{$_SESSION['password']}'), 
		'{$_SESSION['firstName']}', '{$_SESSION['lastName']}', '{$_SESSION['sex']}', '{$_SESSION['bday']}', 
		'{$_SESSION['country']}', '{$_SESSION['county']}', '{$_SESSION['district']}', '{$_SESSION['file']}')";

unset($_SESSION['step']);
if (mysqli_query($conn, $sql)) {

	$sqlGame = "INSERT INTO game VALUES (NULL, 900, 0, 0)";
	
	if ($conn->query($sqlGame) === TRUE) {
		$_SESSION['game_id'] = $conn->insert_id;
		
		$sqlUserGame = "INSERT INTO user_game VALUES ('{$_SESSION['nickname']}', {$_SESSION['game_id']})";

		if (mysqli_query($conn, $sqlUserGame)) {
			mysqli_close($conn);
			$_SESSION['username'] = $_SESSION['nickname'];
			$_SESSION['population'] = '0';
			$_SESSION['happiness'] = '0';
			$_SESSION['money'] = '900';
			header('Location: game/tutorial.php');
		} else {
			mysqli_close($conn);
			header('Location: Error.php');
		};
	} else {
		mysqli_close($conn);
		header('Location: Error.php');
	};
} else {
	mysqli_close($conn);
	header('Location: Error.php');
};

?>