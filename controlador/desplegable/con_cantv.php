<?php

header('Content-Type: application/json');
$op=$_POST['op'];
require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$numero=$inventario->codigo_cantv($op,$pgconn);

	for($i=0;$i<pg_num_rows($numero);$i++){
	$row = pg_fetch_array($numero,$i,PGSQL_ASSOC);

	$cod_can_cod[$i]=$row["cod_can_cod"];
	$cod_can_numero[$i]=$row["cod_can_numero"];
}
$cod=json_encode(array('cod'=>$cod_can_cod, 'num'=>$cod_can_numero));


echo $cod;


?>