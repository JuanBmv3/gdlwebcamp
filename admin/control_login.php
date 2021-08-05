<?php

if(isset($_POST['login_admin'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

 
    try {
        include_once '../includes/funciones/bd_conexion.php';
        $stmt = $conn->prepare("SELECT * FROM admin WHERE usuario = ?;");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $editado);
        if($stmt->affected_rows) {
           
            $existe = $stmt->fetch();
            if($existe) {
                
                if(password_verify($password, $password_admin)){
                    session_start();
                    $_SESSION['usuario'] = $usuario_admin;
                    $_SESSION['nombre'] = $nombre_admin;
                    $respuesta = array(
                        'respuesta' => 'exito',
                        'usuario' => $nombre_admin
                    );
                } else {
                    $respuesta = array(
                        'respuesta' => 'password_incorrecto'
                    );
                    
                }
            } else {
                $respuesta = array(
                    'respuesta' => 'no_existe'
                );
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    die(json_encode($respuesta));
}

?>