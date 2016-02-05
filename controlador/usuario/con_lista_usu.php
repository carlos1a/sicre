<?php
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require('../../modelo/mod_usuario.php');
	$usuario = new usuario();
	$consulta=$usuario->listar($pgconn);

	for($i=0;$i<pg_num_rows($consulta);$i++){

	$row = pg_fetch_array($consulta,$i,PGSQL_ASSOC);

	$usu_nombre [$i] =$row["usu_nombre"];
	$usu_apellido[$i]=$row["usu_apellido"];
	$usu_cedula[$i]=$row["usu_cedula"];
	$usu_login[$i]=$row["usu_login"];
	$usu_telefono[$i]=$row["usu_telefono"];
	$dep_cod[$i]=$row["dep"];
	$estu_cod[$i]=$row["estatus"];

}
