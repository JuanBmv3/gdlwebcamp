<?php
    $conn = new mysqli('localhost','root','','gdlwebcamp');
    $conn->query("SET NAMES 'utf8' ");

    if($conn ->connect_error){
        echo $error -> $conn -> connect_error;
    }
?>