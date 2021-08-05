
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  
   
  <link rel="stylesheet" href="css/colorbox.css">  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <link rel="stylesheet" href="css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=PT+Sans&display=swap" rel="stylesheet">
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />    
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="index">

  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
          <a href=""><i class="fab fa-pinterest"></i></a>
          <a href=""><i class="fab fa-youtube"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
        </nav>
        <div class="informacion-evento">
          <div class="clearfix">
            <p class="fecha"><i class="far fa-calendar-alt"></i>10-12 Dic</p>
            <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Guadalajara, MX</p>
          </div>
          <h1 class="nombre_sitio">GdlWebCamp</h1>
          <p class="slogan"> La mejor conferencia de <span>diseño web </span></p>
        </div>
      </div>
    </div>
  </header>

  <div class="barra">
    <div class="contenedor clearfix">

      <div class="logo">
        <a href="index.php">
          <img src="img/logo.svg" alt="logo gdlwebcamp">
        </a>
      </div>
      
      <div class="menu_movil">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="navegacion_principal clearfix">
        <a href="conferencia.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>

    </div>
  </div>
  <section class="seccion contenedor"> 
    <h2>La mejor conferencia de diseño web en español</h2>
    <p>
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit veniam repudiandae vitae quisquam quos rerum consectetur saepe at ab ea accusantium placeat reprehenderit dignissimos hic eveniet, et ratione, quaerat laboriosam?
    </p>
  </section>

  <section class="programa">

    <div class="contenedor-video">
      <video autoplay loop poster="img/bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/mp4">
        <source src="video/video.ogv" type="video/mp4"> 
      </video>
    </div>

    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del evento</h2>

                    <nav class="menu-programa">

          <a href="#seminario">
            <i class="fa fa-university" aria-hidden="true"></i>Seminario</a><a href="#conferencia">
            <i class="fa fa-comment" aria-hidden="true"></i>Conferencia</a><a href="#talleres">
            <i class="fa fa-code" aria-hidden="true"></i>Talleres</a><a href="#concurso">
            <i class="fa fa-trophy" aria-hidden="true"></i>Concurso</a>           
            </nav>

    <div id="seminario" class="info-curso ocultar clearfix"><div class="detalle-evento">
                    <h3>Diseño UI y UX para móviles</h3>
                    <p><i class="fa fa-clock"></i>10:00:00</p>
                    <p><i class="fa fa-calendar"></i>2016-12-09</p>
                    <p><i class="fa fa-user"></i>Susan Sanchez</p>
            </div><div class="detalle-evento">
                    <h3>Aprende a Programar en una mañana</h3>
                    <p><i class="fa fa-clock"></i>10:00:00</p>
                    <p><i class="fa fa-calendar"></i>2016-12-10</p>
                    <p><i class="fa fa-user"></i>Gregorio Sanchez</p>
            </div> <a href="calendario.php" class="button float-right">Ver todos</a></div><div id="conferencia" class="info-curso ocultar clearfix"><div class="detalle-evento">
                    <h3>Como ser freelancer</h3>
                    <p><i class="fa fa-clock"></i>10:00:00</p>
                    <p><i class="fa fa-calendar"></i>2016-12-09</p>
                    <p><i class="fa fa-user"></i>Susan Sanchez</p>
            </div><div class="detalle-evento">
                    <h3>Tecnologías del Futuro</h3>
                    <p><i class="fa fa-clock"></i>17:00:00</p>
                    <p><i class="fa fa-calendar"></i>2016-12-09</p>
                    <p><i class="fa fa-user"></i>Rafael Bautista</p>
            </div> <a href="calendario.php" class="button float-right">Ver todos</a></div><div id="talleres" class="info-curso ocultar clearfix"><div class="detalle-evento">
                    <h3>Responsive Web Design</h3>
                    <p><i class="fa fa-clock"></i>10:00:00</p>
                    <p><i class="fa fa-calendar"></i>2016-12-09</p>
                    <p><i class="fa fa-user"></i>Rafael Bautista</p>
            </div><div class="detalle-evento">
                    <h3>Flexbox</h3>
                    <p><i class="fa fa-clock"></i>12:00:00</p>
                    <p><i class="fa fa-calendar"></i>2016-12-09</p>
                    <p><i class="fa fa-user"></i>Shari Herrera</p>
            </div> <a href="calendario.php" class="button float-right">Ver todos</a></div>          
        </div>
      </div>
    </div>
  </section>

  
    <section class="invitados contenedor seccion">
        <h2>Nuestros Invitados</h2>
        <ul class="lista-invitados clearfix">


    <li>
                        <div class="invitado">
                        <a class="invitado_info" href="#invitado1">
                            <img src="admin/img/invitados/invitado1.jpg" alt="imagen invitado">
                            <p>Rafael Bautista</p>
                        </a>
                        </div>
                    </li>

                    <div style="display:none;">
                        <div class="invitado_info" id="invitado1">
                            <h2>Rafael Bautista</h2>
                            <img src="admin/img/invitados/invitado1.jpg" alt="imagen invitado">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div><li>
                        <div class="invitado">
                        <a class="invitado_info" href="#invitado2">
                            <img src="admin/img/invitados/invitado2.jpg" alt="imagen invitado">
                            <p>Shari Herrera</p>
                        </a>
                        </div>
                    </li>

                    <div style="display:none;">
                        <div class="invitado_info" id="invitado2">
                            <h2>Shari Herrera</h2>
                            <img src="admin/img/invitados/invitado2.jpg" alt="imagen invitado">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div><li>
                        <div class="invitado">
                        <a class="invitado_info" href="#invitado3">
                            <img src="admin/img/invitados/invitado3.jpg" alt="imagen invitado">
                            <p>Gregorio Sanchez</p>
                        </a>
                        </div>
                    </li>

                    <div style="display:none;">
                        <div class="invitado_info" id="invitado3">
                            <h2>Gregorio Sanchez</h2>
                            <img src="admin/img/invitados/invitado3.jpg" alt="imagen invitado">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div><li>
                        <div class="invitado">
                        <a class="invitado_info" href="#invitado4">
                            <img src="admin/img/invitados/invitado4.jpg" alt="imagen invitado">
                            <p>Susana Herrera</p>
                        </a>
                        </div>
                    </li>

                    <div style="display:none;">
                        <div class="invitado_info" id="invitado4">
                            <h2>Susana Herrera</h2>
                            <img src="admin/img/invitados/invitado4.jpg" alt="imagen invitado">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div><li>
                        <div class="invitado">
                        <a class="invitado_info" href="#invitado5">
                            <img src="admin/img/invitados/invitado5.jpg" alt="imagen invitado">
                            <p>Harold Garcia</p>
                        </a>
                        </div>
                    </li>

                    <div style="display:none;">
                        <div class="invitado_info" id="invitado5">
                            <h2>Harold Garcia</h2>
                            <img src="admin/img/invitados/invitado5.jpg" alt="imagen invitado">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div><li>
                        <div class="invitado">
                        <a class="invitado_info" href="#invitado6">
                            <img src="admin/img/invitados/invitado6.jpg" alt="imagen invitado">
                            <p>Susan Sanchez</p>
                        </a>
                        </div>
                    </li>

                    <div style="display:none;">
                        <div class="invitado_info" id="invitado6">
                            <h2>Susan Sanchez</h2>
                            <img src="admin/img/invitados/invitado6.jpg" alt="imagen invitado">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div><li>
                        <div class="invitado">
                        <a class="invitado_info" href="#invitado21">
                            <img src="admin/img/invitados/cb343684b3b571361dba24468f92080a.jpg" alt="imagen invitado">
                            <p>Juan Carlos Barriga Martinez</p>
                        </a>
                        </div>
                    </li>

                    <div style="display:none;">
                        <div class="invitado_info" id="invitado21">
                            <h2>Juan Carlos Barriga Martinez</h2>
                            <img src="admin/img/invitados/cb343684b3b571361dba24468f92080a.jpg" alt="imagen invitado">
                            <p>Soy un programador con conocimiento en html, php, js, java ademas se utilizar frameworks como laravel y vuejs.</p>
                        </div>
                    </div>        </ul>
    </section>
      
  <div class="contador parallax">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
        <li><p class="numero"></p>Invitados</li>
        <li><p class="numero"></p>Talleres</li>
        <li><p class="numero"></p>Días</li>
        <li><p class="numero"></p>Conferencias</li>
      </ul>
    </div>
  </div>

  <section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>Pase por día</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todas los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>

        <li>
          <div class="tabla-precio">
            <h3>Todos los dias</h3>
            <p class="numero">$50</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todas los talleres</li>
            </ul>
            <a href="#" class="button">Comprar</a>
          </div>
        </li>

        <li>
          <div class="tabla-precio">
            <h3>Pase por 2 días</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todas los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>

      </ul>
    </div>
  </section>

  <div id="mapa" class="mapa"></div>

  <section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">

      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum neque quod, ex eligendi quia aspernatur corporis iusto perferendis autem similique voluptas earum maiores sequi ipsa dolorum omnis sit? Enim, excepturi.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedos <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div>

      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum neque quod, ex eligendi quia aspernatur corporis iusto perferendis autem similique voluptas earum maiores sequi ipsa dolorum omnis sit? Enim, excepturi.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedos <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div>

      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum neque quod, ex eligendi quia aspernatur corporis iusto perferendis autem similique voluptas earum maiores sequi ipsa dolorum omnis sit? Enim, excepturi.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedos <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div>

    </div>
  </section>
  
  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p>registrate al newsletter:</p>
      <h3>gdlwebcamp</h3>
      <a href="#" class="button transparente">REGISTRO</a>
    </div>
  </div>

  <div class="seccion">
    <h2>Faltan</h2>
    <div class="cuenta_regresiva contenedor">
      <ul class="clearfix">
        <li><p id="dias" class="numero"></p>días</li>
        <li><p id="horas" class="numero"></p>horas</li>
        <li><p id="minutos" class="numero"></p>minutos</li>
        <li><p id="segundos" class="numero"></p>segundos</li>
      </ul>
    </div>
  </div>
  <footer class="site-footer">
    <div class="contenedor clearfix">

      <div class="footer-informacion">
        <h3>Sobre <span>gdlwebcamp</span></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod officiis molestias aliquam at maxime rerum impedit totam nesciunt recusandae quibusdam inventore, earum excepturi nihil, deleniti magni tempore placeat, alias eligendi!</p>
      </div>

      <div class="ultimos-twt">
        <h3>Últimos <span>tweets </span></h3>
        <a class="twitter-timeline" data-height="400" href="https://twitter.com/JUANBM180?ref_src=twsrc%5Etfw">Tweets by JUANBM180</a> 
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>

      <div class="redes-sociales">
        <h3>Redes<span>Sociales</span></h3>
        <nav class="redes-sociales">
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
          <a href=""><i class="fab fa-pinterest"></i></a>
          <a href=""><i class="fab fa-youtube"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
        </nav>
      </div>
    </div>

    <p class="copyright">
      Todos los derechos Reservados GDLWEBCAMP 2020.
    </p>
</footer>

  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js" integrity="sha512-WY7Piz2TwYjkLlgxw9DONwf5ixUOBnL3Go+FSdqRxhKlOqx9F+ee/JsablX84YBPLQzUPJsZvV88s8YOJ4S/UA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js" integrity="sha512-9ex1Kp3S7uKHVZmQ44o5qPV6PnP8/kYp8IpUHLDJ+GZ/qpKAqGgEEH7rhYlM4pTOSs/WyHtPubN2UePKTnTSww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js" integrity="sha512-DAVSi/Ovew9ZRpBgHs6hJ+EMdj1fVKE+csL7mdf9v7tMbzM1i4c/jAvHE8AhcKYazlFl7M8guWuO3lDNzIA48A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/main.js"></script>
  <script src="js/cotizador.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/c7989222b3d59b997ba8a09a6/c7981e73920fbd351bb713057.js");</script>

