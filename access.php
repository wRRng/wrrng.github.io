<?php
$qualifica=$_POST['qualifica'];
$username=$_POST['username'];
$pass=$_POST['password'];

$host = 'localhost';
$user = 'xenomorfo';
$password = '';
$nomedb = 'my_xenomorfo';

$connessione = new mysqli($host,$user,$password,$nomedb);

if($connessione->connect_errno){
echo $connessione->connect_error;
exit();
}


if(!$result = $connessione->query("select * from personale where user = '".$username."' AND pass = '".$pass."'")){
	echo $connessione->error;
}else{
    if($qualifica == 'docente'){
        header("location: index_docente.php");
    }elseif($qualifica == 'segreteria'){
        header("location: index_segretaria.php");
    }elseif($qualifica == 'null'){
        header("location: nullindex.php");
    }
}

?>