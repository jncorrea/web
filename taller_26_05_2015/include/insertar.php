<?php 
    extract($_POST);
	include("../static/clase_mysql.php");
	include("../static/site_config.php");
	$miconexion = new clase_mysql;
	$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
	$x=0;
	for ($i=0; $i <count($_POST); $i++) {
		if ($i==0) {
			$bd = array_values($_POST)[$i];
		}else{
			$lista[$x] = array_values($_POST)[$i];
			$x++;
		}
	}
    $sql=$miconexion->sql_ingresar($bd,$lista); 
	//echo "../admin.php?bd=".$bd;
    $miconexion->consulta($sql);
    echo '<script>alert("Fila insertada")</script>';
    echo "<script>location.href='../admin.php?bd=$bd'</script>";
?>