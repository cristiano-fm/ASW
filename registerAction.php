<?php
session_start();
include('openconn.php');

$id = mysqli_real_escape_string($conn, $_POST['id']);
$psw = mysqli_real_escape_string($conn, $_POST['psw']);

$query = "SELECT username FROM USER WHERE username= '".$id."' AND password = '".$psw."'";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
//mysqli_close($con);

if($row == 1) {
	$_SESSION['username'] = $id;
	header('Location: Home.html');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: Login.php');
	exit();
}
