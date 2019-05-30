<?php
session_start();
include('../openconn.php');

$query = "SELECT * FROM `game_cards` WHERE `game_id`='".$_SESSION['game_id']."'";
$result = mysqli_query($conn, $query);
$money = $_SESSION['money'];
$incr = 0;
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $queryCard = "SELECT * FROM `card` WHERE `name`='".$row['name']."' AND `collection`='".$row['collection']."'";
        $resultCard = mysqli_query($conn, $queryCard);
        $Card = mysqli_fetch_assoc($resultCard);

        if ($Card['attribute'] == 'money'){
            $incr = $incr + (intval($Card['power']) * intval($row['quantity']));
        };
    };

    if (intval($_SESSION['happiness']) >= 25 && intval($_SESSION['happiness']) < 50){
        $incr = $incr * 1.25;
    } elseif (intval($_SESSION['happiness']) >= 50 && intval($_SESSION['happiness']) < 75){
        $incr = $incr * 1.5;
    } elseif (intval($_SESSION['happiness']) >= 75 && intval($_SESSION['happiness']) < 95){
        $incr = $incr * 1.75;
    } elseif (intval($_SESSION['happiness']) >= 95){
        $incr = $incr * 2;
    };

    $money = $money + $incr;

    $sql = "UPDATE `game` SET money=".$money." WHERE id=".$_SESSION['game_id'];
    if(mysqli_query($conn, $sql)){
        $_SESSION['money'] = $money;
    };
    
};

echo number_format($_SESSION['money'], 0, '.', ' ') ." <strong>+".$incr."</strong>";
?>