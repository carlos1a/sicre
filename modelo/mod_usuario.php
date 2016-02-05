<?php
class usuario
{
	private 	$usu_cedula;
	private 	$usu_nombre;
   	private 	$usu_apellido;
   	private 	$usu_login;
    private 	$usu_clave;
    private 	$usu_telefono;
    private 	$usu_correo;
    private 	$dep_cod;
    private 	$dep_nombre;
    private 	$per_cod;
    private 	$per_nombre;
    private 	$estu_cod;
    private 	$pgconn;


public function mostrar($pgconn){
		$query= "SELECT usu_cedula, usu_nombre, usu_apellido, usu_login, usu_telefono, dep_cod, per_cod FROM usuario ORDER BY usu_cedula desc LIMIT 1";
		$consulta= pg_query($pgconn, $query) or die ("Consulta Errónea: ".pg_last_error());
		if($consulta){
			return ($consulta);
			}// if mostrar
		}//class mostrar

    public function agregar($usu_cedula, $usu_nombre, $usu_apellido, $usu_login, $usu_clave, $usu_telefono,$usu_correo,$dep_cod, $per_cod, $estu_cod,$sed_cod ,$pgconn)
	{
		$query = "INSERT INTO usuario (usu_cedula, usu_nombre,usu_apellido, usu_login, usu_clave, usu_telefono,usu_correo,dep_cod, per_cod, estu_cod,sed_cod)
				VALUES('$usu_cedula','$usu_nombre','$usu_apellido','$usu_login','$usu_clave','$usu_telefono','$usu_correo','$dep_cod','$per_cod','$estu_cod' ,'$estu_cod')";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }


    public function modificar($usu_nombre,$usu_apellido, $usu_cedula,$usu_telefono,$dep_cod, $per_cod, $estu_cod, $pgconn)
	{
		$query = "UPDATE usuario SET usu_nombre='$usu_nombre',usu_apellido='$usu_apellido', usu_telefono='$usu_telefono', dep_cod='$dep_cod', per_cod='$per_cod', estu_cod='$estu_cod'
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
    public function eliminar($cod_cuestionario,$cod_aspecto,$pgconn)
	{
		$query = "DELETE FROM empleado WHERE emp_cod='$emp_cod'";
		$eliminar = pg_query($query);
		if($eliminar)
			return "ok";
    }

    public function consultar($pgconn)
    {
 		$query = "SELECT * FROM empleado";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function obtener($pgconn)
    {
 		$query = "SELECT U.*,D.*, P.*, E.* from usuario U JOIN departamento D ON U.dep_cod=D.dep_cod JOIN perfil P on U.per_cod=P.per_cod JOIN estatus_usuario E on U.estu_cod=E.estu_cod order by usu_cod desc LIMIT 1 ";
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

 public function obtener_cod($usu_login,$pgconn)
    {
 		$query = "SELECT U.*,D.*, P.* from usuario U JOIN departamento D ON U.dep_cod=D.dep_cod join perfil P on U.per_cod=P.per_cod WHERE usu_login='$usu_login'";
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

    public function obtenerPorCreacion($emp_creacion,$pgconn)
    {
 		$query = "select emp_cod from empleado WHERE emp_creacion='$emp_creacion'";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}



	public function autenticar($usu_login,$pgconn){
 		$query = "SELECT * from usuario WHERE usu_login='$usu_login'
				   AND estu_cod='1'";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function listar($pgconn)
    {
 		$query = "SELECT E.estu_descripcion as estatus, U.* , D.dep_nombre as dep FROM usuario U join departamento D on U.dep_cod=D.dep_cod  JOIN estatus_usuario E on U.estu_cod=E.estu_cod  ORDER BY usu_cedula ASC";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

	public function perfil($pgconn){
		$query= "SELECT * FROM perfil ORDER BY per_nombre ASC";
		$consult= pg_query($pgconn, $query) or die ("Consulta Errónea: ".pg_last_error());
		if($consult){
			return ($consult);
			}// if mostrar
		}//class mostrar

			public function departamento($pgconn){
		$query= "SELECT * FROM departamento ORDER BY dep_nombre ASC";
		$res= pg_query($pgconn, $query) or die ("Consulta Errónea: ".pg_last_error());
		if($res){
			return ($res);
			}// if
		}//class departamento

		public function estatus($pgconn){
		$query= "SELECT * FROM estatus_usuario ORDER BY estu_descripcion ASC";
		$estatus= pg_query($pgconn, $query) or die ("Consulta Errónea: ".pg_last_error());
		if($estatus){
			return ($estatus);
			}// if
		}//class estatus_usuario

    public function restablecer_contrasena($usu_cod,$usu_login,$token,$pgconn)
    {
 		$query = "INSERT INTO clave (usu_cod, usu_login, token) VALUES($usu_cod,'$usu_login','$token');";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}
 public function obtener_correo($usu_correo,$pgconn)
    {
 		$query = " SELECT * FROM usuario WHERE usu_correo = '$usu_correo' ";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}
	  public function cambia_clave($usu_clave,$usu_login,$pgconn)
	{
		$query = "UPDATE usuario SET usu_clave='$usu_clave'
				 WHERE usu_login='$usu_login'";
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
}


?>