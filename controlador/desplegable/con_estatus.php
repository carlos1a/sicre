<?php

	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_usuario.php');
	$usuario = new usuario();
	$estatus=$usuario->estatus($pgconn);

		for($i=0;$i<pg_num_rows($estatus);$i++){
	$row = pg_fetch_array($estatus,$i,PGSQL_ASSOC);

	$estu_cod[$i]=$row["estu_cod"];
	$estu_descripcion[$i]=$row["estu_descripcion"];
}
?>