<?php

	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$respue=$inventario->tipo_linea($pgconn);

	for($j=0;$j<pg_num_rows($respue);$j++){
	$row = pg_fetch_array($respue,$j,PGSQL_ASSOC);

	$tip_lin_cod[$j]=$row["tip_lin_cod"];
	$tip_lin_nombre[$j]=$row["tip_lin_nombre"];
}
?>