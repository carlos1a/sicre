<?php
//---------menu-cabeceras---------//

require_once('../modelo/mod_menu.php');
$menu = new menu();


//$menar = array( );
for ($n=0; $n <count($ver); $n++) {
	# code...
$op=$ver[$n];

$sub = $menu->cabecera($op,$pgconn);
$subme=$menu->submenu($op,$pgconn);


for($j=0;$j<pg_num_rows($sub);$j++){
	$row1 = pg_fetch_array($sub,$j,PGSQL_ASSOC);
//$su= array();
	//echo '<ul>'.$row1["men_nombre"]."</ul>";

//--------sub-menu---------------//


for($k=0;$k<pg_num_rows($subme)/2;$k++){

	$row2 = pg_fetch_array($subme,$k,PGSQL_ASSOC);
//array_push($su,$row2["men_nombre"] );
	//echo '<ul>'.$row1["men_nombre"]."</ul>";
	//echo '<li>'.$row2["men_nombre"]."</li>";

//$aux = array($row1["men_nombre"] => $su );
//unset($su);
//array_push($menar, $aux);

}
}
}


?>