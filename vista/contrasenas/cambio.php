<?php
$srt=base64_decode($_GET['get']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cambio Exitoso</title>
</head>
<body>
	<meta http-equiv='content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../sweetalert/lib/sweet-alert.css'>
	<script type='text/javascript' src='../sweetalert/lib/sweet-alert.min.js' ></script>
	<script type='text/javascript'>swal({title:'<?php echo $srt;?>', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../vista/usuario/registrar_usuario.php'});
	</script>
</body>";
</html>