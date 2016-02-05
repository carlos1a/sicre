<?php
include("../../controlador/farmacia/lista_estado.php");
include("../../controlador/desplegable/con_tipo_linea.php");

?>
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
<div class="col-md-12" >

<p class="lead"> Agregar Farmacia</p>
<p>Ingrese los datos de la Farmacia que desea registrar en el Sistema Central. Todos los campos son obligatorios para que su registro sea éxitoso</p><br>
<form class="form-horizontal" id="form"  method="POST" >

					<div class="form-group" id="" >
					<div id="">
 						<label for="" class="control-label col-md-4">Estado</label>
 					<div class="col-md-6" >
 						<select class="form-control"  id="estado" name="estado" required  >
 						<option value="">Seleccione</option>
							<?php for($i=0;$i<pg_num_rows($consulta);$i++) { ?>
						<option value="<?php echo $est_cod[$i]; ?>"><?php echo $est_nombre[$i]; ?></option>
							<?php } ?>
 						</select>
					</div>
 					</div>
 					</div>

				<div class="form-group">
					<label for="cedula" class="control-label col-md-4">Nombre de la Farmacia </label>
				<div class="col-md-6">
					<input type="text" title="Solo se aceptan letras en este campo" pattern="[a-zA-Z´]+" class="form-control" placeholder="Nombre de la Farmacia" name="nombre" required autofocus maxlength="8">
				</div>
				</div>

				<div class="form-group">
 					<label for="" class="control-label col-md-4">Dirección de la Farmacia:</label>
				<div class="col-md-6">
 					<textarea title="" class="form-control" pattern="[az-AZ0-9]+" placeholder="Ciudad, Av, Calle, Local" name="direccion" required autofocus maxlength="15"></textarea>
 				</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-4">Selecione Tipo de Línea:</label>
						<div class="col-md-6">
							<select class="form-control" id="linea" name="tipo_linea" required >
								<option  selected="selected" value="">Selecione</option>
								<option  value="1">Celular</option>
								<option  value="2">Cantv</option>

							</select>
						</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-4">Cantidad de Líneas </label>
						<div class="col-md-6">
							<select class="form-control" id="numeros" name="lin" required >
								<option  selected="selected" value="">Selecione</option>
								<option  value="0">0</option>
								<option  value="1">1</option>
								<option  value="2">2</option>
								<option  value="3">3</option>
								<option  value="4">4</option>
								<option  value="5">5</option>

							</select>
						</div>
				</div>

				
		<div class="jumbotron numeros" >
		<div class=" dat_numeros" >
				

				<div class="form-group tipo_linea" id="" >
					<div id="">
 						<label for="" class="control-label col-md-4" >Número de Teléfono</label>
 					<div class="col-md-6" >
 						<select class="form-control telefono"  id="telefono" name="numero" required>
 						<option value="">Seleccione</option>
							
 						</select>
					</div>
 					</div>
 					</div>

				
 		</div>			
		</div>
				<div class="form-group">
					<label for="" class="control-label col-md-4">Regente</label>
				<div class="col-md-6">
					<input type="text" title="" class="form-control" pattern="[a-zA-Z ]+" placeholder="Nombre y Apellido del Encargado" name="responsable" required autofocus maxlength="15">
				</div>
				</div>

				<div class="col-md-2 col-md-offset-6">
					<button class="btn btn-lg btn-primary btn-block " type="submit">ENVIAR</button>
				</div>

	</form>
<div id="res"></div>
	</div>
	</div>
	</div>

	    <!-- Footer -->
	<?php include("../../resourse/footer.php") ?>
	<script type="text/javascript" src="../../js/farmacia.js"></script>
	    <!-- End Footer -->
 </body>
</html>