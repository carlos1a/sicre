<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
 		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
 		<script type="text/javascript">
 			$("document").ready(function(){
 				$("#in_niv1").load("../../controlador/desplegable/con_lista_dependiente.php?cmd=in_nivel1")
 				$("#in_niv1").change(function(){
 					$("#in_niv3").empty();
 					var id = $("#in_niv1").val();
 					$.get("../../controlador/desplegable/con_lista_dependiente.php?cmd=in_nivel2",{param_id:id})
 					.done(function(data){
 						$("#in_niv2").html(data);
 						if($("#in_niv2 ").val()==null){

 							$("#dep").remove();
 						}
 						if($("#in_niv1 ").val()==1  || $("#in_niv1 ").val()==5 || $("#in_niv1 ").val()==6){
 							$("#dep").remove();
 							$("#tipo_equipo").append('<div id="dep"><label for="" class="control-label col-md-4">Tipo de Equipo:</label><div class="col-md-6" ><select class="form-control"  id="in_niv2" name="tipo_equipo" required ></select></div>');
 							$("#in_niv2").html(data);

 						}
 					})
 				})

 				$("#in_niv2").change(function(){

 					if ($("#in_niv2").val()==1) {

 						$("#marca").remove();
 						$("#modelo").remove();
 						$("#niv2").append('<select class="form-control"  id="marca" name="marca" required >'+ '<option  selected="selected" value="">Selecione</option><option value="Samsung">Samsung</option><option value="Isoni">Isoni</option><option value="Compaq">Compaq</option><option value="HP">HP</option><option value="Secutech">Secutech</option><option value="AOC">AOC</option><select>' );
 						$("#mod").append('<select class="form-control"  id="modelo" name="modelo" required >'+ '<option  selected="selected" value="0">Selecione</option><option value="S19C150S">S19C150S</option><option value="S19A300N">S19A300N</option><option value="ISO1828">ISO1828</option><option value="S1922">S1922</option><option value="LV1911">LV1911</option><option value="MLDST185">MLDST185</option><option value="E970DWN">E970DWN</option></select>');


 						//colocar funcion de carga de datos de la bd
 					}else if($("#in_niv2").val()==2) {

 						$("#marca").remove();
 						$("#modelo").remove();
 						$("#niv2").append('<select class="form-control"  id="marca" name="marca" required >'+ '<option  selected="selected" value="">Selecione</option><option value="HP">HP</option><option value="Lenovo">Lenovo</option><option value="Siragon">Siragon</option><option value="PanelPos">Panel Pos</option><option value="Clone">Clone</option><option value="AOC">AOC</option><select>' );
 						$("#mod").append('<select class="form-control"  id="modelo" name="modelo" required >'+ '<option  selected="selected" value="0">Selecione</option><option value="1">S19C150S</option><option value="2">S19A300N</option><option value="3">ISO1828</option><option value="3">S1922</option><option value="3">LV1911</option><option value="3">MLDST185</option><option value="3">E970DWN</option></select>');



 					}else{
 						$("#marca").remove();
 						$("#niv2").append('<input type="text" title="" pattern="[a-zA-Z]+" id ="marca"class="form-control" placeholder="Marca" name="marca" required autofocus maxlength="8">');
 						$("#modelo").remove();
 						$("#mod").append('<input type="text" title="" pattern="[a-zA-Z]+" id ="modelo"class="form-control" placeholder="Modelo" name="modelo" required autofocus maxlength="8">');
 					}
 				})

					/*$("#in_niv2").change(function(){
					var id = $("#in_niv2").val();
					$.get("../controlador/con_dependientes.php?cmd=in_nivel3",{param_id:id})
					.done(function(data){
						$("#in_niv3").html(data);
					})
 		})*/
 		})
 		</script>