<!DOCTYPE html>
<head>
 	<title>SICRE</title>
 </head>
 <meta charset="utf-8">
        <!-- Homepage Slider -->
	<?php
	include_once("../../resourse/slideshow.php");
	require_once("../../controlador/desplegable/con_perfil.php");
	require_once('../../controlador/desplegable/con_departamento.php');
	require_once('../../controlador/desplegable/con_estatus.php');
	require_once('../../controlador/desplegable/con_sede.php');
	?>
        <!-- End Homepage Slider -->
 <body>
<?php
include_once("../../resourse/menu.php");
?>

<div class="container">
<div class="row" >
<div class="col-md-11" >
<br>
<p class="lead">Retorno de Equipos</p>
<p></p>
<br>

<?php echo"
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet'
	type='text/css' href='../../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'> swal({title:'Módulo en construcción',text:'Estamos Trabajando para Ti',
	type:'info',confirmButtonText:'Cerrar'},function(){window.location.href='../sistema/inicio.php'});
	</script>
</body>";
?>



	<form class="form-horizontal" id="form" action="../../controlador/usuario/con_registrar_usuario.php" method="POST" >

				<div class="form-group">
					<label for="cedula" class="control-label col-md-4">Cédula:</label>
						<div class="col-md-6">
							<input type="text" title="Su cedula debe contener entre 7 y  8 numeros sin espacios ni letras" pattern="[0-9]{7,8}" class="form-control" placeholder="Ingresa tu Cedula" name="cedula" required autofocus maxlength="8">
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Nombre:</label>
						<div class="col-md-6">
							<input type="text" title="Su nombre No puede poseer espacios en blancos ni caracteres especiales" class="form-control" pattern="[a-zA-Z´]+" placeholder="Ingresa tu Nombre" name="nombre" required autofocus maxlength="15">
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Apellido:</label>
						<div class="col-md-6">
							<input type="text" title="Su Apellido No puede poseer espacios en blancos ni caracteres especiales" class="form-control" pattern="[a-zA-Z´]+" placeholder="Ingresa tu Apellido" name="apellido" required autofocus maxlength="15">
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Login:</label>
						<div class="col-md-6">
						<input type="text" title="Su Apellido No puede poseer espacios en blancos ni caracteres especiales" class="form-control" pattern="[a-zA-Z0-9]+" placeholder="Ingresa tu nombre de Usuario" name="login" required autofocus maxlength="15">
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Clave:</label>
						<div class="col-md-6">
							<input type="password" title="Su clave debe contener letras, numeros y al menos un caracter especial (.!#$%&'*+/=?^_`{|}~-) y debe poseer entre 6 y 15 caracteres" class="form-control"  pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]{6,15}" placeholder="Ingresa tu Clave" name="clave" required autofocus maxlength="15">
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Confirma tu Clave:</label>
						<div class="col-md-6">
							<input type="password" title="Su clave debe contener letras, numeros y al menos un caracter especial y debe " class="form-control"  pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]{6,15}" placeholder="Confirma tu Clave" name="clave_confi" required autofocus maxlength="15">
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Teléfono:</label>
						<div  class="col-md-6">
							<input type="text" title="Su telefono debe contener 11 numeros " class="form-control" pattern="[0-9]{10}" placeholder="Ingresa tu Telefono 4161234567" name="telefono" required autofocus maxlength="11">
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Correo:</label>
						<div class="col-md-6">
							<input type="email" class="form-control" placeholder="Ingresa tu Correo" name="correo" required autofocus>
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Departamento:</label>
						<div class="col-md-6">
							<select class="form-control" name="departamento" required >
								<option  selected="selected" value="">Selecione</option>
								<?php for($i=0;$i<pg_num_rows($res);$i++){?>
								<option value="<?php echo $dep_cod[$i]; ?>"><?php echo $dep_nombre[$i]; ?></option>
								<?php } ?>
							</select>
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Perfil:</label>
						<div class="col-md-6">
							<select class="form-control" name="perfil" required >
								<option  selected="selected" value="">Selecione</option>
								<?php for($j=0;$j<pg_num_rows($consult);$j++) { ?>
								<option value="<?php echo '$per_cod[$j]'; ?>"><?php echo $per_nombre[$j]; ?></option>
								<?php } ?>
							</select>
						</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4">Estatus:</label>
						<div class="col-md-6">
							<select class="form-control" name="estatus" required >
								<option  selected="selected" value="">Selecione</option>
								<?php for($i=0;$i<pg_num_rows($estatus);$i++) { ?>
								<option value="<?php echo $estu_cod[$i]; ?>"><?php echo $estu_descripcion[$i]; ?></option>
								<?php } ?>
							</select>
						</div>
				</div>


				<div class="form-group">
					<label for="" class="control-label col-md-4">Sede:</label>
						<div class="col-md-6">
							<select class="form-control" name="sede" required >
								<option  selected="selected" value="">Selecione</option>
								<?php for($i=0;$i<pg_num_rows($respuesta);$i++) { ?>
								<option value="<?php echo $sed_cod[$i]; ?>"><?php echo $sed_desc[$i]; ?></option>
								<?php } ?>
							</select>
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