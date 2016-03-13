<?php
	require ('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();


	$mar_cod=		trim($_POST['marca']);
	$mod_desc=		trim(strtoupper($_POST['modelo']));
	require ('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$inserto=$inventario->agregar_modelo($mod_desc,$mar_cod, $pgconn);

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