<?php 
        try{
            require_once('includes/funciones/bd_conexion.php');
            $sql="SELECT * from invitados";
            $resultado=$conn->query($sql);
        
        }catch(Exception $e){
            echo $e->getMessage();
        }

    ?>

    <section class="invitados contenedor seccion">
        <h2>Nuestros Invitados</h2>
        <ul class="lista-invitados clearfix">


    <?php
    $lista='';
        while( $invitados = $resultado->fetch_assoc() ) { 
              $lista.='<li>
                        <div class="invitado">
                        <a class="invitado_info" href="#invitado'.$invitados['invitado_id'].'">
                            <img src="admin/img/invitados/'.$invitados['url_imagen'].'" alt="imagen invitado">
                            <p>'.$invitados['nombre_invitado']." ".$invitados['apellido_invitado'].'</p>
                        </a>
                        </div>
                    </li>

                    <div style="display:none;">
                        <div class="invitado_info" id="invitado'.$invitados['invitado_id'].'">
                            <h2>'.$invitados['nombre_invitado']." ".$invitados['apellido_invitado'].'</h2>
                            <img src="admin/img/invitados/'.$invitados['url_imagen'].'" alt="imagen invitado">
                            <p>'.$invitados['descripcion'].'</p>
                        </div>
                    </div>';
                
                ;
        }
        echo $lista;
    ?>
        </ul>
    </section>
    <?php
        $conn->close();
    ?>
