<?php
	require ('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();


	$usu_cedula=		ltrim(rtrim($_POST['cedula']));
	$usu_nombre=		ltrim(rtrim(strtoupper($_POST['nombre'])));
	$usu_apellido=		ltrim(rtrim(strtoupper($_POST['apellido'])));
	$usu_login=			ltrim(rtrim($_POST['login']));
	$usu_clave=			ltrim(rtrim($_POST['clave']));
	$usu_clave_confi=	ltrim(rtrim($_POST['clave_confi']));
	$usu_telefono=		ltrim(rtrim($_POST['telefono']));
	$usu_correo=		ltrim(rtrim(strtoupper($_POST['correo'])));
	$dep_cod=			ltrim(rtrim(strtoupper($_POST['departamento'])));
	$per_cod=			ltrim(rtrim(strtoupper($_POST['perfil'])));
	$estu_cod=			ltrim(rtrim(strtoupper($_POST['estatus'])));
	$sed_cod=			ltrim(rtrim(strtoupper($_POST['sede'])));

	require ('../../modelo/mod_usuario.php');

	$usuario = new usuario();
	if($usu_clave!=$usu_clave_confi){
		echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Su clave no coincide', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../vista/usuario/registrar_usuario.php'});
	</script>
</body>";
	}
	else{
		$usu_clave=password_hash($usu_clave, PASSWORD_BCRYPT);
			$inserto=$usuario->agregar($usu_cedula, $usu_nombre,$usu_apellido,$usu_login,$usu_clave,$usu_telefono,$usu_correo,$dep_cod,$per_cod,$estu_cod,$sed_cod,$pgconn);

			if($inserto==true){


				header("Location: ../../vista/usuario/usuario_registrado.php");

			}

		}
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

