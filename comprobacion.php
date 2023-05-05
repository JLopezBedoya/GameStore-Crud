<?php
$conexion = new mysqli("localhost", "id20668210_sudo", "lk3=kHk>ANIC?#sW", "id20668210_storedatabase");
if ($conexion->connect_error) {
  die("ERROR AL CONECTARSE " . $conexion->connect_error);
}
$sql = "SELECT nombre, psswd FROM usuarios WHERE id = 1";
$resultado = mysqli_query($conexion, $sql);
if ($fila = mysqli_fetch_assoc($resultado)) {
  $nombre = $fila["nombre"];
  $contraseña = $fila["psswd"];
}
$username = $_POST['bynombre'];
$pass = $_POST['bypass'];
if ($username == $nombre && $pass == $contraseña ) {
  header("Location: tiendaAdmin.php");
  exit;
}else{
  header("Location: tiendaUser.php");
  exit;
}
?>