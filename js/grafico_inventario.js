$( document ).ready(function() {

var posting = $.post( "../../controlador/graficos/con_grafico_inventario.php", { op: 1 }) ;
    		posting.always(function( data ) {



    			//$( "#cantv" ).empty()

    				var l=data.estatus.length;




    			//$( "#cantv" ).append('<option value="'+data.cod[i]+'">'+data.num[i]+'</option>');



	FusionCharts.ready(function(){
    var revenueChart = new FusionCharts({
        "type": "column3d",
        "renderAt": "grafico",

        "width": "550",
        "height": "350",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption": "Equipos por Estatus  ",
              "subCaption": " ",
              "xAxisName": "Estatus",
              "yAxisName": "Cantidad de Equipos",
              "theme": "ocean"
           },
          "data": [
                      {
            "label": data.estatus[0],
            "value": data.cantidad[0],

        },
                      {
            "label": data.estatus[1],
            "value": data.cantidad[1],

        },
                      {
            "label": data.estatus[2],
            "value": data.cantidad[2],

        },
                 {
            "label": data.estatus[3],
            "value": data.cantidad[3],

        },

           ]
        }
    });

    revenueChart.render();
})


});

//----------------------------------------------------------------------------
var posting = $.post( "../../controlador/graficos/con_grafico_inventario.php", { op: 2 }) ;
            posting.always(function( data ) {


                //$( "#cantv" ).empty()

console.log(data.label.length);




                //$( "#cantv" ).append('<option value="'+data.cod[i]+'">'+data.num[i]+'</option>');



    FusionCharts.ready(function(){
    var revenueChart2 = new FusionCharts({
        "type": "bar3d",
        "renderAt": "grafico2",

        "width": "550",
        "height": "350",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption": "Equipos por Categoria  ",
              "subCaption": " ",
              "xAxisName": "Categoria",
              "yAxisName": "Cantidad de Equipos",
           },
          "data":
          {
            'label':data.label,
            'value': data.value
          }


        }
    });

    revenueChart2.render();
})


});
});
