<?php

    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $id = $_POST['ID_admin'];


    try{
        include '../funciones/funciones.php';
        if(empty($_POST['password'])){
            $stmt = $conn->prepare("UPDATE admin SET usuario = ? , nombre = ?, editado = NOW() WHERE ID_admin = ? ");
            $stmt->bind_param("ssi", $usuario, $nombre, $id);
        }else{

            $opciones = array(
                'cost' => 12
            );

            $password_hash = password_hash($password, PASSWORD_BCRYPT, $opciones);
            
            $stmt = $conn->prepare("UPDATE admin SET usuario = ? , nombre = ?, password = ?, editado = NOW() WHERE ID_admin = ? ");
            $stmt->bind_param("sssi", $usuario, $nombre, $password_hash, $id);
        
        }  
           
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

?>