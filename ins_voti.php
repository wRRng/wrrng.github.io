<?php
$id = $_GET['id'];
$data = $_GET['data'];
$materia = $_GET['materia'];
$tipo = $_GET['tipo'];

/*$cookie_name = "id1";
$cookie_value = "$id";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$cookie_name = "data1";
$cookie_value = "$data";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$cookie_name = "materia1";
$cookie_value = "$materia";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$cookie_name = "tipo1";
$cookie_value = "$tipo";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day*/
?>
<!DOCTYPE html>
<html>
    <head>        
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:200&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">
        <script type="text/javascript" src="js/jquery-1.12.8.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body style="background-color: #b3ffb3;">
        <nav class="navbar navbar-light" style="background-color: #ffccff;">
            <div class="container-fluid">
                <h3 style="color: ##a366ff;" class="text-center">INSERIMENTO VOTO</h3>   
            </div>
        </nav>

        <div class="container-fluid" style="font-weight: light">
            <div class="col-sm-6">
            <h3 style="text-align: center;font-weight: light;">Inserimento voto</h3><br>
                <form class="form-horizontal" action="ins_voti.php" method="POST">
                    <input id="id" name="id" type="hidden" value="<?php echo $id; ?>">
                    <input id="materia" name="materia" type="hidden" value="<?php echo $materia; ?>">
                    <input id="data" name="data" type="hidden" value="<?php echo $data; ?>">
                    <input id="tipo" name="tipo" type="hidden" value="<?php echo $tipo; ?>">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Votazione</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="voto" value="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label"></label>
                <div class="col-lg-6">
                    <input type="submit" class="btn btn-outline-dark" name="submit"> <input type="reset" class="btn btn-outline-dark" name="reset" value="Cancella">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-6">
                    <button class="btn btn-sm btn-success" onclick="self.close()">Chiudi scheda</button>
                </div>
            </div>

        </div>

        <div class="container-fluid">
        <?php 
        if(isset($_POST['submit'])){
            include("db.php"); 
            /*$_COOKIE['id1'] = $idid;
            $_COOKIE['materia1'] = $materiamateria;
            $_COOKIE['data1'] = $datadata;
            $_COOKIE['tipo1'] = $tipotipo;*/
            $id = $_POST['id'];
            $data = $_POST['data'];
            $materia = $_POST['materia'];
            $tipo = $_POST['tipo'];
            $voto = $_POST['voto'];
            if(!$result = $connessione->query("INSERT INTO voti (id_a, id_m, data, tipo, voto) VALUES ($id, '$materia', '$data', '$tipo', '$voto')")){
                echo $connessione->error;
                }else{
                                    echo '<div class="alert alert-success; text-center">';
                                    echo "<strong>Voto inserito! ^___^</strong>";
                                    echo "</div>";
                                    echo "<p></p>";
                                    //echo "<button type=\"button\" class=\"btn btn-sm btn-alert\"
                                    //onclick=\"window.close();\">Chiudi</button>";
                                    //$newpage = 'http://xenomorfo.altervista.org/scuola/index_docente.php';
                    //header('Refresh: 3; url=' . $newpage);
                    //echo 'Tra 5 secondi verrai reindirizzato. Se non vuoi aspettare <a href="' . $newpage . '">clicca qui</a>';
                }
            $connessione->close();
        }



        
        ?>
        </div>
    </body>
</html>