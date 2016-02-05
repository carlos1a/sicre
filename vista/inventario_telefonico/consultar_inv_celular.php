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


<p class="lead" >Listado del Inventario Telefónico</p>
<br>
<!--inicio de la tabla-->
<div class="table-responsive">
<table id="tables" class="table table-bordered">
    <thead>
        <tr>

            <th>Código </th>
            <th>Número</th>
            <th>Tecnología</th>
            <th>Tipo de Línea</th>
            <th>Estatus</th>


        </tr>
    </thead>
<tbody>

<?php
    require("../../controlador/inventario_telefono/con_lista_inv_celular.php");

	for($i=0;$i<pg_num_rows($consulta);$i++){
 ?>

        <tr>
            <td><?php echo $cod_cel_numero[$i] ;    ?></td>
            <td><?php echo $tel_cel_numero[$i];   ?></td>
            <td><?php echo $tec_cod[$i];     ?></td>
            <td><?php echo $tip_lin_cod[$i];   ?></td>
            <td><?php echo $est_lin_cod[$i];   ?></td>





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