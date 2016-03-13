<?php
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();
if (isset($_POST['ticket'])) {
$sol_cod=	intval($_POST['ticket']);
}else{
$sol_cod=0;
}
	require('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$consulta=$inventario->buscar_solicitud($sol_cod, $pgconn);
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
	$sol_fecha=$row["sol_fecha"];

}
elseif(pg_affected_rows($consulta)==0 && $sol_cod!=0){
	 echo"
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Ooops', text:'Al parecer el ticket que buscas no esta registrado', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/solicitud_equipo/consultar_solicitud.php'});
	</script>
</body>";

}