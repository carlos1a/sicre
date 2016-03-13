<?php
require('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn= $conexion->conectar();

$nivel = $_GET['cmd'];

if  ($nivel=="in_nivel1"){
	$lista1 = $_GET['param_id'];
$result = pg_query($pgconn,"SELECT * FROM equipo ORDER BY equi_desc ASC");
echo "<option  selected='selected' value=''>Selecione</option>";
WHILE ($ROW = pg_FETCH_array($result) or die ( pg_last_error($pgconn))) {
	echo '<option value="'.$ROW['equi_cod'].'">'.$ROW['equi_desc'].'</option>';
	echo $_GET['cmd'];
}}

elseif  ($nivel=="in_nivel2"){
	$lista1 = $_GET['param_id'];
$result = pg_query($pgconn,"SELECT * FROM tipo_equipo Where equi_cod = $lista1 ORDER BY tequi_desc ASC");

WHILE ($ROW = pg_FETCH_array($result)){
	echo '<option value="'.$ROW['tequi_cod'].'">'.$ROW['tequi_desc'].'</option>';
}}
/*
elseif  ($nivel=="in_nivel3"){
	$lista1 = $_GET['param_id'];
$result = mysqli_query($mysqlconn,"SELECT * FROM tercero Where IDnivel2 = $lista1");
WHILE ($ROW = mysqlI_FETCH_array($result)){
	echo '<option value="'.$ROW['IDnivel3'].'">'.$ROW['Nivel3'].'</option>';
}}
elseif  ($nivel=="voz_nivel1"){
	$lista1 = $_GET['param_id'];
$result = mysqli_query($mysqlconn,"SELECT * FROM voz_niv1");
WHILE ($ROW = mysqlI_FETCH_array($result)){
	echo '<option value="'.$ROW['id_niv1'].'">'.$ROW['nivel1'].'</option>';
}}
elseif  ($nivel=="voz_nivel2"){
	$lista1 = $_GET['param_id'];
$result = mysqli_query($mysqlconn,"SELECT * FROM voz_niv2 Where id_niv1 = $lista1");
WHILE ($ROW = mysqlI_FETCH_array($result)){
	echo '<option value="'.$ROW['id_niv2'].'">'.$ROW['nivel2'].'</option>';
}}*/




?>