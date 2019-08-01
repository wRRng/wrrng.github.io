
<!DOCTYPE html>
<html>
    <head>
        <title>FILTRO VOTI</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:200&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">
        <script type="text/javascript" src="js/jquery-1.12.8.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--<script src="https://unpkg.com/popper.js"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
<body style="background-color: #b3ffb3;">
<nav class="navbar navbar-light" style="background-color: #ffccff;">
    <div class="container-fluid">
         <h3 class="text-center" style="color: ##a366ff;">VOTI TOPISSIMI/BOTTOMISSIMI</h3>   
    </div>
</nav>

<div class="container-fluid">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="text-align: center">Voto</th>
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">Cognome</th>
                    <th style="text-align: center">Nome</th>
                    <th style="text-align: center">Classe</th>
                    <th style="text-align: center">Materia</th>
                    <th style="text-align: center">Tipo</th>
                    
                    
                </tr>
        </thead>
        <tbody>
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

                if(isset($_POST['submit'])){
                	
                    $classe = $_POST['classe'];
                    $materia = $_POST['materia'];
                    $tipo = $_POST['tipo_prova'];
                    $query = "SELECT MAX(voto) as voto, id_a as id, id_m, data, tipo, cognome, nome, classe, nome_materia, materie.id as materia from voti join alunni on (alunni.id=voti.id_a) join materie on (materie.id=voti.id_m) where 1";
                   
                    if($classe != ''){
                        $query = $query . " AND classe = '$classe'";
                    }else{
                        $query = $query;
                    }

                    if($materia!= ''){

                        $query = $query . " AND materie.id = $materia"; 
                    }else{
                        $query = $query;
                    }

                    if($tipo != ''){
                        $query = $query . " AND tipo = '$tipo'";
                    }else{
                        $query = $query;
                    }
                    echo $query;
                        $cicci = mysqli_query($connessione, $query) or die('error');
                        if(mysqli_num_rows($cicci) > 0){
                            while($row = mysqli_fetch_assoc($cicci)){
                                $voto = $row['voto'];
                                $id = $row['id'];
                                $cognome = $row['cognome'];
                                $nome = $row['nome'];
                                $classe = $row['classe'];
                                $materia = $row['nome_materia'];
                                $tipo = $row['tipo'];
                                


                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $voto; ?></td>
                                    <td style="text-align: center"><?php echo $id; ?></td>
                                    <td style="text-align: center"><?php echo $cognome; ?></td>
                                    <td style="text-align: center"><?php echo $nome; ?></td>
                                    <td style="text-align: center"><?php echo $classe; ?></td>
                                    <td style="text-align: center"><?php echo $materia; ?></td>
                                    <td style="text-align: center"><?php echo $tipo; ?></td>
                                    
                                <?php    
                                    
                                    }
                            }else{
                            ?>
                            <tr>
                                <td>Nessun record trovato</td>
                            </tr>
                            <?php 
                        }
                    
                
                

                    
                              exit;
                        
                    $connessione->close();
                }
            ?>