<?php
function p ($consulta){

		if(pg_num_rows($consulta)>0){
		session_start();
		$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
		$_SESSION["usu_login"]=$row["usu_login"];
		$_SESSION["usu_clave"]=$row["usu_clave"];
		$_SESSION["per_cod"]=$row["per_cod"];
		$_SESSION["usu_cedula"]=$row["usu_cedula"];
		$_SESSION["usu_nombre"]=$row["usu_nombre"];
		$_SESSION["usu_apellido"]=$row["usu_apellido"];
		$_SESSION["estu_cod"]=$row["estu_cod"];
		$_SESSION["usu_cod"]=$row["usu_cod"];

return true;

}else return false;}//fin funcion p

	$usu_login 		= $_POST['login'];
	$usu_clave 		= $_POST['clave'];
   	$_SESSION['login']	= $usu_login;
   	$_SESSION['clave']	= $usu_clave;

	require('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn= $conexion->conectar();

		require('../../modelo/mod_usuario.php');
		$usuario = new usuario();
		$consulta = $usuario->autenticar($usu_login,$pgconn);

if(pg_num_rows($consulta)>0){
		$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
		$x=$row['usu_clave'];
}
  if (password_verify($usu_clave, $x) and p($consulta)==true){

    header("Location: ../../vista/sistema/inicio.php");
} else {
    echo "
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'Error!', text:'Verifique sus datos o póngase en contacto con el administrador', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../../index.php'});
	</script>
</body>";

}
/*if($mensaje!="") { echo $mensaje;}*/
?>