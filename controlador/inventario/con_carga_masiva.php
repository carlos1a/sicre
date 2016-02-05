<?php
	require ('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();

	require ('../../modelo/mod_inventario.php');
	$inventario = new inventario();
	$inserto=$inventario->asignar_equipo($pgconn);

				if($inserto){
					$consulta=$inventario->mostrar_asignado($pgconn);
					for ($i=0; $i <pg_num_rows($consulta) ; $i++) {
						# code...

					$row=pg_fetch_array($consulta,$i,PGSQL_ASSOC);

					$asig_responsable[$i]= 	$row["usu_nombre"].' '.$row["usu_apellido"];
					$asig_fecha[$i]=		$row["asig_fecha"];
					$departamento[$i]= 	$row["dep_nombre"];
					$telefono[$i]= 		$row["usu_telefono"];
					$usu_login[$i]= 		$row["asignado"];

					$equipo[$i]= 		$row["equi_desc"];
					$marca[$i]= 		$row["mar_desc"];
					$modelo[$i]= 		$row["mod_desc"];
					$tipo_equipo[$i]= 	$row["tequi_desc"];
					$serial[$i]= 		$row["inv_serial"];


					}
					$consulta2=$inventario->eliminar_asignado_temporal($pgconn);

						for ($i=0; $i <pg_num_rows($consulta) ; $i++) {
						# code...

					$get[$i]=array($asig_responsable[$i],$asig_fecha[$i],$usu_login[$i],$departamento[$i], $telefono[$i],$equipo[$i],  $marca[$i], $modelo[$i],$tipo_equipo[$i],$serial[$i]);

					}
					$var=serialize($get);
					header("location:../../vista/inventario/mostrar_asignado.php?get=".$var);
					echo 'ok';

				}



?>
