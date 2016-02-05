<?php  	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$consulta=$inventario->obtener_solicitud($pgconn);
	if(pg_num_rows($consulta)>0){
	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);

	$usu_login=$row["usu_login"];
	$usu_nombre=$row["usu_nombre"];
	$usu_apellido=$row["usu_apellido"];
	$usu_cedula=$row["usu_cedula"];
	$usu_telefono=$row["usu_telefono"];
	$equi_desc=$row["equi_desc"];
	$tequi_desc=$row["tequi_desc"];
	$sol_cod=$row["sol_cod"];

}