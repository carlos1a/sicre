<?php

	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_usuario.php');
	$usuario = new usuario();
	$res=$usuario->departamento($pgconn);

		for($i=0;$i<pg_num_rows($res);$i++){
	$row = pg_fetch_array($res,$i,PGSQL_ASSOC);

	$dep_cod[$i]=$row["dep_cod"];
	$dep_nombre[$i]=$row["dep_nombre"];
}
?>