<?php

include '../funciones/funciones.php';

if(isset($_POST['agregar_cat'])){
    
    $nombre_cat = $_POST['cat_evento'];
    $icono = $_POST['icono'];

    try{
        $stmt = $conn->prepare("INSERT INTO categoria_evento (cat_evento,icono) VALUE (?,?)");
        $stmt->bind_param("ss",$nombre_cat,$icono);
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


if(isset($_POST['edit_cat'])){

    $nombre_cat = $_POST['cat_evento'];
    $icono = $_POST['icono'];
    $cat_id = $_POST['cat_id'];

    try{
            $stmt = $conn->prepare("UPDATE categoria_evento SET cat_evento = ? , icono = ?, editado = NOW() WHERE id_categoria = ? ");
            $stmt->bind_param("ssi", $nombre_cat, $icono, $cat_id);
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
        $stmt = $conn->prepare('DELETE FROM categoria_evento where id_categoria = ?');
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