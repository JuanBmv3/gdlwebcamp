$(document).ready(function(){

    // Crear un evento ----------------------------------------

    $('#crear_eventos').on('submit',function(e){
       
        e.preventDefault(); //Para que no se vaya a otra ruta
        var datos = $(this).serializeArray();


        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                var resultado = data;
                console.log(resultado);
                if(resultado.respuesta == 'exito'){
                   
                    swal(
                        'Correcto',
                        'El evento se creo correctamente',
                        'success'
                    )
                }else{
                    
                    swal(
                        'Error',
                        'Hubo un error',
                        'error'
                    )
                }
            }
        }).done(function(data){
            $('#crear_eventos').trigger("reset");
        });
    });

  
    // Crear un evento ----------------------------------------

    
    // Editar un evento ----------------------------------------------

    // Dar los valores al modal
    $('.editarbtn_evento').on('click',function (){

        
       $tr = $(this).closest('tr');
       var datos = $tr.children('td').map(function (){
            return $(this).text();
       });

       var id = $(this).attr("data-id");
       var id_cat = $(this).attr("id-cat");
       var id_inv = $(this).attr("id-inv");
        

       $('#nombre_evento').val(datos[0]);
       $('#fecha_evento').val(datos[1]);
       $('#hora_evento').val(datos[2]);
       $('#categoria_actual').text(datos[3]);
       $('#categoria_actual').attr('value', id_cat);
       $('#ponente_actual').text(datos[4]);
       $('#ponente_actual').attr('value', id_inv);
       $('#evento_id').val(id);

       $('#categoria_actual').hide();
       $('#ponente_actual').hide();

    });
    
    $('#editar_evento').on('submit',function(e){

        e.preventDefault(); //Para que no se vaya a otra ruta
        
        var datosEdit = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datosEdit,
            url:$(this).attr('action'),
            dataType: 'json',
            success: function(data){
                var resultado = data;
                if(resultado.respuesta == 'exito'){
                   
                    swal(
                        'Correcto',
                        'El evento se actualizo correctamente',
                        'success'
                    )
                    $("#modal_editar").modal('hide');//ocultamos el modal

                    setTimeout(function(){
                        window.location.href = '/proyecto-curso/admin/eventos/lista_eventos.php';
                    },1000);

                }else{
                    
                    swal(
                        'Error',
                        'Hubo un error',
                        'error'
                    )
                }
            }
        });
    });

    // Editar un evento ----------------------------------------------
 
    // Borrar un evento ----------------------------------------------

    $('.borrar_evento').on('click',function(e){
       e.preventDefault(); //Para que no se vaya a otra ruta

        var id = $(this).attr('data-id');
       
        
        swal({
            title: 'Estas seguro?',
            text: "No podras recuperar los datos si lo borras",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'post',
                    data:{
                        'id': id,
                        'registro' : 'eliminar'
                    },
                    url: '/proyecto-curso/admin/eventos/modelo_eventos.php',
                    success: function(data){
                        var resultado = JSON.parse(data);
                        if(resultado.respuesta == 'exito'){
                            jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                            swal(
                                'Eliminado',
                                'Tu evento ha sido eliminado',
                                'success'
                            )
                        }else{
                            swal(
                                'Error',
                                'Ha ocurrido un error',
                                'error'
                            )  
                        }
                    }
                });       
            }        
        });
    });

    // Borrar un evento ----------------------------------------------

     // Crear una categoria de evento ----------------------------------------

     $('#crear_cat').on('submit',function(e){
       
        e.preventDefault(); //Para que no se vaya a otra ruta
        var datos = $(this).serializeArray();


        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                var resultado = data;
                console.log(resultado);
                if(resultado.respuesta == 'exito'){
                   
                    swal(
                        'Correcto',
                        'El evento se creo correctamente',
                        'success'
                    )
                }else{
                    
                    swal(
                        'Error',
                        'Hubo un error',
                        'error'
                    )
                }
            }
        }).done(function(data){
            $('#crear_cat').trigger("reset");
        });
    });

  
    // Crear una categoria de evento ----------------------------------------


     
    // Editar una categoria ----------------------------------------------

    // Dar los valores al modal
    $('.editarbtn_cat').on('click',function (){

        
        $tr = $(this).closest('tr');
        var datos = $tr.children('td').map(function (){
             return $(this).text();
        });
 
        var id = $(this).attr("data-id");
        var icono = $(this).attr("code-icon");
 
        console.log(icono);
        $('#cat_evento').val(datos[0]);
        $('#icono').val(icono);
        $('#cat_id').val(id);
 
     });

     $('#editar_cat').on('submit',function(e){
 
         e.preventDefault(); //Para que no se vaya a otra ruta
         
         var datosEdit = $(this).serializeArray();
 
         $.ajax({
             type: $(this).attr('method'),
             data: datosEdit,
             url:$(this).attr('action'),
             dataType: 'json',
             success: function(data){
                 var resultado = data;
                 if(resultado.respuesta == 'exito'){
                    
                     swal(
                         'Correcto',
                         'La categoria se actualizo correctamente',
                         'success'
                     )
                     $("#modal_editar").modal('hide');//ocultamos el modal
 
                     setTimeout(function(){
                         window.location.href = '/proyecto-curso/admin/cat_eventos/listar_cat_eventos.php';
                     },1000);
 
                 }else{
                     
                     swal(
                         'Error',
                         'Hubo un error',
                         'error'
                     )
                 }
             }
         });
     });
 
     // Editar una categoria ----------------------------------------------
  
     
    // Borrar una categoria ----------------------------------------------

    $('.borrar_cat').on('click',function(e){
        e.preventDefault(); //Para que no se vaya a otra ruta
 
         var id = $(this).attr('data-id');
           
         swal({
             title: 'Estas seguro?',
             text: "No podras recuperar los datos si lo borras",
             type: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, Eliminar',
             cancelButtonText: 'Cancelar'
         }).then((result) => {
             if (result.value) {
                 $.ajax({
                     type: 'post',
                     data:{
                         'id': id,
                         'registro' : 'eliminar'
                     },
                     url: '/proyecto-curso/admin/cat_eventos/modelo_cat.php',
                     success: function(data){
                         var resultado = JSON.parse(data);
                         if(resultado.respuesta == 'exito'){
                             jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                             swal(
                                 'Eliminado',
                                 'Tu categoria ha sido eliminado',
                                 'success'
                             )
                         }else{
                             swal(
                                 'Error',
                                 'Ha ocurrido un error',
                                 'error'
                             )  
                         }
                     }
                 });       
             }        
         });
     });
 
     // Borrar un categoria ----------------------------------------------

     // Crear un invitado ----------------------------------------

    $('#crear_inv').on('submit',function(e){
       
        e.preventDefault(); //Para que no se vaya a otra ruta
        
        var datos = new FormData(this);
        $.ajax({
            
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false
                
        }).done(function(data){
                var resultado = data;
                
                if(resultado.respuesta == 'exito'){
                   
                    swal(
                        'Correcto',
                        'El invitado se agrego correctamente',
                        'success'
                    )
                }else{
                    
                    swal(
                        'Error',
                        'Hubo un error',
                        'error'
                    )
                }
                $('#crear_inv').trigger("reset");
        });
    });

  
    // Crear un invitado ----------------------------------------


    // Editar un invitado ----------------------------------------------

    // Dar los valores al modal
    $('.editarbtn_inv').on('click',function (){

        
        $tr = $(this).closest('tr');
        var datos = $tr.children('td').map(function (){
             return $(this).text();
        });
 
        var id = $(this).attr("data-id");
        var image = $(this).attr("url-image");
    
 
        $('#nombre_inv').val(datos[0]);
        $('#apellido_inv').val(datos[1]);
        $('#biografia_inv').val(datos[2]);
        $('#imagen_actual').attr('src', '../img/invitados/'+image);
        $('#inv_id').val(id);
 
 
     });

     $('#editar_inv').on('submit',function(e){
        e.preventDefault(); //Para que no se vaya a otra ruta
         
        var datosEdit = new FormData(this);
 
         $.ajax({
            type: $(this).attr('method'),
            data: datosEdit,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }       
            
            }).done(function(data){
                
                var resultado = data;
                 if(resultado.respuesta == 'exito'){
                    
                     swal(
                         'Correcto',
                         'El invitado se actualizo correctamente',
                         'success'
                     )
                     $("#modal_editar").modal('hide');//ocultamos el modal
 
                     setTimeout(function(){
                         window.location.href = '/proyecto-curso/admin/invitados/lista_inv.php';
                     },1000);
 
                 }else{
                     
                     swal(
                         'Error',
                         'Hubo un error',
                         'error'
                     )
                     console.log(data);
                 }
            });
            
     });
 
     // Editar un invitado ----------------------------------------------
  
// Borrar un invitado ----------------------------------------------

$('.borrar_inv').on('click',function(e){
    e.preventDefault(); //Para que no se vaya a otra ruta

     var id = $(this).attr('data-id');

     console.log(id);
       
     swal({
         title: 'Estas seguro?',
         text: "No podras recuperar los datos si lo borras",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si, Eliminar',
         cancelButtonText: 'Cancelar'
     }).then((result) => {
         if (result.value) {
             $.ajax({
                 type: 'post',
                 data:{
                     'id': id,
                     'registro' : 'eliminar'
                 },
                 url: '/proyecto-curso/admin/invitados/modelo_inv.php',
                 success: function(data){
                     var resultado = JSON.parse(data);
                     if(resultado.respuesta == 'exito'){
                         jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                         swal(
                             'Eliminado',
                             'Tu invitado ha sido eliminado',
                             'success'
                         )
                     }else{
                         swal(
                             'Error',
                             'Ha ocurrido un error',
                             'error'
                         )  
                     }
                 }
             });       
         }        
     });
 });

 // Borrar un invitado ----------------------------------------------

 
 // Crear un registro ----------------------------------------

 $('#crear_reg').on('submit',function(e){
    e.preventDefault(); //Para que no se vaya a otra ruta
    var datos = $(this).serializeArray();


    $.ajax({
        type: $(this).attr('method'),
        data: datos,
        url: $(this).attr('action'),
        dataType: 'json',
        success: function(data){
            var resultado = data;
            console.log(resultado);
            if(resultado.respuesta == 'exito'){
               
                swal(
                    'Correcto',
                    'El registro se creo correctamente',
                    'success'
                )

               
            }else{
                
                swal(
                    'Error',
                    'Hubo un error',
                    'error'
                )
            }
        }
    }).done(function(data){
        setTimeout(function(){
            window.location.href = '/proyecto-curso/admin/registrados/agregar_registrados.php';
        },2000);

    });
  
});


// Crear un registro ----------------------------------------


// Editar un invitado ----------------------------------------------

// Dar los valores al modal
$('.editarbtn_inv').on('click',function (){

    
    $tr = $(this).closest('tr');
    var datos = $tr.children('td').map(function (){
         return $(this).text();
    });

    var id = $(this).attr("data-id");
    var image = $(this).attr("url-image");


    $('#nombre_inv').val(datos[0]);
    $('#apellido_inv').val(datos[1]);
    $('#biografia_inv').val(datos[2]);
    $('#imagen_actual').attr('src', '../img/invitados/'+image);
    $('#inv_id').val(id);


 });

 $('#editar_reg').on('submit',function(e){
    e.preventDefault(); //Para que no se vaya a otra ruta
     
    var datosEdit = new FormData(this);

     $.ajax({
        type: $(this).attr('method'),
        data: datosEdit,
        url: $(this).attr('action'),
        dataType: 'json',
        contentType: false,
        processData: false,
        async: true,
        cache: false,
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        }       
        
        }).done(function(data){
            
            var resultado = data;
             if(resultado.respuesta == 'exito'){
                
                 swal(
                     'Correcto',
                     'El invitado se actualizo correctamente',
                     'success'
                 )
                 $("#modal_editar").modal('hide');//ocultamos el modal

                 setTimeout(function(){
                     window.location.href = '/proyecto-curso/admin/invitados/lista_inv.php';
                 },1000);

             }else{
                 
                 swal(
                     'Error',
                     'Hubo un error',
                     'error'
                 )
                 console.log(data);
             }
        });
        
 });

 // Editar un invitado ----------------------------------------------

// Borrar un invitado ----------------------------------------------

$('.borrar_reg').on('click',function(e){
e.preventDefault(); //Para que no se vaya a otra ruta

 var id = $(this).attr('data-id');
   
 swal({
     title: 'Estas seguro?',
     text: "No podras recuperar los datos si lo borras",
     type: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Si, Eliminar',
     cancelButtonText: 'Cancelar'
 }).then((result) => {
     if (result.value) {
         $.ajax({
             type: 'post',
             data:{
                 'id': id,
                 'registro' : 'eliminar'
             },
             url: '/proyecto-curso/admin/registrados/modelo_reg.php',
             success: function(data){
                 var resultado = JSON.parse(data);
                 if(resultado.respuesta == 'exito'){
                     jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                     swal(
                         'Eliminado',
                         'El registro ha sido eliminado',
                         'success'
                     )
                 }else{
                     swal(
                         'Error',
                         'Ha ocurrido un error',
                         'error'
                     )  
                 }
             }
         });       
     }        
 });
});

// Borrar un invitado ----------------------------------------------


// GRAFICAS -----------------------------------------------

/*******************GRAFICA MORRIS*************************/
 
$.getJSON("datos_grafica.php", function(data) {
    console.log(data);
    new Morris.Line({
        element: 'grafica_registros',
        data: data,  // la data viene de la seccion de datos_grafica.php
        xkey: 'fecha',
        ykeys: ['cantidad'],
        labels: ['Cantidad'],
        xLabels: 'day',
        xLabelAngle: 45,
        realize: true
    });
});

/***********************************************************/
     


});