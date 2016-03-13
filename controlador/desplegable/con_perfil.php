<?php
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_usuario.php');
	$usuario = new usuario();
	$consult=$usuario->perfil($pgconn);

		for($j=0;$j<pg_num_rows($consult);$j++){
	$row=pg_fetch_array($consult,$j,PGSQL_ASSOC);

	$per_cod[$j]=$row["per_cod"];
	$per_nombre[$j]=$row["per_nombre"];
}
?>