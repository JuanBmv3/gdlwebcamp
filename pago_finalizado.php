<?php
include_once 'includes/templates/header.php';

use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;
require 'includes/config.php';
?>
<section class="seccion contenedor">
<h2>Resumen Registro</h2>
<?php
    $paymentId = $_GET['paymentId'];
    $pago = Payment::get($paymentId,$apiContext);
    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);

    $resultado = $pago -> execute($execution, $apiContext);
    $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;

    
    
    if($respuesta == "completed"){
        echo "<div class='resultado correcto'>";
        
        $id_pago = $_GET['id_pago'];
        echo "El pago se realizado correctamente <br>";
        echo "El Id del pago es {$paymentId}";
        echo "</div>";

        require_once('includes/funciones/bd_conexion.php');
        $stmt = $conn->prepare('UPDATE registrados SET pagado = ? where ID_registrado = ?');
        $pagado = 1;
        $stmt->bind_param('ii',$pagado, $id_pago);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }else{
        echo "<div class='resultado error'>";
        echo "El pago no se realizo";
        echo "</div>";
    }
    
?>
           
 </section>
<?php
include_once 'includes/templates/footer.php';
?>