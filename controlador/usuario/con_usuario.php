<?php
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();
if (isset($_POST['cedula'])) {
$usu_cedula =	intval($_POST['cedula']);
}else{
$usu_cedula=0;
}
	require('../../modelo/mod_usuario.php');
	$usuario = new usuario();
	$consulta=$usuario->obtener_cedula($usu_cedula, $pgconn);
	if(pg_num_rows($consulta)>0){
	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
	$usu_nombre=$row["usu_nombre"];
	$usu_apellido=$row["usu_apellido"];
	$usu_telefono=$row["usu_telefono"];
	$dep_cod=$row["dep_nombre"];
	$per_cod=$row["per_nombre"];
}
elseif(pg_affected_rows($consulta)==0 && $usu_cedula!=0){
	 echo"
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Ooops', text:'Al parecer el usuario que buscas no esta registrado', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/usuario/buscar_usuario.php'});
	</script>
</body>";

}

