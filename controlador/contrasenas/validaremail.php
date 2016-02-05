<?php

	function generarLinkTemporal($usu_cod, $usu_login){
require_once ('../../modelo/mod_connex.php');
		$conexion = new Connex();

require_once ('../../modelo/mod_usuario.php');
	$usuario = new usuario();
		$pgconn=$conexion->conectar();
		$cadena = $usu_cod.$usu_login.rand(1,9999999).date('Y-m-d');
		$token = sha1($cadena);

		$inserto=$usuario->restablecer_contrasena($usu_cod,$usu_login,$token,$pgconn);

		if($inserto){
			$enlace = $_SERVER["SERVER_NAME"].'/pass/restablecer.php?idusuario='.sha1($usu_cod).'&token='.$token;
			return $enlace;
		}
		else
			return FALSE;
	}

	function enviarEmail( $email, $link ){

		$mensaje = '<html>
		<head>
 			<title>Restablece tu contraseña</title>
		</head>
		<body>
 			<p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
 			<p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
 			<p>
 				<strong>Enlace para restablecer tu contraseña</strong><br>
 				<a href="'.$link.'"> Restablecer contraseña </a>
 			</p>
		</body>
		</html>';

		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$cabeceras .= 'From: Codedrinks <mimail@codedrinks.com>' . "\r\n";

		mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
	}
require ('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();
require ('../../modelo/mod_usuario.php');
	$usuario = new usuario();
	$email = strtoupper($_POST['email']);
	$respuesta = new stdClass();

	if( $email != "" ){
   		$consulta=$usuario->obtener_correo($email,$conexion);

   		if(pg_num_rows($consulta)>0){
   			$usuario = pg_fetch_array($consulta,0,PGSQL_ASSOC);
			$linkTemporal = generarLinkTemporal( $usuario['usu_cod'], $usuario['usu_login'] );
      		if($linkTemporal){
        		enviarEmail( $email, $linkTemporal );
        		$respuesta->mensaje = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>';
      		}
   		}
   		else
   			$respuesta->mensaje = '<div class="alert alert-warning"> No existe una cuenta asociada a ese correo. </div>';
	}
	else
   		$respuesta->mensaje= "Debes introducir el email de la cuenta";
 	echo json_encode( $respuesta );