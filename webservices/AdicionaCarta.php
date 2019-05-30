<?php
require_once "lib/nusoap.php";
include('../openconn.php');

function adicionaCarta($admin, $adminPass, $username, $card, $collection){
	
	
	$query = "SELECT username FROM USER WHERE username= '".$admin."' AND password = MD5('".$adminPass."')";

	$result = mysqli_query($GLOBALS['conn'], $query);
	$numRows = mysqli_num_rows($result);

	if($numRows == 1 && $admin == "ADMIN") {
		//get game_id
		$query = "SELECT * FROM `user_game` WHERE `username`='".$username."'";
		$result = mysqli_query($GLOBALS['conn'], $query);
		while($row = mysqli_fetch_assoc($result)){
			$game_id = $row['game_id'];
		};

		//check if card already exists and add
		$queryCheck = "SELECT * FROM game_cards WHERE game_id=".$game_id." AND name='".$card."'";
		$resultCheck = mysqli_query($GLOBALS['conn'], $queryCheck);

		if (mysqli_num_rows($resultCheck) > 0) {
			while($rowCheck = mysqli_fetch_assoc($resultCheck)){
				$quantity = $rowCheck['quantity'];
			};
			$quantity = $quantity + 1;

			$sql = "UPDATE game_cards SET quantity=".$quantity." WHERE name='".$card."'";
			if(mysqli_query($GLOBALS['conn'], $sql)){
				return "Aceite";
			} else {
				return "Não aceite";
			};
			
		} else {
			$sql = "INSERT INTO game_cards VALUES (".$game_id.", '".$card."', '".$collection."', 1)";
			if(mysqli_query($GLOBALS['conn'], $sql)){
				return "Aceite";
			} else {
				return "Não aceite";
			};
		};
	} else {
		return "Não aceite";
	};
};

$server = new soap_server();
$server->register("adicionaCarta", // nome metodo
	array('admin' => 'xsd:string', 'adminPass' => 'xsd:string', 'username' => 'xsd:string', 'card' => 'xsd:string', 'collection' => 'xsd:string'), // input
	array('return' => 'xsd:string'), // output
	'uri:cumpwsdl', // namespace
	'urn:cumpwsdl#infoCaderneta', // SOAPAction
	'rpc', // estilo
	'encoded' // uso
);

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>