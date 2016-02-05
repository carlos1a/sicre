<html>
 <head>
 <meta charset="utf-8">
 	<title>SICRE</title>
 </head>
        <!-- Homepage Slider -->
	<?php include("../../resourse/slideshow.php") ?>
        <!-- End Homepage Slider -->
 <body>
<?php
include("../../resourse/menu.php");
require("../../controlador/inventario/con_solicitar_equipo.php");
include("../../js/equipo.js");

?>

<div class="container">
<div class="row" >
<div class="col-md-11" >

<p class="lead">Solicitar Equipos</p>
<p>Formulario para realizar la solicitud de equipos</p>
<p class="text-info" align="justify">
	Precione el Botón <i>Crear Solicitud</i> para completar el formulario, luego seleccione el equipo a solicitar y el tipo de equipo si así lo amerita. Al completar los campos, presione el Botón <i>Guardar</i> para que la solicitud sea enviada al departamento encargado.
	<br>
	Al finalizar el proceso se le otorgará un número de reporte que le servirá para poder solicitar el estatus de su solicitud.
</p>
<br>
<div class="container">
<div class="row" >
<div class="col-md-2 col-md-offset-5" >

	<form class="navbar-form navbar-right" role="search" method="POST">
  		<div class="form-group">
  		<input type="hidden" class="form-control" name="usu_login" value="<?php echo ($_SESSION['usu_login']);?>">
  		</div>
 		<button type="submit" class="btn btn-default" >Crear Solicitud</button>
	</form>
</div>
</div>
</div>

<br>
	<form class="form-horizontal" role="form">
		<div class="form-group">
 			<label for="" class="control-label col-md-4" >Usuario:</label>
 			<div class="col-md-6">
 			<input readonly type="text" class="form-control"  value="<?php echo $usu_login;?>">
 		</div>
 		</div>

 		<div class="form-group">
 			<label for="" class="control-label col-md-4" >Nombre:</label>
 			<div class="col-md-6">
 			<input readonly type="text" class="form-control"  value="<?php echo $usu_nombre;?>">
 		</div>
 		</div>

 			<div class="form-group">
 			<label for="" class="control-label col-md-4" >Apellido:</label>
 			<div class="col-md-6">
 			<input readonly type="text" class="form-control"  value="<?php echo $usu_apellido;?>">
 		</div>
 		</div>

 			<div class="form-group">
 			<label for="" class="control-label col-md-4" >Teléfono:</label>
 			<div class="col-md-6">
 			<input readonly type="text" class="form-control"  value="<?php echo $usu_telefono;?>">
 		</div>
 		</div>

 			<div class="form-group">
 			<label for="" class="control-label col-md-4" >Departamento:</label>
 			<div class="col-md-6">
 			<input readonly type="text" class="form-control"  value="<?php echo $dep_cod;?>">
 		</div>
 		</div>
 		</form>

 		<form class="form-horizontal" role="form"  action="../../controlador/inventario/con_registrar_solicitud.php" method="POST">
 			<div class="form-group">
  		<input type="hidden" class="form-control" name="usu_cod" value="<?php echo $usu_cod;?>">
  		</div>

		<div class="form-group">
 			<label for="" class="control-label col-md-4" >Equipo:</label>
 			<div class="col-md-6">
 			<select class="form-control"  id="in_niv1" name="equipo"  required ></select>
 		</div>
 		</div>

 		<div class="form-group" id="tipo_equipo" >
			<div  id="dep">
 			<label for="" class="control-label col-md-4">Tipo de Equipo:</label>
 			<div class="col-md-6" >
 			<select class="form-control"  id="in_niv2" name="tipo_equipo" required ></select>
			</div>
 		</div>
 		</div>

		<div class="col-md-2 col-md-offset-6" >
 			<button type="submit" class="btn btn-default">Guardar</button>
 		</div>
    </form>
</div>
</div>
</div>

	    <!-- Footer -->
	<?php include("../../resourse/footer.php") ?>
	    <!-- End Footer -->
 </body>
</html>