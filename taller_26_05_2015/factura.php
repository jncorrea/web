<?php 
//error_reporting(0);
header('Content-Type: text/html; charset=ISO-8859-1');
include("static/site_config.php"); 
include ("static/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
extract($_GET);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo utf8_decode($site_name); ?></title>
  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
  <!--////////////////////////MENU///////////////////////////////////////////////////////-->
    <link rel="stylesheet" href="estilos/styles.css">
    <!---->
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/script.js"></script>
    <link rel="stylesheet" href="estilos/styles_vertical.css"> 
    <script src="bootstrap/js/script_vertical.js"></script>

    <!--//////////////////////////////////////////////////////////////////////////////////-->
</head>
<body>
  <!-- Static navbar -->
    <nav class="contenedor">
      <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9">
          <a class="navbar-brand" href="index.php"><?php echo $project_name; ?>
          </a>
        </div>
        <div class="admin col-xs-3 col-sm-3 col-md-2">
          <a href="include/login.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Log in</a>
        </div>
        <div class="admin col-xs-12 col-sm-12 col-md-1"></div>       
      </div>
    </nav>
    <!------- CONTENEDOR---->
    <div class="container">
          <?php
            $miconexion->consulta("
            select ins.ci, ins.nombre, ins.apellido, ins.direccion, ins.correo, 
                  ins.fecha, con.conferencia, con.auditorio, con.hora_inicio, 
                  con.hora_fin, inst.institucion, inst.descuento, ti.tipoinscrito,
                  ti.costo_inscripcion, cur.curso, cur.costo_curso 
            from inscripcion ins, conferencia con, cursos cur, institucion inst, 
                  tipoinscrito ti, conferencia_ins coin, cursos_inscripcion cuin 
            where ins.ci = coin.ci and ins.ci = cuin.ci and ins.id_inst = inst.id_inst 
                  and ins.id_tipoinscrito = ti.id_tipoinscrito and coin.id_conferencia = con.id_conferencia 
                  and cuin.id_curso = cur.id_curso and ins.ci =".$ci);
            $lista=$miconexion->consulta_lista();
         ?>
      <div class="row">
        <div class="col-xs-12 col-md-4">
          <h4>CI:</h4> <?php echo $lista[0]; ?> <br>
          <h4>Nombre:</h4> <?php echo $lista[1]; ?> <br>
          <h4>Apellido:</h4> <?php echo $lista[2]; ?> <br>
          <h4>Direccion:</h4> <?php echo $lista[3]; ?> <br>
          <h4>Correo:</h4> <?php echo $lista[4]; ?> <br>
          <h4>Fecha:</h4> <?php echo $lista[5]; ?> <br>
          <h4>Conferencia:</h4> <?php echo $lista[6]." Auditorio: ".$lista[7]." Horario: ".$lista[8]." - ".$lista[9]; ?> <br>
          <h4>Institucion:</h4> <?php echo $lista[10]; ?> <br>
        <div class="col-xs-12 col-md-4">
          <h4>Inscripciones:</h4> <br>
          <?php echo $lista[6];?> <br>
          <?php echo $lista[14];?> <br>
          <h4>Total: <br>
          
        </div>
        <div class="col-xs-6 col-md-4"></div>
          <h4>Costos:</h4> <br>
          <?php echo $lista[13];?> <br>
          <?php echo $lista[15];?> <br>
          <?php echo ($lista[13] + $lista[15]);?> <br>

        <div class="col-xs-12 col-md-4"></div>

      </div>
    </div>
    <!---------FOOTER---------->
    <?php include("static/footer.php");?>
    <!-------------------------->
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