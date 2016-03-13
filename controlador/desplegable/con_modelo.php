<?php

	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$query=$inventario->modelo($pgconn);

		for($i=0;$i<pg_num_rows($query);$i++){
	$row = pg_fetch_array($query,$i,PGSQL_ASSOC);

	$mod_cod[$i]=$row["mod_cod"];
	$mod_desc[$i]=$row["mod_desc"];
}
?>