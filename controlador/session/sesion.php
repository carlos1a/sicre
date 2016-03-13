<?php
require_once('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn= $conexion->conectar();
//------------Session Start-----------//
session_start();
$inactivo =21600;
$_SESSION['usu_login'];
$_SESSION['usu_clave'];
$_SESSION['usu_cod'];
$_SESSION['usu_cedula'];
$per_cod=($_SESSION['per_cod']);
$_SESSION['usu_nombre'];
$_SESSION['usu_apellido'];

if(!isset($_SESSION['usu_login'])){
	header('Location: ../../index.php');
	 }else{
		}
if(isset($_SESSION['time']))
{
	$vida_session=time() - $_SESSION['time'];
		if($vida_session > $inactivo)
			{

			session_destroy();
				header('Location: ../../index.php');}

}
$_SESSION['time'] = time ();


//------------End Session Start-----------//

//------------Menu-----------//


require('../../modelo/mod_menu.php');
$menu = new menu();
$c = $menu->permisos($per_cod,$pgconn);

for($i=0;$i<pg_num_rows($c);$i++){
	$row = pg_fetch_array($c,$i,PGSQL_ASSOC);

	$ver[$i]=$row["men_cod"];
}

?>