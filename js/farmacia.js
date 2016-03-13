$( document ).ready(function() {

    var form=$('.dat_numeros').html();
    $('.dat_numeros').hide();
    $('.numeros').hide();

     $('#numeros').change(function(event) {
    $('.numeros').empty();
    var num= $('#numeros').val();
    $('.numeros').show();
    for (var i = 0; i < num; i++) {
        $('.numeros').append('<p>Ingrese valores de línea '+(i+1)+'</p>'+form);
    };

    var estado= $('#estado').val();


            var posting = $.post( "../../controlador/desplegable/con_cantv_farmacia.php", { op: estado }) ;
                        posting.always(function( data ) {

                // $('#linea').change(function(event) {
                var tel= $('#linea').val();
                if (tel==2) {
                //$( ".telefono" ).empty()

                    var l=data.num.length;


                    for (var i = 0; i < l; i++) {


                $( ".telefono" ).append('<option value="'+data.cod[i]+'">'+data.num[i]+'</option>');
                    };
                }else if (tel==1){
                    var pos= $.post( "../../controlador/desplegable/con_celular_farmacia.php") ;

                    pos.always(function( dat ) {

                    var k=dat.numero.length;


                    for (var i = 0; i < k; i++) {


                $( ".telefono" ).append('<option value="'+dat.codigo[i]+'">'+dat.numero[i]+'</option>');
                    };
                    });
                }

                  // });


             });

 });

//---------------------------------------------------------------------------------------------

$( "#form" ).on('submit', function(e){
e.preventDefault();
     var el=$( "#form" ).serializeArray();


$.ajax({

    url: '../../controlador/farmacia/con_registrar_farmacia.php',
    type: 'POST',

    data: {param1: el},
})
.done(function(response) {
    $( "#res" ).append(response);
});

});






});
