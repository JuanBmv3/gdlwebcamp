$(function(){

    //Programa de Conferencias
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');
    
    $('.menu-programa a').on('click',function(){
        $('.menu-programa a').removeClass('activo')
        $(this).addClass('activo');
        $('.ocultar').hide();
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);
        
        return false;
    });

    //Menu Fijo
    var windowHeight = $(window).height();
    var barraAltura = $('.barra').innerHeight();


    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll > windowHeight){
            $('.barra').addClass('fixed');
            $('body').css({'margin-top': barraAltura+'px'});
        }else{
            $('.barra').removeClass('fixed');
            $('body').css({'margin-top': '0px'});
        }
        

    });


    // Animacion Titulo
    $('.nombre_sitio').lettering();

    //Menu movil

    $('.menu_movil').on('click', function(){
        $('.navegacion_principal').slideToggle();
        $('.navegacion_principal').show();

    });

    $(window).resize(function() {
        var windowWidth = $(".barra").width();
        if (windowWidth > 755) {
          $(".navegacion_principal").css({ display: "block" });
        } else {
          $(".navegacion_principal").css({ display: "none" });
        }
      });

    //Animaciones para los numeros
    $('.resumen-evento li:nth-child(1) p').animateNumber({number : 6}, 1200) // en base al orden que fueron escritor
    $('.resumen-evento li:nth-child(2) p').animateNumber({number : 15}, 1200)
    $('.resumen-evento li:nth-child(3) p').animateNumber({number : 3}, 1500)
    $('.resumen-evento li:nth-child(4) p').animateNumber({number : 9}, 1400)

    //Regresiva

    $('.cuenta_regresiva').countdown('2021/02/18 09:00:00', function(e){
        $('#dias').html(e.strftime('%D'));
        $('#horas').html(e.strftime('%H'));
        $('#minutos').html(e.strftime('%M'));
        $('#segundos').html(e.strftime('%S'));
    });

    //Colorbox

    $('.invitado_info').colorbox({inline:true, width:"50%"});

    // Cambiar color en el menu

    $('body.conferencia .navegacion_principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion_principal a:contains("Calendario")').addClass('activo');
    $('body.invitados .navegacion_principal a:contains("Invitados")').addClass('activo');
    
});