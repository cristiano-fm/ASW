<?php
require_once "lib/nusoap.php";
include('../openconn.php');

function infoCaderneta($nome){
    
	$query = "SELECT * FROM `card` WHERE `collection`='".$nome."'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    $numberOfCards = mysqli_num_rows($result);
    
    $cardNames = array();
    while($row = mysqli_fetch_assoc($result)){
        array_push($cardNames, $row['name']);
    };

    $query2 = "SELECT * FROM `game_cards` WHERE collection='".$nome."' GROUP BY game_id";
    $result2 = mysqli_query($GLOBALS['conn'], $query2);
    $numberOfUsers = mysqli_num_rows($result2);

    $array = [
        "cardsN" => $numberOfCards,
        "usersN" => $numberOfUsers,
        "cardNames" => $cardNames,
    ];

    return $array;
}

$server = new soap_server();
$server->register("infoCaderneta", // nome metodo
	array('nome' => 'xsd:string'), // input
	array('return' => 'xsd:array'), // output
	'uri:cumpwsdl', // namespace
	'urn:cumpwsdl#infoCaderneta', // SOAPAction
	'rpc', // estilo
	'encoded' // uso
);

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>