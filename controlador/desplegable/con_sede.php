<?php

	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$respuesta=$inventario->sede($pgconn);

		for($i=0;$i<pg_num_rows($respuesta);$i++){
	$row = pg_fetch_array($respuesta,$i,PGSQL_ASSOC);

	$sed_cod[$i]=$row["sed_cod"];
	$sed_desc[$i]=$row["sed_desc"];
}
?>