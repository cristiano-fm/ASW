<?php
session_start();
$_SESSION['step'] = 2;
$_SESSION['errorMessage'] = "Your personal information is private and safe";
header('Location: RegisterStep2.php');
exit();
?>