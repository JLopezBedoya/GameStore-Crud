<?php  
    session_start();
    $conexion = new mysqli("localhost", "id20724056_admin", "@1PassGameStore1@", "id20724056_gamesstore");
if ($conexion->connect_error) {
  die("ERROR AL CONECTARSE " . $conexion->connect_error);
}
    $sql = "SELECT * FROM juegos";
    $resultado = mysqli_query($conexion, $sql);
    if(!isset( $_SESSION['usuario'])){
         $_SESSION['usuario'] = 0;
    }
?>