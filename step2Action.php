<?php
session_start();
include('openconn.php');

if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['sex']) || empty($_POST['bday']) || empty($_POST['country'])) {
	$_SESSION['errorMessage'] = "All areas need to be filled";
	header('Location: RegisterStep2.php');
	exit();
}

$firstName = mysqli_real_escape_string($conn, htmlspecialchars($_POST['firstName']));
$lastName = mysqli_real_escape_string($conn, htmlspecialchars($_POST['lastName']));
$sex = mysqli_real_escape_string($conn, htmlspecialchars($_POST['sex']));
$bday = mysqli_real_escape_string($conn, htmlspecialchars($_POST['bday']));
$country = mysqli_real_escape_string($conn, htmlspecialchars($_POST['country']));

if($country == "PT") {

	if(empty($_POST['district']) || empty($_POST['county'])) {
		$_SESSION['errorMessage'] = "All areas need to be filled";
		header('Location: RegisterStep2.php');
		exit();
	}
	$district = mysqli_real_escape_string($conn, $_POST['district']);
	$county = mysqli_real_escape_string($conn, $_POST['county']);
	$_SESSION['district'] = $district;
	$_SESSION['county'] = $county;

} else {
	$_SESSION['district'] = NULL;
	$_SESSION['county'] = NULL;
}

$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;
$_SESSION['sex'] = $sex;
$_SESSION['bday'] = $bday;
$_SESSION['country'] = $country;

$_SESSION['step'] = 3;
header('Location: RegisterStep3.php');
exit();
?>