<?php
session_start();
include('openconn.php');

if(empty($_FILES["uploadImg"]["name"])) {
	$filename_img="default_card.png";
} else {
	$filename_img=$_FILES["uploadImg"]["name"];
	$target_dir_img = "media/card_pics/";
	$target_file_img = $target_dir_img . $filename_img;

	if (move_uploaded_file($_FILES["uploadImg"]["tmp_name"], $target_file_img)) {
		//saved image
	} else {
		header('Location: Error.php');
		exit();
	};
};

if(empty($_FILES["uploadObj"]["name"])) {
	$filename_obj="default_model.glb";
} else {
	$filename_obj=$_FILES["uploadObj"]["name"];
	$target_dir_obj = "buildings/";
	$target_file_obj = $target_dir_obj . $filename_obj;

	if (move_uploaded_file($_FILES["uploadObj"]["tmp_name"], $target_file_obj)) {
		//saved image
	} else {
		header('Location: Error.php');
		exit();
	};
};

//(`collection`, `name`, `description`, `pic`, `object`, `price`, `attribute`, `power`, `rarity`)
$sql = "INSERT INTO card VALUES ('{$_POST['collection']}', '{$_POST['name']}', '{$_POST['description']}', '{$filename_img}', '{$filename_obj}', '{$_POST['price']}', '{$_POST['attribute']}', '{$_POST['power']}', '{$_POST['rarity']}')";

if (mysqli_query($conn, $sql)) {
	mysqli_close($conn);
	header('Location: AdminPanel.php');
	exit();
} else {
	header('Location: Error.php');
	exit();
};

?>