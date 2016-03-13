<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
 	<script type="text/javascript" src="../../js/jquery-1.9.1.min.js"></script>
</head>
<body>
<div>
	<form action="#" id="number">
		<input type="number" name='number'>
		<input type="submit">
	</form>
</div>
<form action="#" id="ele">
<div id="hola"></div>

</form>
<script type="text/javascript">
	$( document ).ready(function() {
    		$('#number').submit(function(e){
    		   e.preventDefault();
    		   var val=$(this).serializeArray();
    		  val= val[0].value;
    		  //-------------
    		  $("#hola").empty();
    		   //console.log(val);
    		   var aux = [ ];
    		   var $boton=$('<input type="submit">');
    		   var $tabla=$('<table class="table"><thead><tr><th>Firstname</th> <th>Lastname</th><th>Email</th></tr></thead><tbody>');
   var $pie=$('</tbody></table>');

    		for (var i = 0; i < val; i++) {
    			console.log(i);

    		var $form=$("<tr id="+i+"><td>John</td><td>Doe</td><td>john@example.com</td></tr>");
    		aux.push($form);

    				};
    		$('#hola').append($tabla,aux,$pie,$boton);

    		});
});
</script>
</body>
</html>