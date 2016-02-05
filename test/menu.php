<html>
 <head>
 <meta charset="utf-8">
 	<title>SICRE</title>
 </head>

 <body>
<?php
$perfil=1;
require ('../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();

$menu1="select*from permisos where perm_vermenu=TRUE and per_cod=$perfil";
$consulta = pg_query($pgconn,$menu1) or die("Consulta errónea: ".pg_last_error());

	for($i=0;$i<pg_num_rows($consulta);$i++){
	$row = pg_fetch_array($consulta,$i,PGSQL_ASSOC);

	$ver=$row["men_cod"];



$cabecera="select*from menu where men_padre=0 and men_cod=$ver";
$sub = pg_query($pgconn,$cabecera) or die("Consulta errónea: ".pg_last_error());

for($j=0;$j<pg_num_rows($sub);$j++){
	$row1 = pg_fetch_array($sub,$j,PGSQL_ASSOC);

echo $row1["men_nombre"]." ";


$submenu="select m.* from menu m join permisos p on p.men_cod=m.men_cod where m.men_padre=$ver and perm_vermenu=TRUE";
$subme = pg_query($pgconn,$submenu) or die("Consulta errónea: ".pg_last_error());

for($k=0;$k<pg_num_rows($subme);$k++){
	$row2 = pg_fetch_array($subme,$k,PGSQL_ASSOC);

	echo $row2["men_nombre"]." ";
   }
 }

}


?>
<div class="container">
<div class="row" >
<div class="col-md-12" >



	<br>



	</div>

	    <!-- Footer -->

	    <!-- End Footer -->
 </body>
</html>