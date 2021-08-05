<?php include_once 'includes/templates/header.php'; ?>

  <section class="seccion contenedor">
      <h2>Registro de Usuarios</h2>
      <form class="registro" id="registro" action="pagar.php" method="post">
          <div id="datos_usuario" class="registro caja clearfix">
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre">
                </div>
                <div class="campo">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido">
                </div>
                <div class="campo">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Tu Email">
                </div>
                <div id="error"></div>
          </div>

          <div id="paquetes" class="paquetes">
              <h3>Elige el número de boletos</h3>
              <ul class="lista-precios clearfix">
                <li>
                  <div class="tabla-precio">
                    <h3>Pase por día  (VIERNES)</h3>
                    <p class="numero">$30</p>
                    <ul>
                      <li>Bocadillos Gratis</li>
                      <li>Todas las conferencias</li>
                      <li>Todas los talleres</li>
                    </ul>
                    <div class="orden">
                        <label for="pase_dia">Boletos deseados:</label>
                        <input type="number" min="0" id="pase_dia" name="boletos[un_dia][cantidad]" size="3" placeholder="0">
                        <input type="hidden" value="30" name="boletos[un_dia][precio]">
                    </div>
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
                    <label for="pase_completo">Boletos deseados:</label>
                        <input type="number" min="0" id="pase_completo" name="boletos[completo][cantidad]" size="3" placeholder="0">
                        <input type="hidden" value="50" name="boletos[completo][precio]">
                    </div>
                </li>
        
                <li>
                  <div class="tabla-precio">
                    <h3>Pase por 2 días (VIERNES y SÁBADO)</h3>
                    <p class="numero">$45</p>
                    <ul>
                      <li>Bocadillos Gratis</li>
                      <li>Todas las conferencias</li>
                      <li>Todas los talleres</li>
                    </ul>
                    <label for="pase_2dias">Boletos deseados:</label>
                        <input type="number" min="0" id="pase_2dias" name="boletos[2dias][cantidad]" size="3" placeholder="0">
                        <input type="hidden" value="45" name="boletos[2dias][precio]">
                    </div>
                </li>
              </ul>
          </div>

          <div id="eventos" class="eventos clearfix">
            <h3>Elige tus talleres</h3>
            <div class="caja">
                <?php
                    try {
                        require_once('includes/funciones/bd_conexion.php');
                        $sql = "SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado  ";
                        $sql .= " FROM eventos ";
                        $sql .= " JOIN categoria_evento ";
                        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                        $sql .= " JOIN invitados ";
                        $sql .= " ON eventos.id_inv=invitados.invitado_id ";
                        $sql .= " ORDER BY eventos.fecha_evento , eventos.id_cat_evento, eventos.hora_evento";
                        
                        $resultado = $conn->query($sql);
                    } catch (Exception $th) {
                        echo $th->getMessage();
                    }
                    
                    $eventos_dias = array();
                
                    while ($eventos = $resultado->fetch_assoc()) {
    
                        $fecha = $eventos['fecha_evento'];
                        // para convertir de una fecha numerica a dia strftime
                        //traducir los dias
                        setlocale(LC_ALL, 'es-ES'); 
                        $dia_semana = utf8_encode(strftime("%A", strtotime($fecha)));

                        $categoria = $eventos['cat_evento'];

                        $dia = array(
                            'nombre_evento' => $eventos['nombre_evento'],
                            'hora' => $eventos['hora_evento'],
                            'id' => $eventos['evento_id'],
                            'nombre_invitado' => $eventos['nombre_invitado'],
                            'apellido_invitado' => $eventos['apellido_invitado']
                            
                        );
                        $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
                    }
                ?>
                
                <?php 
                
                    foreach ($eventos_dias as $dia => $evento) {
                        

                    echo'<div id="'. str_replace('á', 'a', $dia) .'" class="contenido-dia clearfix">
                            <h4>'.$dia.'</h4>';

                        foreach ($evento['eventos'] as $tipo => $evento_dia) {
                            
                            echo '<div>
                                <p>'.$tipo.'</p>'; // Con radio solo eliges uno, con checkbox eliges los que quieras 
                               
                                foreach ($evento_dia as $info){
                                    echo '<label>
                                        <input type="checkbox" name="registro[]" id="'.$info['id'].'" value="'.$info['id'].'">
                                        <time>'.$info['hora'].' </time>'.$info['nombre_evento'].'
                                        </br>
                                        <span class="invitado_bd">'.$info['nombre_invitado'].' '.$info['apellido_invitado'].'</span>
                                    </label>';
                                }
                            echo '</div>';
                        }    
                    echo '</div>';
                    }
                
                ?>
                    
              </div><!--.caja-->
          </div> <!--#eventos-->

        <div id="resumen" class="resumen">
            <h3>Pago y Extras</h3>
            <div class="caja clearfix">
                <div class="extras">
                    <div class="orden">
                        <label for="camisa_evento">Camisa del evento $10 <small>(promocion 7% dto.)</small></label>
                        <input type="number" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0">
                        <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                    </div>
                    <div class="orden">
                        <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small></label>
                        <input type="number" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0">
                        <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">                   
                    </div>
                    <div class="orden">
                        <label for="regalo">Seleccione un regalo</label> <br>
                        <select id="regalo" name="regalo" required>
                            <option value="">- Seleccione un regalo -</option>
                            <option value="2"> Etiquetas </option>
                            <option value="1"> Pulseras </option>
                            <option value="3"> Plumas </option>
                        </select>
                    </div>

                    <input type="button" id="calcular" class="button" value="Calcular" >
                
                </div>

                <div class="total">
                    <p>Resumen:</p>
                    <div id="lista_productos">

                    </div>
                    <p>Total:</p>
                    <div id="suma_total">

                    </div>
                    <input type="hidden" name="total_pedido" id="total_pedido">
                    <input id="btnRegistro" type="submit" name="submit" class="button" value="Pagar">
                </div>
            </div>
        </div>

      </form>
  </section>

  <?php include_once 'includes/templates/footer.php'; ?>