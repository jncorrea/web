<?php 
	error_reporting(0);
    extract($_POST);
	include("../static/clase_mysql.php");
	include("../static/site_config.php");
	$miconexion = new clase_mysql;
	$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
	/*$miconexion->consulta("SHOW COLUMNS FROM ".$db_name.".".$bd."");
	for ($i=0; $i < $miconexion->numregistros(); $i++) { 
        $atrib=$miconexion->consulta_lista();
        $columnas[$i]=$atrib[0];
    }*/
	$x=0;
	for ($i=0; $i <count($_POST); $i++) {
		if ($i==0) {
			$bd = array_values($_POST)[$i];
		}else{
			$list[$x] = array_values($_POST)[$i];
			$columnas[$x]= array_keys($_POST)[$i];
			$x++;
		}
	}
    $sql=$miconexion->sql_actualizar($bd,$list,$columnas);
	//echo "../admin.php?bd=".$bd;
    $miconexion->consulta($sql);
    echo '<script>alert("Fila Actualizada")</script>';
    echo "<script>location.href='../admin.php?bd=$bd'</script>";
?>