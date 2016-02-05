<?php
	require ('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();


	$inv_cod=			trim(strtoupper($_POST['codigo']));
	$usu_login=			trim(strtoupper($_POST['usu_login']));
	$usu_cedula=	$_POST['cedula'];

//----------------------------------------------------------------------------
require('../../modelo/mod_usuario.php');
$usuario = new usuario();
$consulta=$usuario->obtener_cedula($usu_cedula, $pgconn);
if(pg_num_rows($consulta)>0){
	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
	$usu_cod=$row["usu_cod"];

}else {
	echo "
<body>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
<script type='text/javascript'>swal({title:'Cédula No Valida', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/inventario/asignar_equipo.php'});
</script>
</body>";
}
//-------------------------------------------------------------------


	require ('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$inserto=$inventario->agregar_asignado_temporal( $inv_cod, $usu_cod,$usu_login, $pgconn);

				if($inserto){
				//	$consulta=$inventario->mostrar_asignado($pgconn);
					//$row=pg_fetch_array($consulta,0,PGSQL_ASSOC);

					echo "
				<body>
				<meta http-equiv='content-type' content='text/html; charset=utf-8' />
				<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
				<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
				<script type='text/javascript'>swal({title:'Registro Exitoso!', type: 'success',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/inventario/asignar_equipo.php'});
				</script>
				</body>";

			}else {
				echo "
			<body>
			<meta http-equiv='content-type' content='text/html; charset=utf-8' />
			<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
			<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
			<script type='text/javascript'>swal({title:'Error De Registro', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../../vista/inventario/asignar_equipo.php'});
			</script>
			</body>";
			}



?>
