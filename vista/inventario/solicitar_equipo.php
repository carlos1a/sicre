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

<p class="lead"> Planilla para la Solicitud de Equipos</p>
<form class="form-horizontal" id="form" action="../../controlador/usuario/con_registrar_usuario.php" method="POST" >

				<div class="form-group">
					<label for="cedula" class="control-label col-md-4">Nombre del solicitante:</label>
						<div class="col-md-6">
							<input type="text" title="Solo se aceptan letras en este campo" pattern="[a-zA-Z´]+" class="form-control" placeholder="Nombre del Solicitante" name="nombre" required autofocus maxlength="8">
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Apellido del Solicitante:</label>
						<div class="col-md-6">
							<input type="text" title="El apellido No puede poseer espacios en blancos ni caracteres especiales" class="form-control" pattern="[a-zA-Z´]+" placeholder="Apellido del solicitante" name="apellido" required autofocus maxlength="15">
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Departamento Solicitante:</label>
						<div class="col-md-6">
							<input type="text" title="El departamento No puede poseer espacios en blancos ni caracteres especiales" class="form-control" pattern="[a-zA-Z´]+" placeholder="Departamento del Solicitante" name="departameno" required autofocus maxlength="15">
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Gerencia Solicitante:</label>
						<div class="col-md-6">
						<input type="text" title="La Gerencia No puede poseer espacios en blancos ni caracteres especiales" class="form-control" pattern="[a-zA-Z0-9]+" placeholder="Gerenia Solicitante" name="gerencia" required autofocus maxlength="15">
						</div>
				</div>


				<div class="form-group">
					<label for="" class="control-label col-md-4">Teléfono del Solicitante:</label>
						<div  class="col-md-6">
							<input type="text" title="Su telefono debe contener 11 numeros " class="form-control" pattern="[0-9]{10}" placeholder="Ingresa tu Telefono 4161234567" name="telefono" required autofocus maxlength="11">
						</div>
				</div>


				<div class="form-group">
					<label for="" class="control-label col-md-4">Correo del Solicitante:</label>
						<div class="col-md-6">
							<input type="email" class="form-control" placeholder="Ingresa tu Correo" name="correo" required autofocus>
						</div>
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

				<div class="col-md-2 col-md-offset-6">
					<button class="btn btn-lg btn-primary btn-block " type="submit">ENVIAR</button>
				</div>
	</form>

	</div>
	</div>
	</div>
<script type="text/javascript" src="../../js/equipo.js"></script>
	    <!-- Footer -->
	<?php include("../../resourse/footer.php") ?>
	    <!-- End Footer -->
 </body>
</html>