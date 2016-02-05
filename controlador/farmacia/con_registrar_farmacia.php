<?php
	require ('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();

 	 	$array= 			$_POST['param1'];

$num='';
foreach ($array as $key ) {
	if ($key['name']=="estado"){
		$est_cod=$key['value'];

	}
	if ($key['name']=="nombre"){
		$far_nombre=$key['value'];

	}
	if ($key['name']=="direccion"){
		$far_direccion=$key['value'];

	}
	if ($key['name']=="responsable"){
		$far_responsable=$key['value'];

	}

	if ($key['name']=="numero"){
		$num.=$key['value'].' ';

	}
	if ($key['name']=="tipo_linea"){
		$tipo_linea=$key['value'];

	}
}

	require ('../../modelo/mod_farmacia.php');
	$farmacia = new farmacia();
	$inserto=$farmacia->agregar($est_cod, $far_nombre, $far_direccion,json_encode(array( $tipo_linea =>  $num)), $far_responsable, $pgconn);

				if($inserto)

					echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Registro Exitoso!', type: 'success',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/farmacia/agregar_farmacia.php'});
	</script>
</body>";

?>
