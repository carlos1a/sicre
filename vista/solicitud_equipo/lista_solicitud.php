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


<p class="lead" >Historico de Solicitudes</p>
<br>
<!--inicio de la tabla-->
<div class="table-responsive">
<table id="tables" class="display table">
    <thead>
        <tr>

            <th>Usuario </th>
            <th>Nombre </th>
            <th>Apellido</th>
            <th>Cédula</th>
            <th>Teléfono</th>
            <th>Equipo</th>
            <th>Tipo de Equipo</th>
            <th>Ticket</th>
            <th>Fecha de Solicitud</th>
        </tr>
    </thead>
<tbody>

<?php
    require("../../controlador/inventario/con_listar_solicitud.php");

	for($i=0;$i<pg_num_rows($consulta);$i++){
 ?>

        <tr>
            <td><?php echo $usu_login[$i] ;    ?></td>
            <td><?php echo $usu_nombre[$i] ;    ?></td>
            <td><?php echo $usu_apellido[$i];   ?></td>
            <td><?php echo $usu_cedula[$i];     ?></td>
            <td><?php echo $usu_telefono[$i];   ?></td>
            <td><?php echo $equi_desc[$i];        ?></td>
            <td><?php echo $tequi_desc[$i];       ?></td>
            <td><?php echo $sol_cod[$i];       ?></td>
            <td><?php echo $sol_fecha[$i];     ?></td>




        </tr>


<?php } ?>
</tbody>
</table><!--fin de la tabla-->

</div>

	</div>
	</div>
	</div>

	    <!-- Footer -->
	<?php include("../../resourse/footer.php") ?>
	    <!-- End Footer -->

        <link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="../../js/data_table.js"></script>
        <script type="text/javascript">
        $(document).ready( function () {
    $('#tables').DataTable();
} );
        </script>
 </body>
</html>