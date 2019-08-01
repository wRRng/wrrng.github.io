<?php include("db.php"); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>HOME DOCENTE</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:200&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">
        <script type="text/javascript" src="js/jquery-1.12.8.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--<script src="https://unpkg.com/popper.js"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>-->
        <script language="javascript" type="text/javascript">
            <!--
            function popitup(url) {
                newwindow=window.open(url,'name','height=430,width=350');
                if (window.focus) {newwindow.focus()}
                return false;
            }
            // -->
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
<body style="background-color: #b3ffb3;">
<nav class="navbar navbar-light" style="background-color: #ffccff;">
    <div class="container-fluid">
         <h3 class="text-center" style="color: ##a366ff;">HOME DOCENTE</h3>   
    </div>
</nav>


<div class="container" style="font-weight: light">
    
    <div class="row">
    <div class="col-sm-6">
    <h3 style="text-align: center;font-weight: light;">Inserimento presenze</h3><br>
        <form class="form-horizontal" action="index_docente.php" method="POST">

            <div class="form-group">
                <label class="col-lg-2 control-label">Data</label>
                <div class="col-lg-8">
                    <input type="date" class="form-control" name="datan" value="<?php echo date("Y-m-d"); ?>">
                    
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Classe</label>
                <div class="col-lg-8">
                <select name="pres_classe" class="form-control">
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
                <div class="col-lg-6">
                    <input type="submit" class="btn btn-outline-dark" name="submit3"> <input type="reset" class="btn btn-outline-dark" name="reset" value="Cancella">
                </div>
            </div>
        </form>
        </div>
    
    <div class="col-sm-6">
    <h3 style="text-align: center;font-weight: light;">Inserimento voti</h3><br>
        <form class="form-horizontal" action="index_docente.php" method="POST">

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
                    <input type="date" class="form-control" name="data" value="<?php echo date("Y-m-d"); ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Materia</label>
                <div class="col-lg-8">
                <select name="materia" class="form-control">
                    <option value=""></option>
                    <?php
                            if(!$result = $connessione->query("select * from materie order by nome_materia")){
	                            echo $connessione->error;
                                }else{
	                                if($result->num_rows > 0){
		                                while($row = $result->fetch_array(MYSQLI_ASSOC))
	                            {
			        ?>
			        <option value="<?php echo $row['id'] ?>"><?php echo $row['nome_materia'] ?>
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
            <label for="radiobtn" class="col-lg-2 control-label">Tipologia prova</label>
                    <div class="col-sm-5 control-label">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="tipo_prova" id="Radios1" value="O">
                            <label>
                                Orale
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="tipo_prova" id="Radios1" value="S">
                            <label>
                                Scritto
                            </label>
                        </div>
                    </div>
               
    </div>

            <div class="form-group">
                <label class="col-lg-2 control-label"></label>
                <div class="col-lg-8">
                    <input type="submit" class="btn btn-outline-dark" name="submit2" value="Visualizza alunni">
                </div>
            </div>
        </form>
    </div>
    
    <div class="container-fluid" style="font-weight: light">
    <h3 style="text-align: center;font-weight: light;">Filtra per voto più alto e più basso</h3><br>
    <form class="form-horizontal" action="filtra_voti.php" method="POST">
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
            <label class="col-lg-2 control-label">Materia</label>
            <div class="col-lg-8">
            <select name="materia" class="form-control">
                <option value=""></option>
                <?php
                        if(!$result = $connessione->query("select * from materie order by nome_materia")){
                            echo $connessione->error;
                            }else{
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_array(MYSQLI_ASSOC))
                            {
                ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['nome_materia'] ?>
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
            <label for="radiobtn" class="col-lg-2 control-label">Tipologia prova</label>
                    <div class="col-sm-5 control-label">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="tipo_prova" id="Radios1" value="O">
                            <label>
                                Orale
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="tipo_prova" id="Radios1" value="S">
                            <label>
                                Scritto
                            </label>
                        </div>
                    </div>
               
    </div>

        <div class="form-group">
            <label class="col-lg-2 control-label"></label>
            <div class="col-lg-8">
                <input type="submit" class="btn btn-outline-dark" name="submit" value="Vedi voto più alto"> <input type="submit" class="btn btn-outline-dark" name="submit2" value="Vedi voto più basso">
            </div>
        </div>
    </form>
    </div>

        <div class="container-fluid">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">Cognome</th>
                    <th style="text-align: center">Nome</th>
                    <th style="text-align: center">Classe</th>
                    <th style="text-align: center">Conferma presenza/Inserisci voto</th>
                    
                </tr>
        </thead>
        <tbody>
            <?php
                include("db.php");
                if(isset($_POST['submit3'])){
                	
                    $classe = $_POST['pres_classe'];
                    $datan = $_POST['datan'];
                   
                    if($datan > date("Y-m-d")){
                        echo '<div class="alert alert-warning">';
                        echo "<strong>Attenzione!</strong> Non puoi inserire una presenza futura, grullo!";
                        echo "</div>";
                        
                    }else{
                    $query = "SELECT distinct id_a, cognome, nome, classe from alunni join presenze on (alunni.id = presenze.id_a)";
                    
                    if($classe != ''){
                        $query = $query . " WHERE classe = '$classe'";
                    }else{
                        $query = $query;
                    }
                        $query = $query . " order by cognome";
                        $cicci = mysqli_query($connessione, $query) or die('mannaggialamadonna');
                        if(mysqli_num_rows($cicci) > 0){
                            while($row = mysqli_fetch_assoc($cicci)){
                                $id = $row['id_a'];
                                $cognome = $row['cognome'];
                                $nome = $row['nome'];
                                $classe = $row['classe'];
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $id;?></td>
                                    <td style="text-align: center"><?php echo $cognome;?></td>
                                    <td style="text-align: center"><?php echo $nome;?></td>
                                    <td style="text-align: center"><?php echo $classe;?></td>
                                    <td><div class="row">
                                            <div class="col text-center">
                                            <a href="<?php echo 'ins_presenze.php?id='.$id.'&datan='.$datan.''; ?>" onclick="return popitup('<?php echo 'ins_presenze.php?id='.$id.'&datan='.$datan.''; ?>')" class="btn btn-sm btn-success">Conferma presenza</a>
                                            </div>
                                        </div>
                                <?php    
                                    
                                    
                            
                                    }
                            }else{
                            ?>
                            <tr>
                                <td>Nessun record trovato</td>
                            </tr>
                            <?php 
                        }
                    }
                
                

                    
                              exit;
                        
                    $connessione->close();
                }
            ?>

        

            <?php
            include("db.php");
            if(isset($_POST['submit2'])){
                    $data = $_POST['data'];
                    $classe = $_POST['classe'];
                    $materia = $_POST['materia'];
                    $tipo = $_POST['tipo_prova'];

                   
                        $query = "select * from alunni where classe = '$classe'";
                        echo "select * from alunni where classe = '$classe'";
                        $date = mysqli_query($connessione, $query) or die('mannaggiaisanti');
                        if(mysqli_num_rows($date) > 0){
                            while($row = mysqli_fetch_assoc($date)){
                                $id = $row['id'];
                                $cognome = $row['cognome'];
                                $nome = $row['nome'];
                                $classe = $row['classe'];
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $id;?></td>
                                    <td style="text-align: center"><?php echo $cognome;?></td>
                                    <td style="text-align: center"><?php echo $nome;?></td>
                                    <td style="text-align: center"><?php echo $classe;?></td>
                                    <td style="text-align: center"><?php echo "<a href=\"ins_voti.php?id=".$id."&materia=".$materia."&data=".$data."&tipo=".$tipo."\" onclick=\"return popitup('ins_voti.php?id=".$id."&materia=".$materia."&data=".$data."&tipo=".$tipo."')\" class=\"btn btn-sm btn-danger\">Inserisci voto</a>"; ?></td>;
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

                    $_SESSION['data'] = $data;
                    $_SESSION['classe'] = $classe;
                    $_SESSION['materia'] = $materia;
                    $_SESSION['tipo'] = $tipo;
                
            ?>
            
            </tbody>
            </table>
                
        </div>
     </div>
 </div>
 

</body>
</html>