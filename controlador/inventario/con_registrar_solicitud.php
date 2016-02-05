<?php
	require ('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();


	$usu_cod=		trim($_POST['usu_cod']);
	$equi_cod=		trim(strtoupper($_POST['equipo']));
	$tequi_cod=		trim(strtoupper($_POST['tipo_equipo']));

	if($tequi_cod==0){
		$tequi_cod=13;
	}
if($usu_cod==0){
		echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Ooops!', text:'Completa el formulario para realizar la solicitud', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/solicitud_equipo/solicitar_equipo.php'});
	</script>
</body>";
}else{

	require ('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$inserto=$inventario->agregar_solicitud($usu_cod,$equi_cod, $tequi_cod, $pgconn);

if($inserto)
	echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Registro Exitoso!', type: 'success',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/solicitud_equipo/solicitud_registrada.php'});
	</script>
</body>";
}
?>