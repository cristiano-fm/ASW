<?php
session_start();
include('openconn.php');

if(empty($_POST['nickname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm'])) {
	$_SESSION['errorMessage'] = "All areas need to be filled";
	header('Location: RegisterStep1.php');
	exit();
}

$nickname = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nickname']));
$email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
$password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));
$confirm = mysqli_real_escape_string($conn, htmlspecialchars($_POST['confirm']));

if($password != $confirm) {
	$_SESSION['errorMessage'] = "Password does not match confirmation. Please try again";
	header('Location: RegisterStep1.php');
	exit();
}

$query1 = "SELECT username FROM USER WHERE username= '".$nickname."'";
$query2 = "SELECT email FROM USER WHERE email= '".$email."'";

$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);

$numUsers = mysqli_num_rows($result1);
$numEmails = mysqli_num_rows($result2);
mysqli_close($conn);

//check if username is already taken and if email is already registered
if($numEmails > 0 && $numUsers > 0) {
	$_SESSION['errorMessage'] = "Username and email already registered. Please try another one or <a href='Login.php'>Login instead</a>";
	header('Location: RegisterStep1.php');
	exit();
} elseif($numUsers > 0) {
	$_SESSION['errorMessage'] = "User name already taken. Please try another one";
	header('Location: RegisterStep1.php');
	exit();
} elseif ($numEmails > 0) {
	$_SESSION['errorMessage'] = "Email already registered. <a href='Login.php'>Login instead</a>";
	header('Location: RegisterStep1.php');
	exit();
} else {
	
	//save info for next register step and redirect
	$_SESSION['errorMessage'] = "Your personal information is private and safe";
	$_SESSION['nickname'] = $nickname;
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;

	$_SESSION['step'] = 2;
	header('Location: RegisterStep2.php');
	exit();
};
?>