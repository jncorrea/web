<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: index.php'); 
  exit();
}
include("static/site_config.php"); 
include ("static/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
$bd=""; 
extract($_GET);
if($bd==''){$bd="conferencia";}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo utf8_decode($site_name); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    <link rel="stylesheet" type="text/css" href="estilos/styles.css">
    <!--/////////////////////////////////CKEDITOR/////////////////////////////////////////-->
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!--//////////////////////////////////////////////////////////////////////////////////-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="contenedor">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2">
          <a class="navbar-brand" href="#"><?php echo $project_name; ?>
            <small id="slogan"><br><?php echo $project_slogan; ?></small>
          </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9">
          <div id='cssmenu'>
            <?php
              $miconexion->consulta("SHOW FULL TABLES FROM ". $db_name);
              $miconexion->consulta_menu();
            ?>
          </div>
        </div>
        <div class="admin col-xs-12 col-sm-12 col-md-1">
          <a href="include/logout.php">Salir
            <span class="glyphicon glyphicon-user"></span>
          </a>
        </div>
      </div>
    </nav>
    
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="cont-admi jumbotron">
        <h1 style="text-align:center;"><?php echo ucfirst($bd) ?></h1><hr>
        <?php
        if(@$act==2){
          $miconexion->consulta("select * from $bd where $nom=".$id."");               
          $contenido=$miconexion->consulta_lista();
          $miconexion->consulta("SHOW COLUMNS FROM ".$db_name.".".$bd."");
          $miconexion->consulta_tabla2($bd, $contenido);
        }else{
          $miconexion->consulta("SHOW COLUMNS FROM ".$db_name.".".$bd."");
          $miconexion->consulta_tabla($bd);          
        }
          $miconexion->consulta("select * from ".$bd."");
          $miconexion->verconsulta($bd);
          if(@$act==1){
            $miconexion->consulta("delete from ".$bd." where $nom=$id");
            $miconexion->verconsulta();
            echo '<script>alert("eliminado")</script>';
            echo "<script>location.href='admin.php?bd=$bd'</script>";
          }/*
          if(@$act==2){
            echo "actualizar";
            echo '<script>alert("actualizado")</script>';
          }*/
        ?>
      </div>     

      <hr>

      <?php include("static/footer.php");?>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
    <script src="bootstrap/js/script.js"></script>
    
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  </body>
</html>
