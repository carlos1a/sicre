<?php

	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$estatus_equipo=$inventario->estatus_equipo($pgconn);

		for($i=0;$i<pg_num_rows($estatus_equipo);$i++){
	$row = pg_fetch_array($estatus_equipo,$i,PGSQL_ASSOC);

	$esqui_cod[$i]=$row["esqui_cod"];
	$esqui_desc[$i]=$row["esqui_desc"];
}
?>