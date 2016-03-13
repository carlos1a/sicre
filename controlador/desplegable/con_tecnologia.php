<?php

	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$res1=$inventario->tecnologia($pgconn);

		for($i=0;$i<pg_num_rows($res1);$i++){
	$row = pg_fetch_array($res1,$i,PGSQL_ASSOC);

	$tec_cod[$i]=$row["tec_cod"];
	$tec_nombre[$i]=$row["tec_nombre"];
}
?>