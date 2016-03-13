<?php
header('Content-Type: application/json');

$op=$_POST['op'];
require_once('../../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn=$conexion->conectar();

	require_once('../../modelo/mod_graficos.php');
	$grafico = new grafico();

if($op==1){
$esta=$grafico->estatus($pgconn);
	for($i=0;$i<pg_num_rows($esta);$i++){
	$row = pg_fetch_array($esta,$i,PGSQL_ASSOC);

	$estatus[$i]=$row["estatus"];
	$cantidad[$i]=$row["cantidad"];
}
$cod=json_encode(array('estatus'=>$estatus, 'cantidad'=>$cantidad));


echo $cod;

}else if($op==2) {
	$equi=$grafico->equipos($pgconn);
	for($i=0;$i<pg_num_rows($equi);$i++){
	$row = pg_fetch_array($equi,$i,PGSQL_ASSOC);

	$equipo[$i]=$row["equipo"];
	$cantidad[$i]=$row["cantidad"];
}
$codl=json_encode(array('label' =>$equipo,
						'value'=>$cantidad));


echo $codl;

}

 ?>