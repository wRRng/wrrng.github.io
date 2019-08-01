<?php 
$host = 'localhost';
$user = 'xenomorfo';
$password = '';
$nomedb = 'my_xenomorfo';

$connessione = new mysqli($host,$user,$password,$nomedb);

if($connessione->connect_errno){
    echo $connessione->connect_error;
    exit();
    }

?>

