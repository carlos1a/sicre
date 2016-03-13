<?php

	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_farmacia.php');
	$farmacia = new farmacia();
	$resp=$farmacia->consultar_farmacia($pgconn);

		for($i=0;$i<pg_num_rows($resp);$i++){
	$row = pg_fetch_array($resp,$i,PGSQL_ASSOC);

	$far_cod[$i]=$row["far_cod"];
	$far_nombre[$i]=$row["far_nombre"];
}
?>