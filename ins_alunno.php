<?php

$cognome=$_POST['cognome'];
$nome=$_POST['nome'];
$datan=$_POST['datan'];
$classe=$_POST['classe'];

$host = 'localhost';
$user = 'xenomorfo';
$password = '';
$nomedb = 'my_xenomorfo';

$connessione = new mysqli($host,$user,$password,$nomedb);

if($connessione->connect_errno){
echo $connessione->connect_error;
exit();
}

if(!$result = $connessione->query("INSERT INTO alunni (cognome, nome, data_nascita, classe) VALUES ('$cognome', '$nome', '$datan', '$classe')")){
	echo $connessione->error;
    }else{
		echo "alunno inserito con successo!";
		echo "<p></p>";
        $newpage = 'http://xenomorfo.altervista.org/scuola/index_segretaria.php';
		header('Refresh: 3; url=' . $newpage);
		echo 'Tra 5 secondi verrai reindirizzato. Se non vuoi aspettare <a href="' . $newpage . '">clicca qui</a>';
  		exit;
	}
$connessione->close();


?>