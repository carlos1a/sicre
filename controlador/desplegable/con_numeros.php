<?php

header('Content-Type: application/json');
$op=$_POST['op'];
require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$numero=$inventario->codigo_celular($op,$pgconn);

	for($i=0;$i<pg_num_rows($numero);$i++){
	$row = pg_fetch_array($numero,$i,PGSQL_ASSOC);

	$cod_cel_cod[$i]=$row["cod_cel_cod"];
	$cod_cel_numero[$i]=$row["cod_cel_numero"];
}
$cod=json_encode(array('cod'=>$cod_cel_cod, 'num'=>$cod_cel_numero));


echo $cod;


?>