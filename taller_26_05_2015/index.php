<?php 
error_reporting(0);
include("static/site_config.php"); 
include ("static/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
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
      <div class="row">
        <div class="col-sm-2 col-md-3"></div>
        <div class="col-sm-8 col-md-6">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="cedula" class="col-sm-2 control-label">Cedula</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="99999999999" required>
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombres" required>
              </div>
            </div>
            <div class="form-group">
              <label for="apellido" class="col-sm-2 control-label">Apellidos</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos" required>
              </div>
            </div>
            <div class="form-group">
              <label for="add" class="col-sm-2 control-label">Direccion</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="add" name="add" placeholder="Direccion">
              </div>
            </div>
            <div class="form-group">
              <label for="mail" class="col-sm-2 control-label">Correo</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="mail" name="mail" placeholder="ejemplo@mail.com" required>
              </div>
            </div>
            <div class="form-group">
              <label for="mail" class="col-sm-2 control-label">Institucion</label>
              <div class="col-sm-10">
                <select class="form-control">
                  <option>---Seleccione----</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Registrarse</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-sm-2 col-md-3"></div>
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