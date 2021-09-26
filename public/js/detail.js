function consultarpagos(){

    $.ajax({
        url : '/api/listado_pagos',
        type : 'get',
        dataType : 'json',
        success : function(data){
            var tabla = '';
            for(cot of data){
                tabla = tabla+'<tr><td></td><td></td><td></td><td></td></tr>'
            }
            $("#mostrar").html(tabla);
        }
    });
}
 
function borrar(id,p){

    $.ajax({
        url : '/api/borrar/'+id,
        type : 'get',
        dataType : 'json',
        success : function(data){
            alert(data.msj);
            location.href = '/recarga/'+p; 
        }
    });
}