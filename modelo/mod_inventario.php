<?php
class inventario
{

   	private 	$inv_serial;
   	private 	$inv_marca;
   	private 	$inv_modelo;
    private 	$inv_precio;
    private 	$inv_fecha;
    private 	$inv_bien;
    private 	$inv_descripcion;
    private 	$est_cod;
    private 	$usu_cedula;
    private 	$equi_id;
    private 	$tip_lin_nombre;
    private 	$tip_lin_cod;
    private 	$tequi_id;
    private 	$sed_cod;
    private 	$sed_desc;
    private 	$pgconn;


public function mostrar($pgconn){
		$query= "SELECT equi_id, tequi_id, inv_serial, inv_marca, inv_modelo, inv_precio, inv_bien, inv_descripcion, est_cod, usu_cedula FROM inventario ORDER BY inv_cod desc LIMIT 1";
		$consulta= pg_query($pgconn, $query) or die ("Consulta Errónea: ".pg_last_error());
		if($consulta){
			return ($consulta);
			}// if mostrar
		}//class mostrar

    public function agregar($equi_cod, $tequi_cod, $inv_serial, $inv_marca, $inv_modelo, $inv_precio, $inv_bien, $inv_descripcion, $esqui_cod, $usu_cod, $pgconn)
	{
		$query = "INSERT INTO inventario (equi_cod, tequi_cod, inv_serial, mar_cod, mod_cod, inv_precio,  inv_bien, inv_desc, esqui_cod, usu_cod)
				VALUES('$equi_cod', '$tequi_cod', '$inv_serial', '$inv_marca', '$inv_modelo', '$inv_precio', '$inv_bien', '$inv_descripcion', '$esqui_cod', '$usu_cod')";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }


     public function agregar_marca($mar_desc, $pgconn)
	{
		$query = "INSERT INTO marca (mar_desc)
				VALUES('$mar_desc')";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }
    public function agregar_modelo($mod_desc,$mar_cod, $pgconn)
	{
		$query = "INSERT INTO modelo (mod_desc, mar_cod)
				VALUES('$mod_desc', '$mar_cod')";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }

     public function agregar_equipo($equi_desc, $pgconn)
	{
		$query = "INSERT INTO equipo (equi_desc)
				VALUES('$equi_desc')";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }
 public function agregar_tipo_equipo($tequi_desc,$equi_cod, $pgconn)
	{
		$query = "INSERT INTO tipo_equipo (tequi_desc, equi_cod)
				VALUES('$tequi_desc','$equi_cod')";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }


    public function modificar($usu_nombre,$usu_apellido, $usu_cedula,$usu_telefono,$usu_correo,$dep_cod, $per_cod, $pgconn)
	{
		$query = "UPDATE usuario SET usu_nombre='$usu_nombre',usu_apellido='$usu_apellido', usu_telefono='$usu_telefono', usu_correo='$usu_correo'
				 WHERE usu_cedula='$usu_cedula'";
		$rec = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		if ($rec)
        {
			return "ok";
		}
		else
		{
			return "nok";
		}

    }

    public function obtener($pgconn)
    {
 		$query = "SELECT U.*,D.*, P.* from usuario U JOIN departamento D ON U.dep_cod=D.dep_cod join perfil P on U.per_cod=P.per_cod order by usu_cedula desc LIMIT 1 ";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

  public function obtener_cedula($usu_cedula,$pgconn)
    {
 		$query = "SELECT U.*,D.*, P.* from usuario U JOIN departamento D ON U.dep_cod=D.dep_cod join perfil P on U.per_cod=P.per_cod WHERE usu_cedula='$usu_cedula' ";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function buscar($usu_cedula,$pgconn)
    {
 		$query = "select * from usuario WHERE usu_cedula='$usu_cedula'";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

	public function autenticar($usu_cedula,$usu_clave,$pgconn){
 		$query = "SELECT * FROM usuario WHERE usu_cedula='$usu_cedula'
				  AND usu_clave=md5('$usu_clave')";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function listar($pgconn)
    {
 		$query = "SELECT E.equi_desc as equipo, I.* , T.tequi_desc as tipo_equipo, U.usu_login as usuario, ES.esqui_desc as estatus, MO.mod_desc as modelo, M.mar_desc as marca FROM inventario I join equipo E on I.equi_cod=E.equi_cod  join tipo_equipo T on I.tequi_cod=T.tequi_cod join usuario U on I.usu_cod=U.usu_cod join estatus_equipo ES on ES.esqui_cod=I.esqui_cod join marca M on I.mar_cod=M.mar_cod join modelo MO on I.mod_cod=MO.mod_cod  ORDER BY inv_cod desc";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

	public function marca($pgconn)
    {
 		$query = "SELECT * FROM marca ORDER BY mar_desc ASC";
		$res = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($res)
		{
			return $res;
		}//if
	}//marca

	public function modelo($pgconn)
    {
 		$query = "SELECT * FROM modelo ORDER BY mod_desc ASC";
		$respuesta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($respuesta)
		{
			return $respuesta;
		}//if
	}//marca

	public function estatus_equipo($pgconn)
    {
 		$query = "SELECT * FROM estatus_equipo ORDER BY esqui_desc ASC ";
		$estatus_equipo = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($estatus_equipo)
		{
			return $estatus_equipo;
		}//if
	}//marca

	public function consulta_serial($inv_serial,$pgconn)
    {
 		$query = "SELECT I.esqui_cod as estatus, I.inv_cod as codigo, I.inv_bien as bien, I.inv_serial as serial,  M.mar_desc as marca, MO.mod_desc as modelo, E.equi_desc as equipo, T.tequi_desc as tipo_equipo  FROM inventario I join marca M on M.mar_cod=I.mar_cod join modelo MO on MO.mod_cod=I.mod_cod join equipo E on E.equi_cod=I.equi_cod join tipo_equipo T on T.tequi_cod=I.tequi_cod WHERE inv_serial='$inv_serial' ";
		$estatus_equipo = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($estatus_equipo)
		{
			return $estatus_equipo;
		}//if
	}//marca

	public function seleccionar_asignado($pgconn)
    {
 		$query = "SELECT I.inv_cod as codigo, I.inv_bien as bien, I.inv_serial as serial,  M.mar_desc as marca, MO.mod_desc as modelo, E.equi_desc as equipo, T.tequi_desc as tipo_equipo  FROM equipo_asignado_temporal I join marca M on M.mar_cod=I.mar_cod join modelo MO on MO.mod_cod=I.mod_cod join equipo E on E.equi_cod=I.equi_cod join tipo_equipo T on T.tequi_cod=I.tequi_cod WHERE inv_serial='$inv_serial' and esqui_cod='1' ";
		$estatus_equipo = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($estatus_equipo)
		{
			return $estatus_equipo;
		}//if
	}//marca
	 public function asignar_equipo($pgconn)
	{
		$query = "INSERT INTO equipo_asignado(asig_fecha, inv_cod,usu_cod,usu_login)
		SELECT asig_fecha, inv_cod,usu_cod,usu_login FROM equipo_asignado_temporal;
		";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());

		if($consulta){
			//$query2="UPDATE inventario SET esqui_cod=2 WHERE inv_cod='$inv_cod'";
			//$consulta2 = pg_query($pgconn,$query2) or die("Consulta errónea: ".pg_last_error());
return $consulta;
		}//if

    }//agregar_asignado
    public function eliminar_asignado_temporal($pgconn)
	{
		$query = "Delete FROM equipo_asignado_temporal";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		if($consulta){


			return $consulta;
		}
	}


    	 public function agregar_asignado_temporal( $inv_cod, $usu_cod, $usu_login,$pgconn)
	{
		$query = "INSERT INTO equipo_asignado_temporal ( inv_cod, usu_cod, usu_login)
				VALUES('$inv_cod','$usu_cod', '$usu_login')";


		$consulta = pg_query($pgconn,$query) ;

		if($consulta){
		//	$query2="UPDATE inventario SET esqui_cod=2 WHERE inv_cod='$inv_cod'";


			//$consulta2 = pg_query($pgconn,$query2) ;
			return $consulta;
		}//if

    }//agregar_asignado_temporal

     public function mostrar_asignado($pgconn)
    {
 		$query = "SELECT T.*,Mo.*,M.*,E.*,I.*, U.*, EAS.*,EAS.usu_login as asignado, D.dep_nombre from equipo_asignado_temporal EAS join usuario U on EAS.usu_cod=U.usu_cod join inventario I on EAS.inv_cod=I.inv_cod join departamento D on U.dep_cod= D.dep_cod join equipo E on I.equi_cod=E.equi_cod join marca M on I.mar_cod=M.mar_cod join modelo Mo on I.mod_cod=Mo.mod_cod join tipo_equipo T on I.tequi_cod=T.tequi_cod";
		$respuesta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		if ($respuesta)
		{
			return $respuesta;
		}//if
	}//sede

    public function sede($pgconn)
    {
 		$query = "SELECT * FROM sede ORDER BY sed_desc ASC";
		$respuesta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($respuesta)
		{
			return $respuesta;
		}//if
	}//sede


//-------------------------------------Solicitud de Equipos-------------------------------//


	 public function agregar_solicitud($usu_cod,$equi_cod, $tequi_cod, $pgconn)
	{
		$query = "INSERT INTO solicitud_equipo (usu_cod, equi_cod, tequi_cod)
				VALUES('$usu_cod', '$equi_cod', '$tequi_cod')";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }//end agregar_solicitud

     public function obtener_solicitud($pgconn)
    {
 		$query = "SELECT S.*,U.*, E.*, T.* from solicitud_equipo S JOIN usuario U ON S.usu_cod=U.usu_cod join equipo E on S.equi_cod=E.equi_cod join tipo_equipo T on S.tequi_cod=T.tequi_cod order by sol_cod desc LIMIT 1";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}//end obtener_solicitud

	public function buscar_solicitud($sol_cod, $pgconn)
    {
 		$query = "SELECT S.*,U.*, E.*, T.* from solicitud_equipo S JOIN usuario U ON S.usu_cod=U.usu_cod join equipo E on S.equi_cod=E.equi_cod join tipo_equipo T on S.tequi_cod=T.tequi_cod WHERE sol_cod='$sol_cod' ";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}//end buscar_solicitud

	public function listar_solicitud($pgconn)
    {
 		$query = "SELECT S.*,U.*, E.*, T.* from solicitud_equipo S JOIN usuario U ON S.usu_cod=U.usu_cod join equipo E on S.equi_cod=E.equi_cod join tipo_equipo T on S.tequi_cod=T.tequi_cod ORDER BY sol_fecha desc";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}//end listar_solicitud

	//-------------------------------------Inventario Telefonico-------------------------------//

public function operadora($pgconn)
    {
 		$query = "SELECT * FROM operadoras ORDER BY ope_nombre ASC";
		$respuesta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($respuesta)
		{
			return $respuesta;
		}//if
	}//operadora


public function tipo_linea($pgconn)
    {
 		$query = "SELECT * FROM tipo_linea ORDER BY  tip_lin_cod ASC";
		$respue = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($respue)
		{
			return $respue;
		}//if
	}//tipo_linea

public function tecnologia($pgconn)
    {
 		$query = "SELECT * FROM tecnologia ORDER BY  tec_nombre ASC";
		$respuesta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($respuesta)
		{
			return $respuesta;
		}//if
	}//tecnologia
public function codigo_celular($op,$pgconn)
    {
 		$query = "SELECT * FROM codigo_celular WHERE ope_cod=$op";
		$respuesta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($respuesta)
		{
			return $respuesta;
		}//if
	}//codigo_celular

	public function codigo_cantv($op,$pgconn)
    {
 		$query = "SELECT * FROM codigo_cantv WHERE est_cod=$op";
		$respuesta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($respuesta)
		{
			return $respuesta;
		}//if
	}//codigo_cantv
public function estatus_linea($pgconn)
    {
 		$query = "SELECT * FROM estatus_linea where est_lin_cod = 2 or est_lin_cod = 3 ORDER BY  est_lin_nombre ASC";
		$respuesta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($respuesta)
		{
			return $respuesta;
		}//if
	}//estatus_equipo

	//-----------------------------------------------------------------------------------------


}
?>
