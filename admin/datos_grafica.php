<?php
include 'funciones/sesiones.php';
include '../includes/funciones/bd_conexion.php';


    $sql = "SELECT fecha_registro, COUNT(*) as total FROM registrados GROUP BY DATE(fecha_registro) ORDER BY fecha_registro ";
    $resultado = $conn->query($sql);
 
    $arreglo_registros = array();
    while( $registrados_dia = $resultado->fetch_assoc()){
       $fecha = $registrados_dia['fecha_registro'];
       $registro['fecha'] = date("Y-m-d",strtotime($fecha));
       $registro['cantidad'] = $registrados_dia['total'];

       $arreglo_registros[] = $registro;
    }

    
    echo json_encode($arreglo_registros);
    
?>