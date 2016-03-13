<?php
		require ('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();
		require ('../../modelo/mod_inventario.php');

for ($i=0; $i < 200; $i++) {
	# code...

	$inv_serial=	'prueba'.$i;
	$inv_marca=	'14';
	$inv_modelo=	'2';
	$inv_precio=	'200';
	$inv_bien=	'123'.$i;
	$inv_descripcion='loren';
	$esqui_cod=	'1';
	$usu_cod=		'19';
	$equi_cod=	'6';
	$tequi_cod=	'12';
	$inventario = new inventario();
	$inv_fecha=date("d-m-Y h:i:s");

	$inserto=$inventario->agregar($equi_cod, $tequi_cod, $inv_serial, $inv_marca, $inv_modelo, $inv_precio, $inv_bien, $inv_descripcion, $esqui_cod, $usu_cod, $pgconn);
}
				if($inserto)
					echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Registro Exitoso!', type: 'success',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/inventario/registrar_equipo.php'});
	</script>
</body>";
?>