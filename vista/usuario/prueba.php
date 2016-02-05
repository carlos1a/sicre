<?php
require("../../controlador/con_desplegable.php");
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

<header align="center"><h2>Sus datos se han guardado exitosamente en el Sistema Central de Reportes <br> SICRE</h2> </header>


<div class="container">
<div class="row" >
<div class="col-md-12" >

<p class="lead"  align="center">Verifíquelos y sigas las instrucciones para iniciar sesión</p>
				<div class="form-group">
				<select class="form-control" name="cargo" required >
				<option  selected="selected" value="0">Selecione</option>
				<?php
				for($i=0;$i<pg_num_rows($consulta);$i++){
				 ?>
				<option value="<?php echo $per_cod[$i]; ?>"><?php echo $per_nombre[$i]; ?></option>
				<?php }  ?>

				</select></div>
	</div>
	</div>

	<br>

	<p class="text-info" align="center">Si sus datos son correctos precione <a href="../sistema/salir.php">SALIR</a> para que puedas iniciar sesion e ingresar al Sistema Central de Reportes</p>
	<p class="text-info" align="center">De lo contrario, por favor, comuniquese con el Departamento de Tecnologia, a traves de <a href="">CONTACTO</a></p>

	</div>

	    <!-- Footer -->
	<?php include("../../resourse/footer.php") ?>
	    <!-- End Footer -->
 </body>
</html>