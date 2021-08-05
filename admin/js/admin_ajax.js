$(document).ready(function(){

    // Crear un administrador ----------------------------------------

    $('#crear_admin').on('submit',function(e){
       
        e.preventDefault(); //Para que no se vaya a otra ruta
        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url:$(this).attr('action'),
            dataType: 'json',
            success: function(data){
                var resultado = data;
                if(resultado.respuesta == 'exito'){
                   
                    swal(
                        'Correcto',
                        'El administrador se creo correctamente',
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
            $('#crear_admin').trigger("reset");
        });
    });

    //Boton desabilitado

    $('#agregarbtn').attr('disabled',true);

    // Checar password

    $('#repetir_password').on('keyup', function () {
        var password_nuevo = $('#password').val();
        var campo_password = $('#password');
        var campo_repetir_password = $('#repetir_password');
 
        campo_password.removeClass('is-valid is-invalid');
        campo_repetir_password.removeClass('is-valid is-invalid');
        $('#resultado_password').removeClass('valid-feedback invalid-feedback');
 
        // Passwords iguales
        if ($(this).val() == password_nuevo) {
 
            $('#resultado_password').text('Correcto');
            campo_password.addClass('is-valid');
            campo_repetir_password.addClass('is-valid');
            $('#resultado_password').addClass('valid-feedback');

            $('#agregarbtn').attr('disabled',false);
 
        } else { // Passwords distintos
 
            $('#resultado_password').text('Las contraseñas no coinciden');
            campo_password.addClass('is-invalid');
            campo_repetir_password.addClass('is-invalid');
            $('#resultado_password').addClass('invalid-feedback');
            $('#agregarbtn').attr('disabled',true);
        }
 
    });

    // Crear un administrador ----------------------------------------

    
    // Editar un administrador ----------------------------------------------

    // Dar los valores al modal
    $('.editarbtn').on('click',function (){
       $tr = $(this).closest('tr');
       var datos = $tr.children('td').map(function (){
            return $(this).text();
       });

       var id = $(this).attr("data-id");

       $('#usuario').val(datos[0]);
       $('#nombre').val(datos[1]);
       $('#ID_admin').val(id);
    });


    $('#edit_admin').on('submit',function(e){

        e.preventDefault(); //Para que no se vaya a otra ruta
        
        console.log('Click');

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
                        'El administrador se actualizo correctamente',
                        'success'
                    )

                   
                    $("#modal_editar").modal('hide');//ocultamos el modal
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

    // Editar un administrador ----------------------------------------------

    // Borrar un administrador ----------------------------------------------

    $('.borrar_registro').on('click',function(e){
       e.preventDefault(); //Para que no se vaya a otra ruta

        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        
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
                    url: '/proyecto-curso/admin/administradores/eliminar_admin.php',
                    success: function(data){
                        var resultado = JSON.parse(data);
                        if(resultado.respuesta == 'exito'){
                            jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                            swal(
                                'Eliminado',
                                'Tu registro ha sido Eliminado',
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

    // Borrar un administrador ----------------------------------------------

    // Login ----------------------------------------

    $('#form_login').on('submit',function(e){
        e.preventDefault(); //Para que no se vaya a otra ruta
        
        var datos2 = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos2,
            url: $(this).attr('action'),
            dataType: 'json'        
        }).done(function(data){
            var resultado = data;
            if(resultado.respuesta == 'exito'){
                swal(
                    'Login Correcto',
                    'Bienvenid@ '+resultado.usuario+' !!',
                    'success'
                )
                setTimeout(function(){
                    window.location.href = 'admin_area.php';
                },2000);
            }else{
                swal(
                    'Error',
                    'Usuario o password incorrectos',
                    'error'
                )
            }
        });
    });

    // Login ----------------------------------------

});