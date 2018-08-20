/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getEstadoPais(id_pais){
     var optVal= $("#pais option:selected").val();

 form = $("#form_estado");
   $("#id_pais").val(optVal);
    $.ajax({
        type: "POST",
        url: form.attr('action'),
        data: form.serialize()
    }).done(function (data) {

        if (data) {
        var e=$("#estado"); 
        e.empty();    
$.each(data, function( index, value ) {
         e.append("<option  value="+value.id+">"+value.nombre+" </option");
});            

    
    }
    })

            .fail(function (data) {
                console.log(data);
            });


}


