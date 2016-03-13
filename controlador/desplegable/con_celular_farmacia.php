<?php
header('Content-Type: application/json');
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario_telefonico.php');
	$celular = new inventario_telefono();
	$answer=$celular->consultar_celular($pgconn);

	for($j=0;$j<pg_num_rows($answer);$j++){
	$row = pg_fetch_array($answer,$j,PGSQL_ASSOC);

	$tel_can_cod[$j]=$row["codigo"];
	$tel_can_numero[$j]=$row["dial"].$row["numero"];
	
}
$cod=json_encode(array('codigo'=>$tel_can_cod, 'numero'=>$tel_can_numero, ));


echo $cod;
?>