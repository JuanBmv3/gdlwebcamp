<?php include_once 'includes/templates/header.php'; ?>

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

          <?php
    try{
        require_once('includes/funciones/bd_conexion.php');
        $sql="SELECT * FROM categoria_evento";
        $resultado=$conn->query($sql);
       
    }catch(Exception $e){
        echo $e->getMessage();
    }

    ?>
          <nav class="menu-programa">

          <?php /* TITULOS DE LAS CATEGORIAS */
          $programas='';
          while($cat = $resultado -> fetch_array(MYSQLI_ASSOC)){
            $categoria = $cat['cat_evento'];
            $programas.='<a href="#'.strtolower($categoria).'">
            <i class="fa '.$cat['icono'].'" aria-hidden="true"></i>'.$categoria.'</a>';
          }
          echo $programas;
          
          ?>           
            </nav>

    <?php /* INFORMACION DE LAS CATEGORIAS */
        try{
            require_once('includes/funciones/bd_conexion.php');
            
            $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                $sql .= "FROM eventos ";
                $sql .= "INNER JOIN categoria_evento ";
                $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= "INNER JOIN invitados ";
                $sql .= "ON eventos.id_inv = invitados.invitado_id ";
                $sql .= "AND eventos.id_cat_evento = 1 ";
                $sql .= "ORDER BY evento_id LIMIT 2; ";

                
                $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                $sql .= "FROM eventos ";
                $sql .= "INNER JOIN categoria_evento ";
                $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= "INNER JOIN invitados ";
                $sql .= "ON eventos.id_inv = invitados.invitado_id ";
                $sql .= "AND eventos.id_cat_evento = 2 ";
                $sql .= "ORDER BY evento_id LIMIT 2; ";

                $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                $sql .= "FROM eventos ";
                $sql .= "INNER JOIN categoria_evento ";
                $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= "INNER JOIN invitados ";
                $sql .= "ON eventos.id_inv = invitados.invitado_id ";
                $sql .= "AND eventos.id_cat_evento = 3 ";
                $sql .= "ORDER BY evento_id LIMIT 2; ";
          
        }catch(Exception $e){
            echo $e->getMessage();
        }

        $conn->multi_query($sql);
        $i=0;
        do {
          
          $resultado = $conn->store_result();
          $row = $resultado->fetch_all(MYSQLI_ASSOC);
          foreach($row as $evento):
            
          if($i % 2 == 0){
            echo '<div id="'.strtolower($evento['cat_evento']).'" class="info-curso ocultar clearfix">'; /* Realiza la separacion por id */
            
          }
          echo '<div class="detalle-evento">
                    <h3>'.mb_convert_encoding($evento["nombre_evento"],'UTF-8').'</h3>
                    <p><i class="fa fa-clock"></i>'.$evento['hora_evento'].'</p>
                    <p><i class="fa fa-calendar"></i>'.$evento['fecha_evento'].'</p>
                    <p><i class="fa fa-user"></i>'.$evento['nombre_invitado'].' '.$evento['apellido_invitado'].'</p>
            </div>';
           
          if($i % 2 == 1):
           echo' <a href="calendario.php" class="button float-right">Ver todos</a>';
          echo '</div>';
          endif;
          $i++;
          endforeach;
          
        $resultado->free();

        } while ($conn->more_results() && $conn->next_result());
    ?>
          
        </div>
      </div>
    </div>
  </section>

  <?php include_once 'includes/templates/invitados.php'; ?>
  
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
      <p>Registrate al newsletter:</p>
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
  <?php include_once 'includes/templates/footer.php'; ?>
 

  
