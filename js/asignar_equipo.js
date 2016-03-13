$("document").ready(function(){
$('#submit').hide();
$('#div_lista').hide();
var posting = $.post( "../../controlador/inventario/consultar_asignado_temporal.php") ;
            posting.always(function( data ) {
              if (data.serial!=null) {

                $('#div_lista').show();
              var l=data.serial.length;




              for (var i = 0; i < l; i++) {


          $( "#lista" ).append('<tr>'+'<td>'+data.equipo[i]+'</td>'+'<td>'+data.tipo_equipo[i]+'</td>'+'<td>'+data.marca[i]+'</td>'+'<td>'+data.modelo[i]+'</td>'+'<td>'+data.serial[i]+'</td>'+'<td>'+data.nombre[i]+' '+data.apellido[i]+'</td>'+'</tr>');
              };

              $('#submit').show();
            }

            });

        $('#registrar').submit(function(e){

                    e.preventDefault();
                    var dat=$( "#registrar" ).serialize();
                    var cod=$("#codigo").val()
                    if (cod==0) {
                            alert("serial no valido");
                    }else{



                $.ajax({
                    url: '../../controlador/inventario/con_registrar_asignado.php',
                    type:  'POST',

                    data: dat,
                    error: function(jqXHR,estado,error){

                    }

                })
                .done(function(response) {
                  $( "#res" ).append(response);

                    document.getElementById("registrar").reset();
                })
                .fail(function() {

                })
                .always(function() {


                });

                }
        });

});
