<?php

include '../funciones/funciones.php';

if(isset($_POST['agregar_inv'])){
    
    $nombre_inv = $_POST['nombre_inv'];
    $apellido_inv = $_POST['apellido_inv'];
    $biografia_inv = $_POST['biografia_inv'];
    

    $directorio = "../img/invitados/";

    /*
    if(is_dir($directorio)){  // si no esta el directorio que lo realice.
        mkdir($directorio, 0755, true); // los permisos y recursivo.
    }
    */

    

    if(move_uploaded_file($_FILES['imagen_inv']['tmp_name'], $directorio . $_FILES['imagen_inv']['name'])){
        $imagen_url = $_FILES['imagen_inv']['name'];
        $imagen_resultado = "Se subió correctamente";
    }else{
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try{
        $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUE (?,?,?,?)");
        $stmt->bind_param("ssss",$nombre_inv,$apellido_inv,$biografia_inv,$imagen_url);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        if($id_registro > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_registro,
                'resultado_imagen' => $imagen_resultado
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


if(isset($_POST['edit_inv'])){

    
    $nombre_inv = $_POST['nombre_inv'];
    $apellido_inv = $_POST['apellido_inv'];
    $biografia_inv = $_POST['biografia_inv'];
    $id_registro = $_POST['inv_id'];

    $directorio = "../img/invitados/";

   

    try{    
        if($_FILES['imagen_inv']['size'] != 0){
            if(move_uploaded_file($_FILES['imagen_inv']['tmp_name'], $directorio . $_FILES['imagen_inv']['name'])){
                $imagen_url = $_FILES['imagen_inv']['name'];
                $imagen_resultado = "Se subió correctamente";
            }else{
                $respuesta = array(
                    'respuesta' => error_get_last()
                );
            }
            $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado = ? , apellido_invitado = ?, descripcion = ?, url_imagen = ?, editado = NOW() WHERE invitado_id = ? ");
            $stmt->bind_param("ssssi", $nombre_inv,$apellido_inv,$biografia_inv,$imagen_url,$id_registro);
        }else{
            $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado = ? , apellido_invitado = ?, descripcion = ?, editado = NOW() WHERE invitado_id = ? ");
            $stmt->bind_param("sssi", $nombre_inv,$apellido_inv,$biografia_inv,$id_registro);
            $_FILES['imagen_inv']['error'] = 0;
        }
           
            $estado = $stmt->execute();
            
            if($estado = true){
                $respuesta = array(
                    'respuesta' => 'exito'
                );
                die(json_encode($respuesta)); 
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

        // borra la imagen en el servidor

        //La consulta va antes del $stmt que borra al usuario o no habrá datos para obtener
        $imagen = $conn->prepare('SELECT url_imagen FROM invitados WHERE invitado_id = ?');
        $imagen->bind_param("i", $id_borrar);
        $imagen->execute();
        $imagen->bind_result($eliminarImagen);
        $imagen->fetch();

        //el Texto de $ruta lo cambias por donde sea que estén alojadas las imágenes
        $ruta = '../img/invitados/' . $eliminarImagen;

        if(file_exists($ruta)){ //primero verifica que dicho archivo exista
            $eliminado = unlink($ruta); //de existir, lo borre
        }

        //si no cierras la consulta, no te va a funcionar el $stmt que borra los datos del invitado en la base
        $imagen->close();


        
    try {
        $stmt = $conn->prepare('DELETE FROM invitados where invitado_id = ?');
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