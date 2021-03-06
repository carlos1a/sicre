<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
?>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta http-equiv="PRAGMA" content="NO-CACHE" />
		<meta http-equiv="EXPIRES" content="-1" />
		<script type="text/javascript" src="../../calendario/jquery.js"></script>
		<script type="text/javascript" src="../../calendario/vtipV.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			setTimeout(function() {$('#mensaje').fadeOut('fast');}, 3000);
		});
		</script>
		<style>
		p#vtip { display: none; position: fixed; padding: 5px; left: 5px; font-size: 0.75em; background-color: #666666; border: 0px solid #666666; -moz-border-radius: 5px; -webkit-border-radius: 5px; z-index: 9999;color:white }
		p#vtip #vtipArrow { position: absolute; top: -10px; left: 5px }
		.ok{border:1px dotted green;color:green;padding:10px}
		#agenda{margin:10px;width:680px;margin:0 auto}
		#agenda h1{text-align:left;margin:0;font-size:1.5em;color:#312c2b}
		#agenda h2{text-align:left;margin:0;font-size:1em;color:#969696}
		#agenda table.calendario {margin:15px auto;width:100%;border:1px dotted #ccc;font-size:15px;}
		.calendario th {border:0px dotted #ccc;background:#222222;color:white;padding:1px 3px; text-align:center;font-size:16px; border-radius: 10px;}
		.calendario td{padding:20px 5px 10px 5px;text-align:center;border:0px dotted #ccc;width:100px;white-space:pre-line; border-radius: 8px;}
		.calendario td p{margin:5px 0 2px 0;font-size:18px;text-align:center;padding:0px}
		.calendario td.desactivada {background:(241, 236, 236, 0);}
		.calendario td.activa {background:#ffffff;}
		.calendario td.evento {background:#dedeec;color:black;font-weight: bold;}
		.calendario td.hoy{font-weight:bold; color:#E65C00;font-size:16px;}
		.calendario form{margin:5px 0 !important}
		.calendario input.text{border:1px dotted #ccc;background:white;width:200px !important}
		.calendario input.enviar{border:1px dotted #ccc;background:white;width:110px !important;background:#1B8BFD;margin:5 0 10 10px;}
		.calendario td img{vertical-align:middle;float:right;border:0;width:16px;height:16px}
		.vtip{cursor:pointer;}
		.verde{font-size:125% !important;font-weight:bold;color:green;}
		.rojo{font-size:125% !important;font-weight:bold;color:red;}
		</style>
	</head>
	<body>

<div align="center">
		<?php
			require_once("../../modelo/mod_connex.php");
			$conexion = new Connex();
		    $pgconn= $conexion->conectar();
			$mostrar="";
			function fecha ($valor)
			{
				$timer = explode(" ",$valor);
				$fecha = explode("-",$timer[0]);
				$fechex = $fecha[2]."/".$fecha[1]."/".$fecha[0];
				return $fechex;
			}
			if (isset($_POST["guardarevento"])=="Si" and $_SESSION['per_cod']==4)
			{
				$q1="insert into tcalendario (fecha,evento) values ('".$_POST["fecha"]."','".strip_tags($_POST["titulo"])."')";

				if ($r1=pg_query($pgconn,$q1)) { $mostrar="<p class='ok' id='mensaje'>Evento guardado correctamente.</p>";
				echo('<script>location.href = "inicio.php";</script>');}
				else $mostrar= "<p class='error' id='mensaje'>Se ha producido un error guardando el evento.</p>";
			}
			if (isset($_GET["borrarevento"]) and $_SESSION['per_cod']==4)
			{
				$q1="delete from tcalendario where id='".$_GET["borrarevento"]."'";

				if ($r1=pg_query($pgconn,$q1)){ echo('<script>location.href = "inicio.php";</script>'); $mostrar="<p class='ok' id='mensaje'>Evento eliminado correctamente.</p>";}
				else $mostrar="<p class='error' id='mensaje'>Se ha producido un error eliminando el evento.</p>";
			}

			if (isset($_POST["addevent"])=="Si")
			{

				$q1="insert into tcalendario (fecha,evento) values ('".$_POST["fechas"]."','".$_POST["titulos"]."')";
				if ($r1=pg_query($pgconn,$q1)) { $mostrar="<p class='ok' id='mensaje'>Evento guardado correctamente.</p>";
				echo('<script>location.href = "inicio2.php";</script>');}
				else $mostrar="<p class='error' id='mensaje'>Se ha producido un error guardando el evento.</p>";
			}

			if (!isset($_GET["fecha"]))
			{
				$mesactual=intval(date("m"));
				if ($mesactual<10) $elmes="0".$mesactual;
				else $elmes=$mesactual;
				$elanio=date("Y");
			}
			else
			{
				$cortefecha=explode("-",$_GET["fecha"]);
				$mesactual=intval($cortefecha[1]);
				if ($mesactual<10) $elmes="0".$mesactual;
				else $elmes=$mesactual;
				$elanio=$cortefecha[0];
			}

			$primeromes=date("N",mktime(0,0,0,$mesactual,1,$elanio));

			if (!isset($_GET["mes"])) $hoy=date("Y-m-d");
			else $hoy=$_GET["ano"]."-".$_GET["mes"]."-01";

			if (($elanio % 4 == 0) && (($elanio % 100 != 0) || ($elanio % 400 == 0))) $dias=array("","31","29","31","30","31","30","31","31","30","31","30","31");
			else $dias=array("","31","28","31","30","31","30","31","31","30","31","30","31");

			$ides=array();
			$eventos=array();
			$titulos=array();

			/*$q1="select * from tcalendario where month(fecha)='".$elmes."' and year(fecha)='".$elanio."'";

			$r1=pg_query($pgconn,$q1)or die (pg_last_error($pgconn));
			if ($f1=pg_fetch_array($r1,0,PGSQL_ASSOC))
			{
				$h=0;
				do
				{
					$ides[$h]=$f1["id"];
					$eventos[$h]=$f1["fecha"];
					$titulos[$h]=$f1["evento"];
					$h+=1;
				}
				while($f1=pg_fetch_array($r1,0,PGSQL_ASSOC));
			}*/
			$meses=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$diasantes=$primeromes-1;
			$diasdespues=42;
			$tope=$dias[$mesactual]+$diasantes;
			if ($tope%7!=0) $totalfilas=intval(($tope/7)+1);
			else $totalfilas=intval(($tope/7));
			echo "<h2 align='left'>Calendario de eventos para: ".$meses[$mesactual]." de ".$elanio."</h2>";
			echo $mostrar;
			echo "<script>function mostrar(cual) {if (document.getElementById(cual).style.display=='block') {document.getElementById(cual).style.display='none';} else {document.getElementById(cual).style.display='block'} }</script>";
			echo "<table class='calendario col-md-12'  cellspacing='0' cellpadding='0' align='left' }>";
			echo "<tr><th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th><th>Sábado</th><th>Domingo</th></tr><tr>";
			$j=1;
			$filita=0;
			function buscarevento($fecha,$eventos,$titulos)
			{
				$clave=array_search($fecha,$eventos,true);
				return $titulos[$clave];
			}
			for ($i=1;$i<=$diasdespues;$i++)
			{
				if ($filita<$totalfilas)
				{
				if ($i>=$primeromes && $i<=$tope)
				{
					echo "<td";
					if ($j<10) $dd="0".$j;else $dd=$j;
					$compuesta=$elanio."-$elmes-$dd";
					if (count($eventos)>0 && in_array($compuesta,$eventos,true)) {echo " class=' evento";$noagregar=true;}
					else {echo " class='activa";$noagregar=false;}
					if ($hoy==$compuesta) echo " hoy";
					if ($noagregar==false) echo "'>$j<a href='javascript:mostrar(\"evento$j\")' title='Crear un evento el ".fecha($compuesta)."' class='vtip'><img src='../../calendario/add.png' /></a><form id='evento$j' method='post' action='".$_SERVER["PHP_SELF"]."' style='display:none'><input type='text' name='titulo' class='text' required /><input type='Submit' name='Enviar' value='Guardar' class='enviar' /><input type='hidden' name='guardarevento' value='Si' /><input type='hidden' name='fecha' value='$compuesta' /></form>";
					else echo "'>$j<a href='javascript:mostrar(\"evento$j\")' title='Agregar un Evento el ".fecha($compuesta)."' class='vtip'><img src='../../calendario/add.png' /></a><form id='evento$j' method='post' action='".$_SERVER["PHP_SELF"]."' style='display:none'><input type='text' name='titulos' class='text' /><input type='Submit' name='Enviar' value='Guardar' class='enviar' /><input type='hidden' name='addevent' value='Si' /><input type='hidden' name='fechas' value='$compuesta' /></form>";

					$sqlevent="select * from tcalendario where fecha='".$compuesta."' order by id";

					$revent=pg_query($pgconn,$sqlevent);
					while($rowevent=pg_fetch_array($revent))
					{
						echo "<p>$rowevent[evento]<a href='".$_SERVER["PHP_SELF"]."?borrarevento=".$rowevent["id"]."' onClick=\"return confirm('&iquest;Confirmas la eliminaci&oacute;n del Evento?')\" title='Eliminar este evento del ".fecha($compuesta)."' class='vtip'><img src='../../calendario/delete.png' /></a></p>";
					}

					echo "</td>";
					$j+=1;
				}
				else echo "<td class='desactivada'>&nbsp;</td>";
				if ($i==7 || $i==14 || $i==21 || $i==28 || $i==35 || $i==42) {echo "<tr>";$filita+=1;}
				}
			}
			echo "</table>";

			$mesanterior=date("Y-m-d",mktime(0,0,0,$mesactual-1,01,$elanio));
			$messiguiente=date("Y-m-d",mktime(0,0,0,$mesactual+1,01,$elanio));

			echo " <div style='height:20em;'></div>&laquo;<a href='".$_SERVER["PHP_SELF"]."?fecha=$mesanterior'>Mes anterior</a> - <a href='".$_SERVER["PHP_SELF"]."?fecha=$messiguiente'>Mes siguiente</a> &raquo;";
			?>
	</td></tr></table>

	<?php  ?>
	<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-266167-20");
pageTracker._setDomainName(".martiniglesias.eu");
pageTracker._trackPageview();
} catch(err) {}</script>
</div>
</body>
</html>