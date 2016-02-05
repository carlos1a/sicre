<?php
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require('../../modelo/mod_farmacia.php');
	$farmacia = new farmacia();
	$consulta=$farmacia->listar_estado($pgconn);

	for($i=0;$i<pg_num_rows($consulta);$i++){

	$row = pg_fetch_array($consulta,$i,PGSQL_ASSOC);

	$est_cod [$i] =$row["est_cod"];
	$est_nombre[$i]=$row["est_nombre"];



}
