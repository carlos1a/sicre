<?php
$asignado=unserialize($_GET['get']);
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


<div class="table-responsive">
<table id="tables" class="display table">
    <thead>
        <tr>

            <th>Responsable </th>
            <th>Departamento</th>

            <th>Teléfono</th>
            <th>Fecha de Asignación </th>
            <th>Equipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Tipo</th>
            <th>Serial</th>

            <th>Asignado por</th>
        </tr>
    </thead>
<tbody>

<?php for ($i=0; $i < count($asignado); $i++) {
    # code...
 ?>
        <tr>
            <td><?php echo $asignado[$i][0] ?></td>
            <td><?php echo $asignado[$i][3] ?></td>
            <td><?php echo $asignado[$i][4] ?></td>
            <td><?php echo $asignado[$i][1] ?></td>
            
            <td><?php echo $asignado[$i][5] ?></td>
            <td><?php echo $asignado[$i][6] ?></td>
            <td><?php echo $asignado[$i][7] ?></td>
            <td><?php echo $asignado[$i][8] ?></td>
            <td><?php echo $asignado[$i][9] ?></td>
            <td><?php echo $asignado[$i][2] ?></td>
        </tr>
        <?php } ?>
</tbody>
</table><!--fin de la tabla-->
	</div>
<?php echo "<a target='_blank' href='../../tcpdf/examples/example_001.php?asig=".serialize($asignado)."'>imprimir</a>";?>

	</div>
	</div>
	</div>

	    <!-- Footer -->
	<?php include("../../resourse/footer.php") ?>
	    <!-- End Footer -->
 </body>
</html>
