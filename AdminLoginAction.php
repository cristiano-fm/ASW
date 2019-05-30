<?php
session_start();
include('openconn.php');

if(empty($_POST['id']) || empty($_POST['psw'])) {
	$_SESSION['nao_autenticado'] = true;
	echo "wtf";
	header('Location: AdminLogin.php');
	exit();
}

$id = mysqli_real_escape_string($conn, $_POST['id']);
$psw = mysqli_real_escape_string($conn, $_POST['psw']);

$query = "SELECT username FROM USER WHERE username= '".$id."' AND password = MD5('".$psw."')";

$result = mysqli_query($conn, $query);
$numRows = mysqli_num_rows($result);

if($numRows == 1 && $id == "ADMIN") {
	while($row = mysqli_fetch_assoc($result)) {
		$_SESSION['ADMIN'] = $row['username'];
	}
	mysqli_close($conn);
	header('Location: AdminPanel.php');
	exit();

} else {
	$_SESSION['nao_autenticado'] = true;
	mysqli_close($conn);
	header('Location: AdminLogin.php');
	exit();
}
?>