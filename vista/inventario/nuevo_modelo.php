<html>
 <head>
 <meta charset="utf-8">
 	<title>SICRE</title>
 </head>
        <!-- Homepage Slider -->
	<?php include("../../resourse/slideshow.php"); 
	require_once("../../controlador/desplegable/con_marca.php");

	?>
        <!-- End Homepage Slider -->
 <body>
<?php include("../../resourse/menu.php") ?>

<div class="container">
<div class="row" >
<div class="col-md-11" >
<br>
<p class="lead">Agregar nuevo modelo</p>
<p>Ingrese el modelo que desea guardar en el inventario</p>
<br>
	<form class="form-horizontal" id="form" action="../../controlador/inventario/con_registrar_modelo.php" method="POST" >

			
						<div class="form-group">
 						<label for="cedula" class="control-label col-md-4">Marca:</label>
						<div class="col-md-6">
 						<select class="form-control" name="marca" required >
								<option  selected="selected" value="0">Selecione</option>
								<?php for($i=0;$i<pg_num_rows($res);$i++) { ?>
								<option value="<?php echo $mar_cod[$i]; ?>"><?php echo $mar_desc[$i]; ?></option>
								<?php } ?>
							</select>

 					</div>
					</div>


	
				<div class="form-group">
					<label for="cedula" class="control-label col-md-4">Modelo:</label>
						<div class="col-md-6">
							<input type="text" title="Solo se admiten letras" pattern="[a-zA-Z]+" class="form-control" placeholder="Ingresa la maca" name="modelo" required autofocus maxlength="20">
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