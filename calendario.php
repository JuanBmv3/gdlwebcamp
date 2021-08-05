<?php include_once 'includes/templates/header.php'; ?>

  <section class="seccion contenedor">
    <h2>Calendario de eventos</h2>

    <?php
    try{
        require_once('includes/funciones/bd_conexion.php');
        $sql="SELECT evento_id,nombre_evento,fecha_evento,hora_evento,cat_evento,icono,nombre_invitado,apellido_invitado ";
        $sql.= " FROM eventos E " ;
        $sql.= " INNER JOIN categoria_evento C ";
        $sql.= " ON E.id_cat_evento = C.id_categoria ";
        $sql.= " INNER JOIN invitados I ";
        $sql.= " ON E.id_inv = I.invitado_id ORDER BY evento_id";
        $resultado=$conn->query($sql);
       
    }catch(Exception $e){
        echo $e->getMessage();
    }

    ?>
    <div class="calendario clearfix">
    <?php
    $calendario = array();
        while( $eventos = $resultado->fetch_assoc() ) { 

            $fecha = $eventos['fecha_evento'];

            $evento = array(
                'titulo' => $eventos['nombre_evento'],
                'fecha' => $eventos['fecha_evento'],
                'hora' => $eventos['hora_evento'],
                'categoria' => $eventos['cat_evento'],
                'icono' => 'fa'." ".$eventos['icono'],
                'invitado' => $eventos['nombre_invitado']." ".$eventos['apellido_invitado']
            );

            $calendario[$fecha][] = $evento; // lo agrupa dependiendo del dato en este caso fecha

            
        }
        $info='';
            foreach ($calendario as $dia => $lista_eventos) { // Filtra solo la fecha
              setlocale(LC_TIME, 'spanish');
              echo '<h3><i class="fa fa-calendar"></i> ';
              echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($dia))); // Fecha por dia
              echo '</h3>';
              foreach ($lista_eventos as $evento ) {
                  $info.= '<div class="dia">
                    <p class="titulo">'.$evento['titulo'].'</p>
                    <p class="hora"><i class="fa fa-clock-o" aria-hidden="true"></i> '
                    .$evento['fecha']." ". $evento['hora'].'</p>
                    <p><i class="'.$evento['icono'].'" aria-hidden="true"></i> '
                    .$evento['categoria'].'</p>
                    <p><i class="fa fa-user" aria-hidden="true"></i> '
                    .$evento['invitado'].'</p>
                  </div>';
              }
              echo $info; 
          }
             
     ?>
    
    </div>
    </section>
    <?php
    $conn->close();
    ?>
 

  <?php include_once 'includes/templates/footer.php'; ?>