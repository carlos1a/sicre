<?php
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();
if (isset($_GET['param_id'])) {
$usu_cedula=	trim(base64_decode( $_GET['param_id']));
}else{
$usu_cedula="";
}
	require('../../modelo/mod_usuario.php');
	$usuario = new usuario();
	$consulta=$usuario->obtener_cedula($usu_cedula, $pgconn);
	if(pg_num_rows($consulta)>0){
	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
	$usu_nombre=$row["usu_nombre"];
	$usu_apellido=$row["usu_apellido"];
	$usu_cedula=$row["usu_cedula"];
	$usu_telefono=$row["usu_telefono"];
	$dep_cod=$row["dep_nombre"];
	$per_cod=$row["per_nombre"];


}
