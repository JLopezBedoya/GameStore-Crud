<?php include "./controllers/conexion.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./views/header.php" ?>
    <?php 
    if(isset($_POST['nombreUsuario'])){
    $crear = true;
    $sql = "SELECT nombre, id, pssword FROM usuarios";
    $resultado = mysqli_query($conexion, $sql);
    while ($fila = mysqli_fetch_assoc($resultado)) {
        if($fila["nombre"]==$_POST['nombreUsuario']){
            $crear = false;
        }
    }
    if($crear){
            $nombre = $_POST['nombreUsuario'];
            $password = $_POST['passwordUsuario'];
            $void = serialize([]);
            $sql = "INSERT INTO usuarios (nombre, pssword, compras) VALUES ('$nombre', '$password', '$void')";
            mysqli_query($conexion, $sql);
            echo '<script>
                    window.location.replace("./index.php");
                </script>';
    }
    }
    ?>
</head>
<body>
    <?php include "./views/regnavbar.php" ?>
    <div class="container mt-5">
    <form method="POST" class="col-md-6 offset-3  bg-body-tertiary pt-5" style="border-radius: 50px; height: 400px; border: 5px solid lightpink;">
            <h3 class="pt-5 centrar" >REGISTRARSE</h3>
            <div class="input-group flex-nowrap pt-5 px-5">
                <span class="input-group-text" id="addon-wrapping">Nombre de usuario</span>
                <input name="nombreUsuario" id="nombreUsuario" type="text" class="form-control" placeholder="user" aria-label="Username" aria-describedby="addon-wrapping">
              </div>
              <div class="input-group flex-nowrap pt-3 px-5">
                <span class="input-group-text" id="addon-wrapping">Contraseña</span>
                <input name="passwordUsuario" id="passwordUsuario" type="password" class="form-control" placeholder="password" aria-label="Username" aria-describedby="addon-wrapping">
              </div>
              <input type="submit" class="btn btn-success offset-5 mt-4" value="Crear usuario"/>
        </form>
      </div>
</body>
</html>