<?php
class farmacia
{

   	private 	$est_cod;
   	private 	$far_cod;
   	private 	$far_nombre;
    private 	$far_direccion;
    private 	$far_telefono;
    private 	$far_responsable;
    private 	$pgconn;


    public function agregar($est_cod, $far_nombre, $far_direccion, $far_telefono, $far_responsable, $pgconn){
		$query = "INSERT INTO farmacia (est_cod, far_nombre, far_direccion, far_telefono, far_responsable)
				VALUES('$est_cod', '$far_nombre', '$far_direccion', '$far_telefono', '$far_responsable')";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }//agregar farmacias



    public function consultar_farmacia($pgconn)
    {
 		$query = "SELECT * FROM farmacia ORDER BY far_nombre ASC";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}//if
	}//consultar_farmacia

 public function listar_estado($pgconn)
    {
 		$query = "SELECT * FROM estado";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}
}