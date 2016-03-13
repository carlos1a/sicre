<?php

	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$res=$inventario->marca($pgconn);

		for($i=0;$i<pg_num_rows($res);$i++){
	$row = pg_fetch_array($res,$i,PGSQL_ASSOC);

	$mar_cod[$i]=$row["mar_cod"];
	$mar_desc[$i]=$row["mar_desc"];
}
?>