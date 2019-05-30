<?php
session_start();
$_SESSION['step'] = 1;
$_SESSION['errorMessage'] = "Already registered? <a href='Login.php'>Login here</a>";
header('Location: RegisterStep1.php');
exit();
?>