<?php
$id = $_GET['id'];
$host = 'localhost';
$user = 'xenomorfo';
$password = '';
$nomedb = 'my_xenomorfo';

$connessione = new mysqli($host,$user,$password,$nomedb);

if(!$result = $connessione->query("SELECT * from alunni where id = '".$id."'")){
	echo $connessione->error;
}else{
	 if($result->num_rows > 0){
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
?>
<html>
<head><title>Aggiorna dati alunno</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <script type="text/javascript" src="js/jquery-1.12.8.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script></head>
<body style="background-color: #b3ffb3;">
<nav class="navbar navbar-light" style="background-color: #ffccff;">
    <div class="container-fluid">
         <h3 style="text-align: center;color: ##a366ff;">AGGIORNA DATI ALUNNO</h3>   
    </div>
</nav>
  <h1 style="text-align: center;"></h1>
    <p><br>
    </p>
	<form name="form_update" action="update_query.php" method="post">
      <table>
        <tbody>
          <tr>
            <td>Cognome: </td>
            <td style="text-align: left;"><input name="cognome" value="<?php echo $row['cognome'] ?>"

                type="text"><br>
            </td>
          </tr>
          <tr>
            <td>Nome :</td>
            <td><input name="nome" value="<?php echo $row['nome'] ?>"

                type="text"><br>
            </td>
          </tr>
          <tr>
            <td>Data di nascita:</td>
            <td> <input name="datan" value="<?php echo $row['data_nascita'] ?>"

                type="text" type="date"><br>
            </td>
          </tr>
          <tr>
          <td>Classe: <br>
          </td>
          <td><select name="classe" class="form-control" value="<?php echo $row['classe'] ?>">
                    <option value=""></option>
                    <?php
                            if(!$result = $connessione->query("select distinct classe from alunni order by classe")){
	                            echo $connessione->error;
                                }else{
	                                if($result->num_rows > 0){
		                                while($row = $result->fetch_array(MYSQLI_ASSOC))
	                            {
			        ?>
			        <option value="<?php echo $row['classe'] ?>"><?php echo $row['classe'] ?>
			        </option>
			            <?php
		                        }	
                                }
                                 $result->close();
                                }
                        ?>
                </select>
</select></td>
          <tr><td><input type="text" name="id2" value="<?php echo  $_GET['id'] ?>"></td></tr>
          <tr>
            <td><br>
            </td>
            <td> <input name="invia" value="Aggiorna" type="submit"> <input name="cancella" value="Cancella" type="reset"> </td>
          </tr>
        </tbody>
      </table>
      <p><br>
      </p>
      <p><br>
      </p>
    </form>
	
<?php 
		}

		}
		
$result->close();
}
?>
</body>
</html>