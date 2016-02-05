$( document ).ready(function() {


    $('#operadora').change(function(event) {
    	var operadora= $('#operadora').val();


    		var posting = $.post( "../../controlador/desplegable/con_numeros.php", { op: operadora }) ;
    		posting.always(function( data ) {

    			$( "#celular" ).empty()

    				var l=data.num.length;


    				for (var i = 0; i < l; i++) {


    			$( "#celular" ).append('<option value="'+data.cod[i]+'">'+data.num[i]+'</option>');
    				};




 			 });
    });

});
