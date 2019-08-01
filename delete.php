<?php 
$id_el = $_GET['id'];
$host = 'localhost';
$user = 'xenomorfo';
$password = '';
$nomedb = 'my_xenomorfo';

$connessione = new mysqli($host,$user,$password,$nomedb);

if($connessione->connect_errno){
echo $connessione->connect_error;
exit();
}

$id=$_REQUEST['id'];
$query = "DELETE FROM spese WHERE id=$id_el"; 
$result = mysqli_query($connessione,$query) or die ( mysqli_error());
header("Location: index.php"); 


?>