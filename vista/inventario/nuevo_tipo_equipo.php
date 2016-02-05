<html>
 <head>
 <meta charset="utf-8">
 	<title>SICRE</title>
 </head>
        <!-- Homepage Slider -->
	<?php include("../../resourse/slideshow.php") ?>
        <!-- End Homepage Slider -->
 <body>
<?php include("../../resourse/menu.php") ?>
<?php include("../../js/equipo.js") ?>
<div class="container">
<div class="row" >
<div class="col-md-11" >
<br>
<p class="lead">Agregar nuevo equipo a la lista de inventario</p>
<p>Ingrese el equipo que desea guardar en el inventario</p>
<br>
	<form class="form-horizontal" id="form" action="../../controlador/inventario/con_registrar_tipo_equipo.php" method="POST" >

				<div class="form-group">
 						<label for="" class="control-label col-md-4" >Equipo:</label>
 						<div class="col-md-6">
 						<select class="form-control"  id="in_niv1" name="equipo"  required ></select>
 					</div>
 					</div>

				<div class="form-group">
					<label for="cedula" class="control-label col-md-4">Tipo de Equipo:</label>
						<div class="col-md-6">
							<input type="text" title="Solo se admiten letras" pattern="[a-zA-Z]+" class="form-control" placeholder="Ingresa el tipo de equipo" name="tipo_equipo" required autofocus maxlength="20">
						</div>
				</div>

				<div class="col-md-2 col-md-offset-6">
					<button class="btn btn-lg btn-primary btn-block " type="submit">ENVIAR</button>
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