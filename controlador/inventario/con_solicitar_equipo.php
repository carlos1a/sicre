<?php
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();
if (isset($_POST['usu_login'])) {
$usu_login=	trim($_POST['usu_login']);
}else{
$usu_login="";
$usu_cod="";
$usu_nombre="";
$usu_apellido="";
$usu_telefono="";
$dep_cod="";
$per_cod="";
}
	require('../../modelo/mod_usuario.php');
	$usuario = new usuario();
	$consulta=$usuario->obtener_cod($usu_login, $pgconn);
	if(pg_num_rows($consulta)>0){
	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
	$usu_cod=$row["usu_cod"];
	$usu_login=$row["usu_login"];
	$usu_nombre=$row["usu_nombre"];
	$usu_apellido=$row["usu_apellido"];
	$usu_telefono=$row["usu_telefono"];
	$dep_cod=$row["dep_nombre"];
	$per_cod=$row["per_nombre"];

}
