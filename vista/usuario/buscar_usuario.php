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
<p class="lead">Buscar Usuarios por Cédula</p>
</div>

<div class="form-group">
<?php
require("../../controlador/usuario/con_usuario.php");
?>
<form class="navbar-form navbar-right" role="search" method="POST">
        <div class="form-group">
          <input type="text" title="Solo se aceptan números" class="form-control" pattern="[0-9]{7,8}" placeholder="Ingrese cédula" name="cedula" required autofocus maxlength="8">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
<br>
<br>
</div>


<div class="container">
<div class="row" >
<div class="col-md-11" >

<p class="lead"></p>
<br>
<!--inicio de la tabla-->
<div class="panel panel-default">
<table class="table">
    <thead>
        <tr>

            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cédula</th>
            <th>Teléfono</th>
            <th>Departamento</th>
            <th>Perfil</th>
            <th>Modificar</th>
        </tr>
    </thead>

<?php
	for($i=0;$i<pg_num_rows($consulta);$i++){
	# code...

 ?>
    <tbody>
        <tr>
            <td> <?php echo $usu_nombre ; ?></td>
            <td><?php echo $usu_apellido; ?></td>
            <td><?php echo $usu_cedula; ?></td>
            <td><?php echo $usu_telefono; ?></td>
            <td><?php echo $dep_cod; ?></td>
            <td><?php echo $per_cod; ?></td>
              <td> <a href="modificar_usuario.php?param_id=<?php echo base64_encode($usu_cedula);?>">
                <button type="button" class="btn btn-default" aria-label="Left Align">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button></a></td>
        </tr>
    </tbody>

<?php } ?>
</table><!--fin de la tabla-->
</div>

	</div>
	</div>
	</div>

	    <!-- Footer -->
	<?php include("../../resourse/footer.php") ?>
	    <!-- End Footer -->
 </body>
</html>