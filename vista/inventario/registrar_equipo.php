<html>
 <head>
 <meta charset="utf-8">
 	<title>SICRE</title>
 </head>
        <!-- Homepage Slider -->
	<?php include("../../resourse/slideshow.php");
		require_once("../../controlador/desplegable/con_marca.php");
		require_once("../../controlador/desplegable/con_estatus_equipo.php");
		require_once("../../controlador/desplegable/con_modelo.php");


	?>
        <!-- End Homepage Slider -->
 <body>

		<!-- Starts Menu  -->
	<?php include("../../resourse/menu.php") ?>
		<!-- End menu -->

<header>

		 <!-- Starts function js.equipo, menu controls the type of equipment and equipment -->
	<?php include("../../js/equipo.js") ?>
		 <!-- End js.equipo -->

</header>

<div class="container">
<div class="row" >
<div class="col-md-11" >
<br>
<p class="lead">Registrar equipos en el Inventario</p>
<br>

	<form class="form-horizontal" role="form"  action="../../controlador/inventario/con_inventario.php" method="POST" >


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

 					<div class="form-group">
 						<label for="" class="control-label col-md-4">Serial:</label>
 						<div class="col-md-6">

 						<input type="text" title="" class="form-control" pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+" placeholder="Serial" name="serial" required autofocus maxlength="15">

 					</div>
					</div>

 					<div class="form-group">
 						<label for="cedula" class="control-label col-md-4">Marca:</label>
						<div class="col-md-6">
 						<select class="form-control" name="marca" required >
								<option  selected="selected" value="">Selecione</option>
								<?php for($i=0;$i<pg_num_rows($res);$i++) { ?>
								<option value="<?php echo $mar_cod[$i]; ?>"><?php echo $mar_desc[$i]; ?></option>
								<?php } ?>
							</select>

 					</div>
					</div>

 					<div class="form-group" >
 						<label for="" class="control-label col-md-4">Modelo:</label>
						<div class="col-md-6" id="mod">
 						<select class="form-control" name="modelo" required >
								<option  selected="selected" value="">Selecione</option>
								<?php for($i=0;$i<pg_num_rows($query);$i++) { ?>
								<option value="<?php echo $mod_cod[$i]; ?>"><?php echo $mod_desc[$i]; ?></option>
								<?php } ?>
							</select>

 					</div>
					</div>


 					<div class="form-group">
 						<label for="" class="control-label col-md-4">Precio:</label>
						<div class="col-md-6">
 						<input type="text" title="" class="form-control"  pattern="[0-9.,]+" placeholder="00.00 Bsf" name="precio" required autofocus maxlength="15">

 					</div>
 					</div>

 					<div class="form-group">
 						<label for="" class="control-label col-md-4">Bien Nacional:</label>
						<div class="col-md-6">
 						<input type="text" title="" class="form-control" pattern="[0-9]+" placeholder="Serial Bien Nacional" name="bien" required autofocus maxlength="15">

 					</div>
					</div>

					<div class="form-group">
 						<label for="" class="control-label col-md-4">Observación:</label>
						<div class="col-md-6">
 						<textarea title="" class="form-control" pattern="[az-AZ0-9]+" placeholder="descripción" name="descripcion" required autofocus maxlength="15"></textarea>

 					</div>
					</div>

					<div class="form-group">
					<label for="" class="control-label col-md-4">Estatus:</label>
						<div class="col-md-6">
							<select class="form-control" name="estatus" required >
								<option  selected="selected" value="">Selecione</option>
								<option value="<?php echo $esqui_cod[2]; ?>"><?php echo $esqui_desc[2]; ?></option>

							</select>
						</div>
				</div>



 					<div class="form-group" hidden>

 					<label for="" class="control-label col-md-4">Registrado por:</label>
 					<div class="col-md-6">
 						<input type="text" title="" class="form-control" pattern="[a-zA-Z]+" placeholder="Usuario" name="usu_cod" required autofocus maxlength="10" readonly="true" value="<?php echo $_SESSION['usu_cod']; ?>">
 					</div>
 					</div>



 				</div>
 				<div class="col-md-2 col-md-offset-5">
 					<button class="btn btn-lg btn-primary btn-block " type="submit">Guardar</button>
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