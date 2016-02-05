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


<p class="lead" >Últimos 10 Usuarios Registrados en el SICRE</p>
<br>
<!--inicio de la tabla-->
<div class="table-responsive">
<table id="tables" class="display table">
    <thead>
        <tr>

            <th>Nombre </th>
            <th>Apellido</th>
            <th>Cédula</th>
            <th>Teléfono</th>
            <th>Departamento</th>
            <th>Estatus</th>
        </tr>
    </thead>
<tbody>

<?php
    require("../../controlador/usuario/con_lista_usu.php");

	for($i=0;$i<pg_num_rows($consulta);$i++){
 ?>

        <tr>
            <td><?php echo $usu_nombre[$i] ;    ?></td>
            <td><?php echo $usu_apellido[$i];   ?></td>
            <td><?php echo $usu_cedula[$i];     ?></td>
            <td><?php echo $usu_telefono[$i];   ?></td>
            <td><?php echo $dep_cod[$i];        ?></td>
            <td><?php echo $estu_cod[$i];       ?></td>



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