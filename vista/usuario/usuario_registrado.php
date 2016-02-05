<?php
require("../../controlador/usuario/con_usuario_registrado.php");
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
				<p class="text-primary" align="center">Nombre: <?php echo $usu_nombre; ?></p>
				</div>

				<div class="form-group">
					<p class="text-primary" align="center">Apellido: <?php echo $usu_apellido; ?></p>
				</div>

				<div class="form-group">
					<p class="text-primary" align="center">Usuario: <?php echo $usu_login; ?></p>
				</div>

				<div class="form-group">
					<p class="text-primary" align="center">Cédula: <?php echo $usu_cedula; ?></p>
				</div>

				<div class="form-group">
					<p class="text-primary" align="center">Teléfono: <?php echo $usu_telefono; ?></p>
				</div>

				<div class="form-group">
					<p class="text-primary" align="center">Departamento: <?php echo $dep_cod; ?></p>
				</div>

				<div class="form-group">
					<p class="text-primary" align="center">Perfil: <?php echo $per_cod; ?></p>
				</div>

				<div class="form-group">
					<p class="text-primary" align="center">Perfil: <?php echo $estu_cod; ?></p>
				</div>

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