<?php
include '../funciones/sesiones.php';
include '../funciones/funciones.php';
include '../templates/header.php';
include '../templates/barra.php';
include '../templates/navegacion.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SECCIÓN PARA REGISTRAR UNA PERSONA</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Agregar persona</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="modelo_reg.php" name="crear_reg" id="crear_reg">
            <div class="card-body">
              <div class="form-group">
                <label for="nombre_evento">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
              </div>

              <div class="form-group">
                <label for="nombre_evento">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
              </div>

              <div class="form-group">
                <label for="nombre_evento">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>

                <div class="form-group">
                    <div id="paquetes" class="paquetes">
                        <div class="box-header with-border">
                            <h3 class="box-title">Elige el número de boletos</h3>
                        </div>
                        <ul class="lista-precios clearfix row">
                            <li class="col-md-4">
                            <div class="tabla-precio text-center">
                                <h3>Pase por día  (VIERNES)</h3>
                                <p class="numero">$30</p>
                                <ul>
                                <li>Bocadillos Gratis</li>
                                <li>Todas las conferencias</li>
                                <li>Todas los talleres</li>
                                </ul>
                                <div class="orden">
                                    <label for="pase_dia">Boletos deseados:</label>
                                    <input type="number" class="form-control" min="0" id="pase_dia" name="boletos[un_dia][cantidad]" size="3" placeholder="0">
                                    <input type="hidden" value="30" name="boletos[un_dia][precio]">
                                </div>
                            </div>
                            </li>
                    
                            <li class="col-md-4">
                            <div class="tabla-precio text-center">
                                <h3>Todos los dias</h3>
                                <p class="numero">$50</p>
                                <ul>
                                <li>Bocadillos Gratis</li>
                                <li>Todas las conferencias</li>
                                <li>Todas los talleres</li>
                                </ul>
                                <label for="pase_completo">Boletos deseados:</label>
                                    <input type="number" class="form-control"  min="0" id="pase_completo" name="boletos[completo][cantidad]" size="3" placeholder="0">
                                    <input type="hidden" value="50" name="boletos[completo][precio]">
                                </div>
                            </li>
                    
                            <li class="col-md-4">
                                <div class="tabla-precio text-center">
                                    <h3>Pase por 2 días (VIERNES y SÁBADO)</h3>
                                    <p class="numero">$45</p>
                                    <ul>
                                    <li>Bocadillos Gratis</li>
                                    <li>Todas las conferencias</li>
                                    <li>Todas los talleres</li>
                                    </ul>
                                    <label for="pase_2dias">Boletos deseados:</label>
                                        <input type="number" class="form-control"  min="0" id="pase_2dias" name="boletos[2dias][cantidad]" size="3" placeholder="0">
                                        <input type="hidden" value="45" name="boletos[2dias][precio]">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Elige los talleres</h3>
                        </div>
                        <div id="eventos" class="eventos clearfix">
                           
                            <div class="caja ">
                                <?php
                                    try {
                                    
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
                                            <h4 class="text-center nombre_dia">'.$dia.'</h4>
                                            <div class="row ">';
                                        foreach ($evento['eventos'] as $tipo => $evento_dia) {
                                            
                                            echo '<div class="col-md-4"> 
                                                <p class="tipo_conf">'.$tipo.'</p>'; // Con radio solo eliges uno, con checkbox eliges los que quieras 
                                            
                                                foreach ($evento_dia as $info){
                                                    
                                                    echo '<li style="list-style:none;">
                                                    <label>
                                                        <input type="checkbox" name="registro_evento[]" id="'.$info['id'].'" value="'.$info['id'].'">
                                                        <time>'.$info['hora'].' </time>'.$info['nombre_evento'].'
                                                        </br>
                                                        <span class="invitado_bd">- '.$info['nombre_invitado'].' '.$info['apellido_invitado'].'</span>
                                                    </label>
                                                    </li>';
                                                    
                                                }
                                            echo '</div>';
                                        }    
                                    echo '</div>
                                    </div>';
                                    }
                                
                                ?>
                            </div>
                            <div id="resumen" class="resumen">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Pagos y Extras</h3>
                                    </div>
                                    <br>
                                    <div class="caja clearfix row">
                                        <div class="extras col-md-6">
                                            <div class="orden">
                                                <label for="camisa_evento">Camisa del evento $10 <small>(promocion 7% dto.)</small></label>
                                                <input type="number" class="form-control" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0">
                                                <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                                            </div>
                                            <div class="orden">
                                                <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small></label>
                                                <input type="number" class="form-control" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0">
                                                <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">                   
                                            </div>
                                            <div class="orden">
                                                <label for="regalo">Seleccione un regalo</label> <br>
                                                <select id="regalo" name="regalo" required class="form-control select2">
                                                    <option selected="selected" disabled="disabled">-- Selecciona un regalo --</option>
                                                    <option value="2"> Etiquetas </option>
                                                    <option value="1"> Pulseras </option>
                                                    <option value="3"> Plumas </option>
                                                </select>
                                            </div>
                                            <br>
                                            <input type="button" id="calcular" class=" btn btn-success" value="Calcular" >
                                            
                                        </div>

                                        <div class="total col-md-6">
                                            <p>Resumen:</p>
                                            <div id="lista_productos">

                                            </div>
                                            <p>Total:</p>
                                            <div id="suma_total">
                                    </div>
                                    <input type="hidden" name="total_pedido" id="total_pedido">
                                </div>

                            </div><!--.caja-->
                        </div> <!--#eventos-->
                    </div>
                </div>
    
                <div>
                <br>
                    
                    <input type="hidden" name="agregar_reg" value="1">
                    <button type="submit" class="btn btn-primary" id="btnRegistro" >Añadir</button>
                </div>
            </div>
        </form>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include '../templates/footer.php'; ?>
 