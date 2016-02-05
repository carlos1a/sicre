<?php
	require ('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();



	$tip_lin_cod=		trim($_POST['tipo_linea']);
	$cod_can_cod=		trim($_POST['codigo_cantv']);
	$tel_can_numero=	trim($_POST['tel_can_numero']);
	$est_lin_cod=		trim($_POST['estatus']);
	$est_cod=			trim($_POST['estado']);


	require ('../../modelo/mod_inventario_telefonico.php');

	$telefono = new inventario_telefono();
	$inserto=$telefono->agregar_cantv($est_cod, $tip_lin_cod, $cod_can_cod, $tel_can_numero, $est_lin_cod, $pgconn);

				if($inserto)
					echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Registro Exitoso!', type: 'success',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/inventario_telefonico/registrar_numero_celular.php'});
	</script>
</body>";
			/*else{

				echo"no resgistrado";
				//header("Location: ../vistas/empleados/vis_empleadoRegistrado.php");
			}
		/*}else{
			$actualizar=$objEmpleado->modificar($emp_nombre,$emp_apellido,$emp_cedula,$emp_telefono,$emp_turno,$emp_correo,$emp_login,$emp_clave,$car_cod,$emp_codigo,$pgconn);
			if($actualizar==true){
				header("Location: ../vistas/empleados/vis_empleadoRegistrado.php?Emp=".$emp_codigo);
			}
			else{
				header("Location: ../vistas/empleados/vis_empleadoRegistrado.php");
			}*/
