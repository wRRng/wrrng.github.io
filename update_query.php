<?php

include ("db.php");

$id_el=$_POST['id2'];
$cognome=$_POST['cognome'];
$nome=$_POST['nome'];
$datan=$_POST['datan'];
$classe=$_POST['classe'];

$query="UPDATE alunni SET cognome = '$cognome', nome = '$nome', data_nascita = '$datan', classe = '$classe' WHERE id = $id_el";
if(!$result = $connessione->query($query)){
	echo $connessione->error;
	echo $query;
    }else{
		echo $query;
		echo "Dati alunno aggiornati con successo!";
		echo "<p></p>";
        $newpage = 'http://xenomorfo.altervista.org/scuola/index_segretaria.php';
		header('Refresh: 3; url=' . $newpage);
		echo 'Tra 3 secondi verrai reindirizzato. Se non vuoi aspettare <a href="' . $newpage . '">clicca qui</a>';
  		exit();
	}
$connessione->close();

?>