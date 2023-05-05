<?php 
    $conexion = new mysqli("localhost", "id20668210_sudo","lk3=kHk>ANIC?#sW","id20668210_storedatabase");
    if($conexion->connect_error){
        die("ERROR AL CONECTARSE ".$conexion->connect_error);
    }
    $sql = "SELECT * FROM juegos";
    $resultado = mysqli_query($conexion, $sql);
?>