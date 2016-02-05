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

<div class="container">
<div class="row" >
<div class="col-md-11" >
<br>
<p class="lead">Agregar nueva marca</p>
<p>Ingrese la marca que desea guardar en el inventario</p>
<br>
	<form class="form-horizontal" id="form" action="../../controlador/inventario/con_registrar_marca.php" method="POST" >

				<div class="form-group">
					<label for="cedula" class="control-label col-md-4">Marca:</label>
						<div class="col-md-6">
							<input type="text" title="Solo se admiten letras" pattern="[a-zA-Z]+" class="form-control" placeholder="Ingresa la maca" name="marca" required autofocus maxlength="20">
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