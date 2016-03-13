<?php
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require('../../modelo/mod_inventario_telefonico.php');
	$inven = new inventario_telefono();
	$consulta=$inven->listar($pgconn);

	for($i=0;$i<pg_num_rows($consulta);$i++){

	$row = pg_fetch_array($consulta,$i,PGSQL_ASSOC);

	$cod_cel_numero [$i] =$row["codigo"];
	$tel_cel_numero[$i]=$row["tel_cel_numero"];
	$tec_cod[$i]=$row["tecnologia"];
	$tip_lin_cod[$i]=$row["tipo_linea"];
	$est_lin_cod[$i]=$row["estatus"];

}
