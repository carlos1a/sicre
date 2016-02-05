<?php

	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$respuesta=$inventario->operadora($pgconn);

		for($i=0;$i<pg_num_rows($respuesta);$i++){
	$row = pg_fetch_array($respuesta,$i,PGSQL_ASSOC);

	$ope_cod[$i]=$row["ope_cod"];
	$ope_nombre[$i]=$row["ope_nombre"];
}
?>