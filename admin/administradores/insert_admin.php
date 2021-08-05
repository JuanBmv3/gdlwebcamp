<?php



if(isset($_POST['agregar_admin'])){
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    

    $opciones = array(
        'cost' => 12
    );

    $password_hash = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try{
        include '../funciones/funciones.php';
        $stmt = $conn->prepare("INSERT INTO admin (usuario,nombre,password) VALUE (?,?,?)");
        $stmt->bind_param("sss",$usuario, $nombre, $password_hash);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        if($id_registro > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_admin' => $id_registro
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

?>