<?php

	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$res2=$inventario->estatus_linea($pgconn);

		for($i=0;$i<pg_num_rows($res2);$i++){
	$row = pg_fetch_array($res2,$i,PGSQL_ASSOC);

	$est_lin_cod[$i]=$row["est_lin_cod"];
	$est_lin_nombre[$i]=$row["est_lin_nombre"];
}
?>