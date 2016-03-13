<?php
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$consulta=$inventario->listar_solicitud($pgconn);

	for($i=0;$i<pg_num_rows($consulta);$i++){
	$row = pg_fetch_array($consulta,$i,PGSQL_ASSOC);

	$usu_login[$i]=$row["usu_login"];
	$usu_nombre[$i]=$row["usu_nombre"];
	$usu_apellido[$i]=$row["usu_apellido"];
	$usu_cedula[$i]=$row["usu_cedula"];
	$usu_telefono[$i]=$row["usu_telefono"];
	$equi_desc[$i]=$row["equi_desc"];
	$tequi_desc[$i]=$row["tequi_desc"];
	$sol_cod[$i]=$row["sol_cod"];
	$sol_fecha[$i]=$row["sol_fecha"];

}