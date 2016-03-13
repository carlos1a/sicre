<?php
class inventario_telefono
{
private $ope_cod;
private $tip_lin_cod;
private $tec_cod;
private $cod_cel_cod;
private $tel_cel_numero;
private $est_lin_cod;
private $est_cod;



  //----------- Funciones para el inventario telefonico celular --------------//
//----------- Funcion que permite agregar numeros telefonicos en el inventario ----------//

public function agregar_celular($ope_cod, $tip_lin_cod, $tec_cod, $cod_cel_cod, $tel_cel_numero, $est_lin_cod, $pgconn){

	$query= "INSERT INTO telefono_celular (ope_cod, tip_lin_cod, tec_cod, cod_cel_cod, tel_cel_numero, est_lin_cod) VALUES ('$ope_cod', '$tip_lin_cod', '$tec_cod', '$cod_cel_cod', '$tel_cel_numero', '$est_lin_cod')";
	$answer= pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $answer;

}//End agregar_telefono
public function validar_celular($cod_cel_cod, $tel_cel_numero, $pgconn){

	$query= "select * from telefono_celular where cod_cel_cod= $cod_cel_cod and tel_cel_numero= $tel_cel_numero ";
	$answer= pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $answer;

}//End agregar_telefono



//----------- Funcion para listar los teléfonos almacenados --------------//

public function listar($pgconn)
    {
 		$query = "SELECT C.cod_cel_numero as codigo, T.*, TG.tec_nombre as tecnologia, TP.tip_lin_nombre as tipo_linea, ES.est_lin_nombre as estatus FROM telefono_celular T join tecnologia TG on T.tec_cod=TG.tec_cod JOIN codigo_celular C on T.cod_cel_cod=C.cod_cel_cod JOIN tipo_linea TP on T.tip_lin_cod=TP.tip_lin_cod join estatus_linea ES on ES.est_lin_cod= T.est_lin_cod ORDER BY tel_cel_cod ASC";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}//End funcion listar_celular



 //----------- Funciones para el inventario telefonico cantv --------------//

//----------- Funcion que permite agregar numeros telefonicos en el inventario -----------//

public function agregar_cantv($est_cod, $tip_lin_cod, $cod_can_cod, $tel_can_numero, $est_lin_cod, $pgconn){

	$query= "INSERT INTO telefono_cantv (est_cod, tip_lin_cod, cod_can_cod, tel_can_numero, est_lin_cod) VALUES ('$est_cod', '$tip_lin_cod', '$cod_can_cod', '$tel_can_numero','$est_lin_cod')";
	$answer= pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $answer;

}//End agregar_telefono

//----------- Funcion para consultar los telefonos cantv almacenados --------------//

public function consultar_cantv($pgconn){

	$query= "SELECT * FROM telefono_cantv ORDER BY FECHA_REGISTRO ASC";

$ans= pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($ans)
		{
			return $ans;
		}//End if

}//End consultar_celular

//----------- Funcion para listar los telefonos cantv almacenados --------------//
//----------- Funcion para listar los telefonos cantv almacenados por estado--------------//
public function consultar_cantv_por_estado($op,$pgconn){

	$query= "SELECT I.tel_can_cod as codigo,I.tel_can_numero as numero, C.cod_can_numero as dial FROM telefono_cantv I join codigo_cantv C on I.cod_can_cod=C.cod_can_cod where I.est_cod=$op ORDER BY FECHA_REGISTRO ASC";

$ans= pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($ans)
		{
			return $ans;
		}//End if

}//End consultar_cantv_por_estado
//----------- Funcion para listar los telefonos cantv almacenados por estado--------------//

//----------- Funcion para listar los telefonos celular almacenados --------------//
//----------- Funcion para listar los telefonos celular almacenados --------------//
public function consultar_celular($pgconn){

	$query= "SELECT I.tel_cel_cod as codigo,I.tel_cel_numero as numero, C.cod_cel_numero as dial FROM telefono_celular I join codigo_celular C on I.cod_cel_cod=C.cod_cel_cod where I.est_lin_cod=2 ORDER BY I.ope_cod ASC";

$ans= pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($ans)
		{
			return $ans;
		}//End if

}//End consultar_cantv_por_estado
//----------- Funcion para listar los telefonos celular almacenados --------------//


public function listar_cantv($pgconn)
    {
 		$query = "SELECT ES.est_lin_nombre as estatus, E.est_nombre as Estado, C.cod_can_numero as codigo, T.*, TP.tip_lin_nombre as tipo_linea FROM telefono_cantv T JOIN codigo_cantv C on T.cod_can_cod=C.cod_can_cod JOIN estatus_linea ES on T.est_lin_cod=ES.est_lin_cod JOIN tipo_linea TP on T.tip_lin_cod=TP.tip_lin_cod JOIN estado E on T.est_cod=E.est_cod ORDER BY tel_can_cod ASC";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}//End funcion listar_cantv

}//End inventario_telefono
 ?>