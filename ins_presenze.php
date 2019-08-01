<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:200&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">
        <script type="text/javascript" src="js/jquery-1.12.8.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://unpkg.com/popper.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <SCRIPT>
            setTimeout("self.close()", 2000 ) // after  seconds
        </SCRIPT>
    </head>

    <body style="background-color: #b3ffb3;">
        <nav class="navbar navbar-light" style="background-color: #ffccff;">
            <div class="container-fluid">
                <h3 style="color: ##a366ff;" class="text-center">CONFERMA PRESENZA</h3>   
            </div>
        </nav>

        <?php include("db.php"); 
        $id = $_GET['id'];
        $datan = $_GET['datan'];
        if(!$result = $connessione->query("INSERT INTO presenze (id_a, data) VALUES ($id, '$datan')")){
            echo $connessione->error;
            }else{
                echo '<div class="alert alert-success; text-center">';
                                echo "<strong>Presenza inserita! ^___^</strong>";
                                echo "</div>";
                                echo "<p></p>";
                                //echo "<button type=\"button\" class=\"btn btn-sm btn-alert\"
                                //onclick=\"window.close();\">Chiudi</button>";
                                //$newpage = 'http://xenomorfo.altervista.org/scuola/index_docente.php';
                //header('Refresh: 3; url=' . $newpage);
                //echo 'Tra 5 secondi verrai reindirizzato. Se non vuoi aspettare <a href="' . $newpage . '">clicca qui</a>';
                
        }
        $connessione->close();
        ?>
    </body>
</html>

