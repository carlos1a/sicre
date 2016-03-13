<?php
	require ('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();


	$inv_serial=		trim($_POST['serial']);
	$inv_marca=		trim($_POST['marca']);
	$inv_modelo=		trim($_POST['modelo']);
	$inv_precio=		trim($_POST['precio']);
	$inv_bien=		trim($_POST['bien']);
	$inv_descripcion=	trim($_POST['descripcion']);
	$esqui_cod=		trim($_POST['estatus']);
	$usu_cod=		trim($_POST['usu_cod']);
	$equi_cod=		trim($_POST['equipo']);
	if(!isset($_POST['tipo_equipo'])){
	$tequi_cod= 13;
		}else{
	$tequi_cod=	trim($_POST['tipo_equipo']);

		}
	require ('../../modelo/mod_inventario.php');
	$inv_fecha=date("d-m-Y h:i:s");
	$inventario = new inventario();
	$inserto=$inventario->agregar($equi_cod, $tequi_cod, $inv_serial, $inv_marca, $inv_modelo, $inv_precio, $inv_bien, $inv_descripcion, $esqui_cod, $usu_cod, $pgconn);

				if($inserto)
					echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Registro Exitoso!', type: 'success',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/inventario/registrar_equipo.php'});
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
