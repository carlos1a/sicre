<?php

	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario_telefonico.php');
	$cantv = new inventario_telefono();
	$answer=$cantv->consultar_cantv($pgconn);

	for($j=0;$j<pg_num_rows($answer);$j++){
	$row = pg_fetch_array($answer,$j,PGSQL_ASSOC);

	$tel_can_cod[$j]=$row["tel_can_cod"];
	$tel_can_numero[$j]=$row["tel_can_numero"];
	$cod_can_co[$j]=$row["cod_can_cod"];
}
?>