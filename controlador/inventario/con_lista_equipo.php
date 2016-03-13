<?php
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$consulta=$inventario->listar($pgconn);

	for($i=0;$i<pg_num_rows($consulta);$i++){

	$row = pg_fetch_array($consulta,$i,PGSQL_ASSOC);

	$inv_serial [$i] =$row["inv_serial"];
	$inv_marca[$i]=$row["marca"];
	$inv_modelo[$i]=$row["modelo"];
	$inv_precio[$i]=$row["inv_precio"];
	$inv_fecha[$i]=$row["inv_fecha"];
	$inv_bien[$i]=$row["inv_bien"];
	$inv_descripcion[$i]=$row["inv_desc"];
	$esqui_cod[$i]=$row["estatus"];
	$usuario[$i]=$row["usuario"];
	$equipo[$i]=$row["equipo"];
	$tipo_equipo[$i]=$row["tipo_equipo"];


}
