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
<div class="row">
  <div class="col-xs-8"><p class="lead"> Contactos</p>
  <br>

<address><strong> Ministerio del Poder Popular para el Proceso Social de Trabajo <br> Departamento Tecnologico de Desarrollo y Gestion de Aplicaciones <br> Teléfono(s): +58 (212) 8011318 / (212) 8011404 <br> Correo: correoh@dominio.com </strong></address>
</div>


  <div class="col-xs-4">
  <script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter=new google.maps.LatLng(10.5091619,-66.9158241);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:18,
  mapTypeId:google.maps.MapTypeId.HYBRID
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="googleMap" style="width:500px;height:380px;"  ></div>
<!--END GOOGLE MAPS-->
</div>
</div>
</div>



<br>

	    <!-- Footer -->
	<?php include("../../resourse/footer.php") ?>
	    <!-- End Footer -->
 </body>

</html>