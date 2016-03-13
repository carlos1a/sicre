<?php
class menu
{
   	private 	$men_cod;
   	private 	$men_nombre;
   	private 	$men_padre;
    private 	$perm_cod;
    private 	$per_cod;
    private 	$perm_vermenu;
    private 	$pgconn;

//------------permisos-----------//
public function permisos ($per_cod,$pgconn){

		$menu1="SELECT * FROM permisos WHERE perm_vermenu=TRUE AND per_cod=$per_cod";
		$consulta = pg_query( $pgconn, $menu1) or die("Consulta errónea: ".pg_last_error());

		if($consulta){
			return $consulta;
		}
  }
//------------End permisos-----------//

//------------Cabecera-----------//
public function cabecera ($ver, $pgconn){

    $cabecera="select*from menu where men_padre=0 and men_cod=$ver";
    $sub = pg_query( $pgconn, $cabecera) or die("Consulta errónea: ".pg_last_error());

    if($sub){
      return $sub;
    }

}
//------------End cabecera-----------//

//------------Submenu-----------//
public function submenu ($ver, $pgconn){

    $submenu="select m.* from menu m join permisos p on p.men_cod=m.men_cod where m.men_padre=$ver and perm_vermenu=TRUE";
    $subme = pg_query($pgconn, $submenu) or die("Consulta errónea: ".pg_last_error());

     if($subme){
      return $subme;
    }
}
//------------End submenu-----------//

}