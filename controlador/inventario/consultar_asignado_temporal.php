<?php
header('Content-Type: application/json');

require_once('../../modelo/mod_connex.php');
$conexion = new Connex();
$pgconn=$conexion->conectar();
require ('../../modelo/mod_inventario.php');
$inventario = new inventario();

$consulta=$inventario->mostrar_asignado($pgconn);

for ($i=0; $i <pg_num_rows($consulta) ; $i++) {
  # code...

$row=pg_fetch_array($consulta,$i,PGSQL_ASSOC);

$equipo[$i]= 		$row["equi_desc"];
$marca[$i]= 		$row["mar_desc"];
$modelo[$i]= 		$row["mod_desc"];
$tipo_equipo[$i]= 	$row["tequi_desc"];
$serial[$i]= 		$row["inv_serial"];
$nombre[$i]= 		$row["usu_nombre"];
$apellido[$i]= 		$row["usu_apellido"];
}
$r=json_encode(array('equipo' =>$equipo ,'marca' =>$marca ,'modelo' =>$modelo ,'tipo_equipo' =>$tipo_equipo ,'serial' =>$serial,'nombre' =>$nombre ,'apellido' =>$apellido
));

echo $r;
 ?>
