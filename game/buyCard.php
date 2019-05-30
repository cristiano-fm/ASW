<?php
session_start();
include('../openconn.php');

$query = "SELECT collection FROM card WHERE name='".$_GET['card']."'";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)){
	$coll = $row['collection'];
};

$queryCheck = "SELECT * FROM game_cards WHERE game_id=".$_SESSION['game_id']." AND name='".$_GET['card']."'";
$resultCheck = mysqli_query($conn, $queryCheck);

if (mysqli_num_rows($resultCheck) > 0) {
	while($rowCheck = mysqli_fetch_assoc($resultCheck)){
		$quantity = $rowCheck['quantity'];
	};
	$quantity = $quantity + 1;

	$sql = "UPDATE game_cards SET quantity=".$quantity." WHERE name='".$_GET['card']."'";
	mysqli_query($conn, $sql);

} else {
	$sql = "INSERT INTO game_cards VALUES (".$_SESSION['game_id'].", '".$_GET['card']."', '".$coll."', 1)";
	mysqli_query($conn, $sql);

}

$queryMoney = "SELECT `money` FROM `game` WHERE `id`='".$_SESSION['game_id']."'";
$resultMoney = mysqli_query($conn, $queryMoney);
$rowMoney = mysqli_fetch_assoc($resultMoney);
$money = $rowMoney['money'];

$queryCard = "SELECT * FROM `card` WHERE `name`='".$_GET['card']."'";
$resultCard = mysqli_query($conn, $queryCard);
$card = mysqli_fetch_assoc($resultCard);

$money = $money - $card['price'];

$sql = "UPDATE game SET money=".$money." WHERE id='".$_SESSION['game_id']."'";
if(mysqli_query($conn, $sql)){
	$_SESSION['money'] = $money;
};

echo number_format($money, 0, '.', ' ');
?>