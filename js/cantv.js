$( document ).ready(function() {


    $('#estado').change(function(event) {
    	var estado= $('#estado').val();


    		var posting = $.post( "../../controlador/desplegable/con_cantv.php", { op: estado }) ;
    		posting.always(function( data ) {

    			$( "#cantv" ).empty()

    				var l=data.num.length;


    				for (var i = 0; i < l; i++) {


    			$( "#cantv" ).append('<option value="'+data.cod[i]+'">'+data.num[i]+'</option>');
    				};




 			 });
    });

});
