<?php
require("../../controlador/inventario/con_lista_equipo.php");
?>

<html>
 <head>
 <meta charset="utf-8">
 <!-- DataTables CSS -->


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

<p class="lead">Últimos 10 equipos registrados en el inventario</p>
<br>
<!--inicio de la tabla-->
<div class="table-responsive" >
<table id="tables" class="display table">
    <thead>
        <tr>
	 <th>Equipo</th>
	 <th>Tipo de Equipo</th>
            <th>Serial </th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Bien nacional</th>
            <th>Descripción</th>
            <th>Estatus</th>
            <th>Fecha de Registro</th>
            <th>Registrado por</th>
        </tr>
    </thead>
         <tbody>

<?php
	for($i=0;$i<pg_num_rows($consulta);$i++){
	# code...

 ?>
  <tr>

	  <td><?php echo $equipo[$i]; ?> </td>
	  <td><?php echo $tipo_equipo[$i]; ?> </td>
            <td><?php echo $inv_serial [$i]; ?> </td>
            <td><?php echo $inv_marca[$i]; ?></td>
            <td><?php echo $inv_modelo[$i]; ?></td>
            <td><?php echo $inv_precio[$i]; ?></td>
            <td><?php echo $inv_bien[$i]; ?></td>
            <td><?php echo $inv_descripcion[$i]; ?></td>
            <td><?php echo $esqui_cod[$i]; ?></td>
            <td><?php echo $inv_fecha[$i]; ?></td>
            <td><?php echo $usuario[$i]; ?> </td>




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
