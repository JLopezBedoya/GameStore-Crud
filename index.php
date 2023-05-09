<?php include "./controllers/conexion.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./views/header.php" ?>
    <?php 
    $_SESSION['usuario'] = 0;
    $_SESSION['carrito'] = [];
    if(isset($_POST['nombreUsuario'])){
    $sql = "SELECT nombre, id, pssword FROM usuarios";
    $resultado = mysqli_query($conexion, $sql);
    while ($fila = mysqli_fetch_assoc($resultado)) {
        if($fila["nombre"]==$_POST['nombreUsuario'] && $fila["pssword"]==$_POST['passwordUsuario']){
            $_SESSION['usuario'] = $fila["id"];
            echo '<script>
                    window.location.replace("./tienda.php");
                </script>';

        }
    }
    }
?>
</head>
<body>
    <?php include "./views/lognavbar.php" ?>
    <div class="container mt-5">
    <form method="POST" class="col-md-6 offset-3  bg-body-tertiary pt-5" id="login">
            <h3 class="pt-5 centrar" >INICIAR SESION</h3>
            <div class="input-group flex-nowrap pt-5 px-5">
                <span class="input-group-text" id="addon-wrapping">Nombre de usuario</span>
                <input name="nombreUsuario" id="nombreUsuario" type="text" class="form-control" placeholder="user" aria-label="Username" aria-describedby="addon-wrapping">
              </div>
              <div class="input-group flex-nowrap pt-3 px-5">
                <span class="input-group-text" id="addon-wrapping">Contraseña</span>
                <input name="passwordUsuario" id="passwordUsuario" type="password" class="form-control" placeholder="password" aria-label="Username" aria-describedby="addon-wrapping">
              </div>
              <input type="submit" class="btn btn-success offset-5 mt-4"/>
        </form>
      </div>
</body>
</html>