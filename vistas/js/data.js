
$(document).ready( function () {
    $("#myTable").DataTable({
    "ajax": "controladores/data.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    
    "language": {

        "sProcessing":     "Procesando...",
       "sLengthMenu":     "Mostrar _MENU_ registros",
       "sZeroRecords":    "No se encontraron resultados",
       "sEmptyTable":     "Ningún dato disponible en esta tabla",
       "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
       "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
       "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       "sInfoPostFix":    "",
       "sSearch":         "Buscar:",
       "sUrl":            "",
       "sInfoThousands":  ",",
       "sLoadingRecords": "Cargando...",
       "oPaginate": {
           "sFirst":    "Primero",
           "sLast":     "Último",
           "sNext":     "Siguiente",
           "sPrevious": "Anterior"
       },
       "oAria": {
               "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
               "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       }

    }

});
} );

function mostrar(){
    $('#table').show(); 
    $('#mostrar').hide(); 
    $('#ocultar').show(); 

 };

 function Total() {
    var params = {
        "tipo" :"prueba"
     
    };
    $.ajax({
        data:  params,
        url:   'controladores/Total.php',
        dataType: 'json',
        type:  'post',
        success:  function (response) {
            var json = JSON.parse(JSON.stringify(response));
            $('#total').show(); 
for (let index = 0; index < json.length; index++) {
    var total = json[index];
    
}

$("#total").val(total["count"]);
console.log(total["count"])  
         
         

        }
    });

 }

 function ocultar(){
    $('#table').hide(); 
    $('#mostrar').show(); 
    $('#ocultar').hide(); 

 };