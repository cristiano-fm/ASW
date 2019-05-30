<?php
session_start();
include('../openconn.php');

$query = "SELECT * FROM game_cards WHERE name='".$_GET['card']."' AND game_id=".$_SESSION['game_id'];
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)){
	$quantity = intval($row['quantity']);
};

if ($quantity > 1) {
	$quantity = $quantity - 1;
	$sql = "UPDATE game_cards SET quantity=".$quantity." WHERE name='".$_GET['card']."'";
	mysqli_query($conn, $sql);

} else {
	$sql = "DELETE FROM game_cards WHERE name='".$_GET['card']."'";
	mysqli_query($conn, $sql);
}
?>