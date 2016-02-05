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
<div class="col-md-4 col-md-offset-4">
<p class="lead">Cambio de contraseña</p>
</div>
<p></p>
<div class="col-md-4 col-md-offset-4">
 <form id="frmRestablecer" action="../../controlador/contrasenas/cambia_contrasena.php" method="post">
          <div class="panel panel-default">
            <input type="hidden" name="login" value= '<?php echo $_SESSION["usu_login"]; ?>'>
            <div class="panel-body">
              <p></p>
              <div class="form-group">
                <label for="contraseñaActual"> Escribe Tu Contraseña Actual</label>
                <input type="password" id="contraseñaActual" class="form-control" name="contrasena_actual" required pattern="[a-zA-Z0-9]{4,10}" title="Tu contraseña debe tener entre 4 y 10 caracteres entre letras, números y al menos un caracter especial">
              </div>
              <div class="form-group">
                <label for="nuevaContraseña"> Escribe Tu Nueva Contraseña </label>
                <input type="password" id="nuevaContraseña" class="form-control" name="nueva_contrasena" required pattern="[a-zA-Z0-9]{4,10}"  title="Tu contraseña debe tener entre 4 y 10 caracteres entre letras, números y al menos un caracter especial">
              </div>
              <div class="form-group">
                <label for="confiContraseña"> Confirma Tu Nueva Contraseña </label>
                <input type="password" id="confiContraseña" class="form-control" name="confi_contrasena" required pattern="[a-zA-Z0-9]{4,10}"  title="Tu contraseña debe tener entre 4 y 10 caracteres entre letras, números y al menos un caracter especial">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cambiar contraseña" >
              </div>
            </div>
          </div>
        </form>
        </div>
		<div id="mensaje">   </div>

	</div>
	</div>
	</div>

	    <!-- Footer -->
	<?php include("../../resourse/footer.php") ?>

	    <!-- End Footer -->

 </body>
</html>