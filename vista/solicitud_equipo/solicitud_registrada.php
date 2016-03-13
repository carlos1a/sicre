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
<?php
require("../../controlador/inventario/con_solicitud_registrada.php");
?>

<header align="center"><h2>La solicitud de su Equipo se ha realizado exitosamente.<br> Su caso sera atendido a la brevedad posible.</h2> </header>


<div class="container">
<div class="row" >
<div class="col-md-12" >

<p class="lead"  align="center">Datos registrados</p>


	</div>
	</div>
	</div>

<div class="container">
<div class="row" >
<div class="col-md-8" >
	<div class="table-responsive">
<table id="tables" class="table table-bordered" >

        <tr>
            <th>Usuario:</th>
            <td><?php echo $usu_login; ?></td>
        </tr>
        <tr>
            <th>Nombre:</th>
            <td><?php echo $usu_nombre; ?></td>
        </tr>
        <tr>
            <th>Apellido:</th>
            <td><?php echo $usu_apellido; ?></td>
        </tr>
        <tr>
            <th>Cédula:</th>
            <td><?php echo $usu_cedula; ?></td>
        </tr>
         <tr>
            <th>Teléfono:</th>
            <td><?php echo $usu_telefono; ?></td>
        </tr>
        <tr>
            <th>Equipo:</th>
            <td><?php echo $equi_desc; ?></td>
        </tr>
        <tr>
            <th>Tipo de Equipo:</th>
            <td><?php echo $tequi_desc; ?></td>
        </tr>
        <tr>
            <th>Número de Ticket:</th>
            <td><?php echo $sol_cod; ?></td>
        </tr>

</table><!--fin de la tabla-->
	</div>
	</div>
	</div>

	<br>

	<p class="lead" align="center"><i>Tome nota del número de ticket para futuras Consultas</i></p>

	</div>

	    <!-- Footer -->
	<?php include("../../resourse/footer.php") ?>
	    <!-- End Footer -->
 </body>
</html>