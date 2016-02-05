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
<p class="lead">Consulta de Solicitud</p>

<p class="text-info"><i>Ingrese en el buscador el número del ticket asignado para consultar el estatus de su solicitud.</i></p>
</div>

<div class="form-group">
<div class="col-md-10" >
<?php
require("../../controlador/inventario/con_consultar_solicitud.php");
?>
<form class="navbar-form navbar-right" role="search" method="POST">
    <div class="form-group">
        <input type="text" title="Solo se aceptan números" class="form-control" pattern="[0-9]+" placeholder="Ingrese Número de Ticket" name="ticket" required autofocus maxlength="8">
    </div>
    <button type="submit" class="btn btn-default">Buscar</button>
</form>
<br>
<br>
</div>
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

            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cédula</th>
            <th>Teléfono</th>
            <th>Equipo</th>
            <th>Tipo de Equipo</th>
            <th>Fecha de Solicitud</th>
            <th>Observación</th>
        </tr>
    </thead>

<?php
    for($i=0;$i<pg_num_rows($consulta);$i++){
    # code...

 ?>
    <tbody>
        <tr>
            <td><?php echo $usu_login ; ?></td>
            <td><?php echo $usu_nombre ; ?></td>
            <td><?php echo $usu_apellido; ?></td>
            <td><?php echo $usu_cedula; ?></td>
            <td><?php echo $usu_telefono; ?></td>
            <td><?php echo $equi_desc; ?></td>
            <td><?php echo $tequi_desc; ?></td>
            <td><?php echo $sol_fecha; ?></td>
            <td><?php echo $tequi_desc; ?></td>

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