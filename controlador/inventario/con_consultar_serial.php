<?php
	require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();
if (isset($_POST['serial'])) {
$inv_serial=	trim($_POST['serial']);
}else{
$inv_serial="0";
}
if (isset($_POST['codigo'])) {
$inv_cod=	trim($_POST['codigo']);
}else{
$inv_cod=0;
$esqui_cod=0;
}
	require_once('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$consulta=$inventario->consulta_serial($inv_serial,$pgconn);

	if(pg_num_rows($consulta)>0 ){

	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
	$inv_cod=$row["codigo"];
	$inv_serial=$row["serial"];
	$inv_bien=$row["bien"];
	$mar_cod=$row["marca"];
	$mod_cod=$row["modelo"];
	$equi_cod=$row["equipo"];
	$tequi_cod=$row["tipo_equipo"];
	$esqui_cod=$row["estatus"];
	if ($esqui_cod==2){
echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Lo sentimos!', text:'El equipo ya se encuentra asignado', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/inventario/asignar_equipo.php'});
	</script>
</body>";
}
}elseif (pg_num_rows($consulta)==0 && $inv_serial!="0") {
	# code...


	echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Lo sentimos', text:'El serial No pertenece al inventario', type: 'warning',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/inventario/asignar_equipo.php'});
	</script>
</body>";
}

?>