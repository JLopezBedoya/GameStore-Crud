<?php
$conexion = new mysqli("localhost", "id20668210_sudo", "lk3=kHk>ANIC?#sW", "id20668210_storedatabase");
if ($conexion->connect_error) {
    die("ERROR AL CONECTARSE " . $conexion->connect_error);
}
$nombre = $_POST['gamename'];
$precio = $_POST['gameprice'];
$link = $_POST['gamecover'];
$id = $_POST['id'];
$cnsl = "UPDATE juegos SET nombre='$nombre', precio=$precio, link='$link' WHERE id=$id";
if (mysqli_query($conexion, $cnsl)) {
      header("Location: bodega.php");
      exit;
} else {
    echo "Error al eliminar el registro: " . mysqli_error($conexion);
}
?>