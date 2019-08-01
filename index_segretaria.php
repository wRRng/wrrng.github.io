<?php include("db.php");?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lista con filtri</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <script type="text/javascript" src="js/jquery-1.12.8.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>

    </head>
<body style="background-color: #b3ffb3;">
<nav class="navbar navbar-light" style="background-color: #ffccff;">
    <div class="container-fluid">
         <h3 style="text-align: center;color: ##a366ff;">HOME SEGRETERIA</h3>   
    </div>
</nav>

<div class="container">
    
    <div class="row">
    <div class="col-sm-6">
    <h3 style="text-align: center;font-weight: bold;">Inserimento alunno</h3><br>
        <form class="form-horizontal" action="ins_alunno.php" method="POST">
            <div class="form-group">
                <label class="col-lg-2 control-label">Cognome</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="cognome" placeholder="Cognome">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Nome</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="nome" placeholder="Nome">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Data di nascita</label>
                <div class="col-lg-8">
                    <input type="date" class="form-control" name="datan" placeholder="Data di nascita">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Classe</label>
                <div class="col-lg-8">
                <select name="classe" class="form-control" value="<?php echo $row['classe'] ?>">
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
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label"></label>
                <div class="col-lg-8">
                    <input type="submit" class="btn btn-primary" name="submit3"> <input type="reset" class="btn btn-primary" name="reset" value="Cancella">
                </div>
            </div>
        </form>
        </div>
    
        

    
    <div class="col-sm-6">
    <h3 style="text-align: center;font-weight: bold;">Filtri</h3><br>
        <form class="form-horizontal" action="index_segretaria.php" method="POST">
            <div class="form-group">
                <label class="col-lg-2 control-label">Cognome</label>
                <div class="col-lg-8">
                <select name="cognome" class="form-control" value="<?php echo $row['cognome'] ?>">
                    <option value=""></option>
                    <?php
                            if(!$result1 = $connessione->query("select distinct cognome from alunni order by cognome")){
	                            echo $connessione->error;
                                }else{
	                                if($result1->num_rows > 0){
		                                while($row = $result1->fetch_array(MYSQLI_ASSOC))
	                            {
			        ?>
			        <option value="<?php echo $row['cognome'] ?>"><?php echo $row['cognome'] ?>
			        </option>
			            <?php
		                        }	
                                }
                                 $result1->close();
                                }
                        ?>
                </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Classe</label>
                <div class="col-lg-8">
                <select name="classe" class="form-control" value="<?php echo $row['classe'] ?>">
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
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Data</label>
                <div class="col-lg-8">
                    <input type="date" class="form-control" name="data" placeholder="Data">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label"></label>
                <div class="col-lg-8">
                    <input type="submit" class="btn btn-primary" name="submit" value="Visualizza dati e presenze"> <input type="submit" class="btn btn-primary" name="submit2" value="Visualizza presenze">
                </div>
            </div>
        </form>
    </div>
</div>

    <div class="row">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cognome</th>
                    <th>Nome</th>
                    <th>Classe</th>
                    <th>Data presenza</th>
                    <th>Elimina alunno</th>
                    <th>Aggiorna dati alunno</th>
                </tr>
        
        <tbody>
            <?php
                include("db.php");
                if(isset($_POST['submit'])){
                	
                    $cognome = $_POST['cognome'];
                    $nome = $_POST['nome'];
                    $classe = $_POST['classe'];
                    $data = $_POST['data'];
                   

                    if($cognome != "" || $data != "" || $classe != ""){
                        $query = "select * from alunni join presenze on (alunni.id = presenze.id_a) where cognome = '$cognome' OR classe = '$classe' OR data = '$data'";
                        //echo "select * from alunni join presenze on (alunni.id = presenze.id_a) where cognome = '$cognome' OR classe = '$classe' OR data = '$data'";
                        $date = mysqli_query($connessione, $query) or die('error');
                        if(mysqli_num_rows($date) > 0){
                            while($row = mysqli_fetch_assoc($date)){
                                $id = $row['id_a'];
                                $cognome = $row['cognome'];
                                $nome = $row['nome'];
                                $classe = $row['classe'];
                                $data = $row['data'];
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $cognome;?></td>
                                    <td><?php echo $nome;?></td>
                                    <td><?php echo $classe;?></td>
                                    <td><?php echo $data;?></td>
                                    <td><?php echo "<a href=\"delete.php?id=".$id."\">Elimina</a>";  ?></td>;
                                    <td><?php echo "<a href=\"update.php?id=".$id."\">Aggiorna</a>";  ?></td>;
                                </tr>
                                <?php
                            }
                        }
                        else{
                            ?>
                            <tr>
                                <td>Nessun record trovato</td>
                            </tr>
                            <?php
                        }
                    }
                }
            ?>
            <?php
            if(isset($_POST['submit2'])){
            		$id = $_GET['id'];
                    $cognome = $_POST['cognome'];
                    $nome = $_POST['nome'];
                    $datan = $_POST['datan'];
                    $classe = $_POST['classe'];

                   
                        $query = "select * from spese join spese_tipo on (spese.tipo = spese_tipo.id_tipo) order by id";
                        $date = mysqli_query($connessione, $query) or die('error');
                        if(mysqli_num_rows($date) > 0){
                            while($row = mysqli_fetch_assoc($date)){
                                $id = $row['id'];
                                $nome = $row['nome'];
                                $note = $row['note'];
                                $importo = $row['importo'];
                                $tipo = $row['nome_tipo'];
                                $data = $row['data'];
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $nome;?></td>
                                    <td><?php echo $note;?></td>
                                    <td><?php echo $importo;?></td>
                                    <td><?php echo $tipo;?></td>
                                    <td><?php echo $data;?></td>
                                    <td><?php echo "<a href=\"delete.php?id=".$id."\">Elimina</a>";  ?></td>;
                                    <td><?php echo "<a href=\"update.php?id=".$id."\">Aggiorna</a>";  ?></td>;
                                </tr>
                                <?php
                            }
                        }
                        else{
                            ?>
                            <tr>
                                <td>Nessun record trovato</td>
                            </tr>
                            <?php
                        }
                    }
                
            ?>
            </tbody>
            </table>
 </div>
 </div>
 </div>
</body>
</html>