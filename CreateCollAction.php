<?php
session_start();
include('openconn.php');

if(empty($_FILES["upload"]["name"])) {
	$filename="default_coll.png";

} else {
	$filename=$_FILES["upload"]["name"];
	$target_dir = "media/card_pics/";
	$target_file = $target_dir . $filename;

	if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
		//saved image
	} else {
		header('Location: Error.php');
		exit();
	};
};

$sql = "INSERT INTO collection VALUES ('{$_POST['name']}', '{$_POST['color']}', '{$filename}', '{$_POST['description']}')";

if (mysqli_query($conn, $sql)) {
	mysqli_close($conn);
	header('Location: AdminPanel.php');
	exit();
} else {
	header('Location: Error.php');
	exit();
};

?>