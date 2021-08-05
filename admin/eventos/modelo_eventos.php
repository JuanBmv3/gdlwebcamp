<?php

include '../funciones/funciones.php';

if(isset($_POST['agregar_evento'])){
    
    $nombre_evento = $_POST['nombre_evento'];
    $categoria_id = $_POST['categoria_evento'];
    $fecha_evento = $_POST['fecha_evento'];
    $invitado_id = $_POST['ponente_evento'];
    $hora =$_POST['hora_evento'];
    $hora_formateada = date('H:i:s', strtotime($hora));

    try{
        $stmt = $conn->prepare("INSERT INTO eventos (nombre_evento,fecha_evento,hora_evento,id_cat_evento,id_inv) VALUE (?,?,?,?,?)");
        $stmt->bind_param("sssii",$nombre_evento,$fecha_evento,$hora_formateada,$categoria_id,$invitado_id);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        if($id_registro > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_evento' => $id_registro
            );
            
        }else{
            $respuesta = array(
                'respuesta' => $stmt -> error
            );
        }
        $stmt->close();
        $conn->close();
    }catch(Exception $e){
        echo "Error:" . $e->getMessage();
    }

    die(json_encode($respuesta));
}

if(isset($_POST['editar_evento'])){



    $evento_id = $_POST['evento_id'];
    $nombre_evento = $_POST['nombre_evento'];
    $fecha_evento = $_POST['fecha_evento'];
    $hora = $_POST['hora_evento'];
    $id_cat_evento = $_POST['categoria_evento'];
    $id_inv = $_POST['ponente_evento'];



    $hora_formateada = date('H:i:s', strtotime($hora));

    try{
            $stmt = $conn->prepare("UPDATE eventos SET nombre_evento = ? , fecha_evento = ?, 
            hora_evento = ? , id_cat_evento = ? , id_inv = ?, editado = NOW() WHERE evento_id = ? ");
            $stmt->bind_param("sssiii", $nombre_evento,$fecha_evento,$hora_formateada,$id_cat_evento,$id_inv,$evento_id);
            $stmt->execute();
            if($stmt->affected_rows){
                $respuesta = array(
                    'respuesta' => 'exito'
                );
                
            }else{
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            $stmt->close();
            $conn->close();
        }catch(Exception $e){
            echo "Error:" . $e->getMessage();
        }

    die(json_encode($respuesta));   
}

if($_POST['registro'] == 'eliminar'){

    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM eventos where evento_id = ?');
        $stmt->bind_param("i", $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        }else{
            $respuesta = array(
                'respuesta'=> 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta'=> $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}

?>