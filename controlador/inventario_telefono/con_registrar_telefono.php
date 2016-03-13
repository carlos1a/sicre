<?php
	require ('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();


	$ope_cod=			trim($_POST['operadora']);
	$tip_lin_cod=		trim($_POST['tipo_linea']);
	$tec_cod=			trim($_POST['tecnologia']);
	$cod_cel_cod=		trim($_POST['codigo_celular']);
	$tel_cel_numero=	trim($_POST['tel_cel_numero']);
	$est_lin_cod=		trim($_POST['estatus']);



	require ('../../modelo/mod_inventario_telefonico.php');

	$telefono = new inventario_telefono();

	$valida=$telefono->validar_celular($cod_cel_cod, $tel_cel_numero, $pgconn);

	if (pg_num_rows($valida)==0) {
		# code...

	$inserto=$telefono->agregar_celular($ope_cod, $tip_lin_cod, $tec_cod, $cod_cel_cod, $tel_cel_numero, $est_lin_cod, $pgconn);

				if($inserto)
					echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Registro Exitoso!', type: 'success',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/inventario_telefonico/registrar_numero_celular.php'});
	</script>
</body>";

}else{
echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Lo sentimos', text:'Este Número ya se Encuentra Registrado en el Sistema', type: 'warning',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/inventario_telefonico/registrar_numero_celular.php'});
	</script>
</body>";
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
