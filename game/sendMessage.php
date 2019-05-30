<?php
session_start();
include('../openconn.php');

$sql = "INSERT INTO chat VALUES ('{$_SESSION['username']}', '{$_GET['txt']}')";
if($_GET['txt'] == ""){
    //pass
} else {
    mysqli_query($conn, $sql);
}
mysqli_close($conn);
?>