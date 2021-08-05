<?php
include '../funciones/sesiones.php';
include '../funciones/funciones.php';
include '../templates/header.php';
include '../templates/barra.php';
include '../templates/navegacion.php';
?>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Modal  AUN NO FUNCIONA ..... -->
  <div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Editar Persona Registrada</h4>
                  <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">×</span>
                      <span class="sr-only">Close</span>
                  </button>  
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
              <p class="statusMsg"></p>
              <form method="post" action="modelo_inv.php" name="editar_inv" id="editar_inv" enctype="multipart/form-data">
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
                    <input type="hidden" id="inv_id" name="inv_id">
                    <input type="hidden" name="edit_inv" value="1">
          
                  <!-- Modal Footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary" >Guardar</button>
                  </div>
                  
                </form>
              </div>
          </div>
        </div>
    </div>
  </div>
<!-- Modal -->

<!-- Table -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2>LISTADO DE REGISTRADOS</h2>
                
              </div>
              <!-- /.card-header -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja los registrados en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="lista_admin" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Fecha Registro</th>
                    <th>Articulos</th>
                    <th>Talleres</th>
                    <th>Regalo</th>
                    <th>Compra</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      try {
                          $sql = "SELECT R.*, RE.nombre_regalo FROM registrados R JOIN regalos RE ON R.regalo= RE.ID_regalo";
                          $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }

                      while ($registrados = $resultado->fetch_assoc()) {
                       

                       echo '<tr>
                       <td>'. $registrados['nombre_registrado'].' ';
                       $pagado = $registrados['pagado'];
                       if($pagado){
                           echo '<span class="badge bg-green"> Pagado</span>';
                       }else{
                           echo'<span class="badge bg-red"> No pagado</span>';
                       }
                       echo '</td>
                       <td>'.$registrados['apellido_registrado'].'</td>
                       <td>'.$registrados['email_registrado'].'</td>
                       <td>'.$registrados['fecha_registro'].'</td>
                       <td>';
                            $articulos = json_decode($registrados['pases_articulos'],true); // de json a objeto
            
                            $arreglo_articulos = array(
                                'un_dia' => 'Pase 1 día',
                                'pase_2dias' => 'Pase 2 días',
                                'pase_completo' => 'Pase completo',
                                'camisas' => 'Camisas',
                                'etiquetas' => 'Etiquetas',
                                
                            );
                            foreach ($articulos as $key => $articulo  ) {
                                  if(is_array($articulo) && array_key_exists('cantidad', $articulo )){
                                    echo $articulo['cantidad']." ".$arreglo_articulos[$key]."<br>";
                                  }else{
                                    echo $articulo." ".$arreglo_articulos[$key]."<br>";
                                  }
                                 
                            }
                      
                       echo '</td>
                        <td>';
                            $eventos = $registrados['talleres_registrados'];
                            $talleres = json_decode($eventos,true);
                            $talleres = implode ("', '", $talleres['eventos']);
   
                            $sql_talleres = "SELECT nombre_evento,fecha_evento, hora_evento from eventos WHERE evento_id IN ('$talleres')";
                            
                            $resultado_talleres = $conn->query($sql_talleres);

                            while ($eventos = $resultado_talleres->fetch_assoc()) {
                                echo '<li style="list-style:none;" > '.$eventos['nombre_evento']. " ". $eventos['fecha_evento']." ". $eventos['hora_evento']. '</li>'; 
                            }
                        echo '</td>
                       <td>'.$registrados['nombre_regalo'].'</td>
                       <td>'.$registrados['total_pagado'].'</td>
                       <td>
                            <a style="color:white!important;" data-toggle="modal" data-id="'.$registrados['ID_Registrado'].'" data-target="#modal_editar" class="btn btn-app bg-orange editarbtn_reg">
                              <i class="fas fa-edit"></i> Editar
                            </a>

                            <a href="#" data-id="'.$registrados['ID_Registrado'].'" class="btn btn-app bg-red borrar_reg">
                              <i class="fas fa-trash"></i> Borrar
                            </a>
                        </td>';
                      }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Fecha Registro</th>
                    <th>Articulos</th>
                    <th>Talleres</th>
                    <th>Regalo</th>
                    <th>Compra</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
<!-- Table -->

  </div>
  <!-- /.content-wrapper -->
 
<?php include '../templates/footer.php'; ?>
 