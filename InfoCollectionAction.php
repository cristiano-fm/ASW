<?php
session_start();
require_once "webservices/lib/nusoap.php";
$client = new nusoap_client('http://localhost/cityfrontiers/webservices/InfoCaderneta.php');
$error = $client->getError();
$result = $client->call('infoCaderneta', array('nome' => $_GET['name']));

echo $result['usersN'];
?>