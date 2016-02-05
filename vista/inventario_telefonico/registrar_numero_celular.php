<html>
 <head>
 <meta charset="utf-8">
 	<title>SICRE</title>
 </head>
        <!-- Homepage Slider -->
	<?php include("../../resourse/slideshow.php");
		//require_once("../../controlador/desplegable/con_marca.php");



	?>
        <!-- End Homepage Slider -->
 <body>

		<!-- Starts Menu  -->
	<?php include("../../resourse/menu.php");
	require_once("../../controlador/desplegable/con_operadora.php");
	require_once("../../controlador/desplegable/con_tipo_linea.php");
	require_once("../../controlador/desplegable/con_tecnologia.php");
require_once("../../controlador/desplegable/con_estatus_linea.php");
	?>
		<!-- End menu  h -->

<header>

</header>

<div class="container">
<div class="row" >
<div class="col-md-11" >
<br>
<p class="lead">Registrar Numero Telefónico Celular</p>
<br>

	<form class="form-horizontal" role="form"  action="../../controlador/inventario_telefono/con_registrar_telefono.php" method="POST" >


 					<div class="form-group">
 						<label for="" class="control-label col-md-4" >Operadora</label>
 						<div class="col-md-6">
 						<select class="form-control"  id="operadora" name="operadora"  required >
 							<option  selected="selected" value="">Selecione</option>
								<?php for($i=0;$i<pg_num_rows($respuesta);$i++) { ?>
								<option value="<?php echo $ope_cod[$i]; ?>"><?php echo $ope_nombre[$i]; ?></option>
								<?php } ?></select>
 					</div>
 					</div>
 					<div class="form-group">
 						<label for="" class="control-label col-md-4" >Tipo de Línea</label>
 						<div class="col-md-6">
 						<select class="form-control"  id="in_niv1" name="tipo_linea"  required >
 							<option  selected="selected" value="">Selecione</option>
								<?php for($i=0;$i<pg_num_rows($respue);$i++) { ?>
								<option value="<?php echo $tip_lin_cod[$i]; ?>"><?php echo $tip_lin_nombre[$i]; ?></option>
								<?php } ?>
 						</select>
 					</div>
 					</div>
					<div class="form-group">
 						<label for="" class="control-label col-md-4" >Tecnología</label>
 						<div class="col-md-6">
 						<select class="form-control"  id="in_niv1" name="tecnologia"  required ><option  selected="selected" value="">Selecione</option>
								<?php for($i=0;$i<pg_num_rows($res1);$i++) { ?>
								<option value="<?php echo $tec_cod[$i]; ?>"><?php echo $tec_nombre[$i]; ?></option>
								<?php } ?></select>
 					</div>
 					</div>

 					<div class="form-group">
 						<label for="" class="control-label col-md-4" >Número</label>
 						<div class="col-md-2">
 						<select class=" form-control"  id="celular" name="codigo_celular"  required >
 							<option id="celular" value="" required>Seleccione</option>

 						</select>
 						</div>
 						<div class="col-md-4 ">

 						<input name="tel_cel_numero" type="text" pattern"" maxlength="7" class=" form-control" required>
 					</div>
 					</div>
					<div class="form-group">
 						<label for="" class="control-label col-md-4" >Estatus</label>
 						<div class="col-md-6">
 						<select class="form-control"  id="in_niv1" name="estatus"  required >
 							<option  selected="selected" value="">Selecione</option>
								<?php for($i=0;$i<pg_num_rows($res2);$i++) { ?>
								<option value="<?php echo $est_lin_cod[$i]; ?>"><?php echo $est_lin_nombre[$i]; ?></option>
								<?php } ?>
 						</select>
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
	    <script type="text/javascript" src="../../js/operadora.js"></script>
 </body>
</html>