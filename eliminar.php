<?php 
$conexion = new mysqli("localhost", "id20668210_sudo","lk3=kHk>ANIC?#sW","id20668210_storedatabase");
if($conexion->connect_error){
    die("ERROR AL CONECTARSE ".$conexion->connect_error);
}
$id = $_POST["id"];
$sql = "DELETE FROM juegos WHERE id = $id";
if(mysqli_query($conexion, $sql)){
      header("Location: bodega.php");
      exit;
} else {
    echo "Error al eliminar el registro: " . mysqli_error($conexion);
}
?>