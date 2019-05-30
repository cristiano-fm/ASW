<?php
session_start();
include('openconn.php');

if(empty($_POST['id']) || empty($_POST['psw'])) {
	$_SESSION['nao_autenticado'] = true;
	header('Location: Login.php');
}

$id = mysqli_real_escape_string($conn, $_POST['id']);
$psw = mysqli_real_escape_string($conn, $_POST['psw']);

$query1 = "SELECT username FROM USER WHERE username= '".$id."' AND password = MD5('".$psw."')";

$query2 = "SELECT username FROM USER WHERE email= '".$id."' AND password = MD5('".$psw."')";

$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$numRows1 = mysqli_num_rows($result1);
$numRows2 = mysqli_num_rows($result2);

if($numRows1 == 1 ) {
	while($row = mysqli_fetch_assoc($result1)) {
		$_SESSION['username'] = $row['username'];
	}
	extractGameInfo($conn);

} elseif ($numRows2 == 1 ) {
	while($row = mysqli_fetch_assoc($result2)) {
		$_SESSION['username'] = $row['username'];
	}
	extractGameInfo($conn);

} else {
	$_SESSION['nao_autenticado'] = true;
	mysqli_close($conn);
	header('Location: Login.php');
}

function extractGameInfo($connect){

	$queryGame = "SELECT `game_id` FROM `user_game` WHERE `username`= '".$_SESSION['username']."'";
	$resultGame = mysqli_query($connect, $queryGame);

	while($rowGame = mysqli_fetch_assoc($resultGame)) {
		$_SESSION['game_id'] = $rowGame['game_id'];
	}
	
	mysqli_close($connect);
	header('Location: game/Home.php');
}
?>