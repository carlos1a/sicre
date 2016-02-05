<?php
require("../../controlador/usuario/con_usuario2.php");
require_once("../../controlador/desplegable/con_perfil.php");
require_once('../../controlador/desplegable/con_departamento.php');
require_once('../../controlador/desplegable/con_estatus.php');
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

<p class="lead">Modificar Usuario</p>
<p>Sobrescriba los campos que desea modificar</p>



<form class="form-horizontal" role="search" method="POST" action="../../controlador/usuario/con_modificar_usuario.php">

<br>
<p class="lead"  align="center"></p>
<br>
<!--inicio de la tabla-->


 <input type="hidden" name="cedula" value="<?php echo $usu_cedula; ?>">

      <div class="form-group">
      <label for="cedula" class="control-label col-md-4">Nombre:</label>
      <div  class="col-md-6">
      <input type="text" class="form-control"  name="nombre" value="<?php echo $usu_nombre ; ?>">
      </div>
      </div>

       <div class="form-group">
       <label for="cedula" class="control-label col-md-4">Apellido:</label>
       <div  class="col-md-6">
       <input type="text" class="form-control"  name="apellido" value="<?php echo $usu_apellido; ?>">
       </div>
       </div>

        <div class="form-group">
        <label for="cedula" class="control-label col-md-4">Teléfono:</label>
        <div  class="col-md-6">
        <input type="text" class="form-control"  name="telefono" value="<?php echo $usu_telefono; ?>">
        </div>
        </div>

         <div class="form-group">
        <label for="cedula" class="control-label col-md-4"> Departamento:</label>
        <div  class="col-md-6">
        <select class="form-control" name="departamento" required >
                <option  selected="selected" value="0">Selecione</option>
                <?php for($i=0;$i<pg_num_rows($res);$i++){?>
                <option value="<?php echo $dep_cod[$i]; ?>"><?php echo $dep_nombre[$i]; ?></option>
                <?php } ?>
              </select>
        </div>
        </div>

        <div class="form-group">
        <label for="cedula" class="control-label col-md-4"> Perfil: </label>
        <div  class="col-md-6">
       <select class="form-control" name="perfil" required >
                <option  selected="selected" value="0">Selecione</option>
                <?php for($i=0;$i<pg_num_rows($consulta);$i++) { ?>
                <option value="<?php echo $per_cod[$i]; ?>"><?php echo $per_nombre[$i]; ?></option>
                <?php } ?>
              </select>
        </div>
        </div>

        <div class="form-group">
        <label for="cedula" class="control-label col-md-4"> Estatus: </label>
        <div  class="col-md-6">
       <select class="form-control" name="estatus" required >
                <option  selected="selected" value="0">Selecione</option>
                <?php for($i=0;$i<pg_num_rows($estatus);$i++) { ?>
                <option value="<?php echo $estu_cod[$i]; ?>"><?php echo $estu_descripcion[$i]; ?></option>
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