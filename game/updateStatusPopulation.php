<?php
session_start();
include('../openconn.php');

$query = "SELECT * FROM `game_cards` WHERE `game_id`='".$_SESSION['game_id']."'";
$result = mysqli_query($conn, $query);
$population = 0;
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $queryCard = "SELECT * FROM `card` WHERE `name`='".$row['name']."' AND `collection`='".$row['collection']."'";
        $resultCard = mysqli_query($conn, $queryCard);
        $Card = mysqli_fetch_assoc($resultCard);

        if($Card['attribute'] == 'population'){
            $population = $population + (intval($Card['power']) * intval($row['quantity']));
        };
    };

    $sql = "UPDATE `game` SET population=".$population." WHERE id=".$_SESSION['game_id'];
	if(mysqli_query($conn, $sql)){
        $_SESSION['population'] = $population;
    };
};

echo number_format($_SESSION['population'], 0, '.', ' ');
?>