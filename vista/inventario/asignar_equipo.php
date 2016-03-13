<html>
 <head>
 <meta charset="utf-8">
    <title>SICRE</title>

 </head>
        <!-- Homepage Slider -->
    <?php include("../../resourse/slideshow.php") ?>
        <!-- End Homepage Slider -->
 <body>
<?php
include("../../resourse/menu.php");
require_once('../../controlador/desplegable/con_departamento.php');
require_once('../../controlador/desplegable/con_sede.php');
require_once('../../controlador/desplegable/con_farmacia.php');
?>

<div class="container">
<p class="lead">Asignar Equipo</p>
<p >Busque el serial que desea asignar y complete los campos faltantes</p>
</div>

<div class="form-group">
<?php
require_once("../../controlador/inventario/con_consultar_serial.php");
?>
<form class="navbar-form navbar-right" role="search" method="POST" action="#">
        <div class="form-group">
          <input required pattern="[a-zA-z0-9]+" type="text" class="form-control" placeholder="Ingrese Número de Serial" name="serial">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
<br>
<br>
</div>


<div class="container">
<div class="row" >
<div class="col-md-12" >

<p class="lead"></p>
<br>
<!--inicio de la tabla-->



<form class="form-horizontal" id="registrar" action="#">
<div class="table-responsive">
<table class="table">
    <thead>
        <tr>

            <th>Serial</th>
            <th>Equipo</th>
            <th>Tipo de Equipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Bien Nacional</th>
        </tr>
    </thead>

<?php
    for($i=0;$i<pg_num_rows($consulta);$i++){
    # code...

 ?>
    <tbody>
        <tr >
            <td id="serial"> <?php echo $inv_serial;?></td>
            <td ><?php echo $equi_cod;?></td>
            <td ><?php echo $tequi_cod;?></td>
            <td ><?php echo $mar_cod;?></td>
            <td ><?php echo $mod_cod;?></td>
            <td ><?php echo $inv_bien;?></td>
            </tr>


             </tbody>
            <?php } ?>
</table><!--fin de la tabla-->
</div>
            <br>

<form class="navbar-form navbar-right" role="search" method="POST" action="#">
                   <!-- <div class="form-group">
                        <label for="cedula" class="control-label col-md-4">Farmacia:</label>
                        <div class="col-md-5">
                        <select class="form-control" name="farmacia" required >
                                <option  selected="selected" value="0">Selecione</option>
                                <?php for($i=0;$i<pg_num_rows($resp);$i++) { ?>
                                <option value="<?php echo $far_cod[$i]; ?>"><?php echo $far_nombre[$i]; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                    </div>
                       -->


                    <div class="form-group">
                        <label for="" class="control-label col-md-4">Cédula de Usuario a Asignar</label>
                        <div class="col-md-5">
                      	<input type="text" title="Su cedula debe contener entre 7 y  8 numeros sin espacios ni letras" pattern="[0-9]{7,8}" class="form-control" placeholder="Ingresa Cédula del Usuario" name="cedula" required autofocus maxlength="8">
                    </div>
                    </div>

                    <!-- PRUEBA MODAL PARA EL FORMULARIO DE REGISTRO SI LA CEDULA NO EXISTE -->

                        <div class="container">
                          <h2>Registro de Nuevo Usuario</h2>
                    <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Abrir</button>

                    <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                    <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Formulario de Registro</h4>
                        </div>
                        <div class="modal-body">
                          <p>Aqui va el formulario de registro.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </div>

                        </div>
                        </div>

                        </div>
                    <!-- FIN DE LA PRUEBA MODAL -->


             <input type="hidden" id="codigo" value="<?php echo $inv_cod;?>" name="codigo">
             <input type="hidden" value="<?php echo $_SESSION['usu_login']; ?>" name="usu_login">


<div class="col-md-2 col-md-offset-5">
    <button class="btn btn-lg btn-primary btn-block " type="submit">Nuevo equipo</button>
</div>

</form>


<div id="div_lista">


  <table class="table">
      <thead>
          <tr>

              <th>Serial</th>
              <th>Equipo</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Tipo de Equipo</th>
              <th>Responsable</th>

          </tr>
      </thead>


      <tbody id="lista">



               </tbody>

  </table><!--fin de la tabla-->
</div>
<form class="form-horizontal" id="form" action="../../controlador/inventario/con_carga_masiva.php" method="POST">
<div class="col-md-2 col-md-offset-5"><br>
    <button class="btn btn-lg btn-primary btn-block " id="submit" type="submit">Guardar</button>
</div>
</form>


    </div>
    </div>
    </div>
<div id="res"></div>
        <!-- Footer -->
    <?php include("../../resourse/footer.php") ?>
        <!-- End Footer -->

        <script type="text/javascript" src='../../js/asignar_equipo.js'></script>
 </body>
</html>
