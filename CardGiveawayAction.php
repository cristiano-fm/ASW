<?php
session_start();
require_once "webservices/lib/nusoap.php";
$client = new nusoap_client('http://localhost/cityfrontiers/webservices/AdicionaCarta.php');
$error = $client->getError();
$result = $client->call('adicionaCarta', array('admin' => $_SESSION['ADMIN'], 'adminPass' =>  $_POST['password'], 'username' => $_POST['username'], 'card' => $_POST['card'], 'collection' => $_POST['collection']));
//handle errors
if ($client->fault){
	//check faults
} else {
	header('Location: Error.php');
};

if ($result == "Aceite"){
	header('Location: AdminPanel.php');
} else {
	header('Location: Error.php');
};
?>