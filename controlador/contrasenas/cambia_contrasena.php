<?php
require_once ('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();
require_once ('../../modelo/mod_usuario.php');
	$usuario = new usuario();
$login=$_POST['login'];
$contrasena_actual=$_POST['contrasena_actual'];
$contrasena_nueva=$_POST['nueva_contrasena'];
$contrasena_confi=$_POST['confi_contrasena'];


if ($contrasena_nueva==$contrasena_confi) {
$consulta=$usuario->autenticar($login,$pgconn);
	if (pg_num_rows($consulta)>0) {
			$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
		$x=$row['usu_clave'];

if (password_verify($contrasena_actual, $x)){

			$contrasena_nueva= password_hash($contrasena_nueva, PASSWORD_BCRYPT);

		$update=$usuario->cambia_clave($contrasena_nueva,$login,$pgconn);
		if ($update) {
			$valida=$usuario->autenticar($login,$pgconn);
				if (pg_num_rows($valida)>0) {
					$row = pg_fetch_array($valida,0,PGSQL_ASSOC);
		$x=$row['usu_clave'];

		if (password_verify($contrasena_confi, $x)){

				echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Cambio de Contraseña Exitoso!!', type: 'success',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/sistema/salir.php'});
	</script>
</body>";
				}
//		}
//		}
	}

	}else{
		echo "
		<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'existe un error con los datos suministrados', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/contrasenas/restablecer.php'});
	</script>
</body>";
	 }
}else{
	echo "
		<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'existe un error con los datos suministrados', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/contrasenas/restablecer.php'});
	</script>
</body>";

 }
 ?>
