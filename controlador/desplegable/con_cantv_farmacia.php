<?php
header('Content-Type: application/json');
$op=$_POST['op'];
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario_telefonico.php');
	$cantv = new inventario_telefono();
	$answer=$cantv->consultar_cantv_por_estado($op,$pgconn);

	for($j=0;$j<pg_num_rows($answer);$j++){
	$row = pg_fetch_array($answer,$j,PGSQL_ASSOC);

	$tel_can_cod[$j]=$row["codigo"];
	$tel_can_numero[$j]=$row["dial"].$row["numero"];
	
}
$cod=json_encode(array('cod'=>$tel_can_cod, 'num'=>$tel_can_numero, ));


echo $cod;
?>