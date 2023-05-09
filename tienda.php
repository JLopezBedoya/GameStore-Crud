<?php include "./controllers/conexion.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./views/header.php" ?>
</head>
<body>
    <?php 
    if( $_SESSION['usuario'] == 1){
        include "./views/adminnavbar.php";
    }else if($_SESSION['usuario'] > 1){
        include "./views/usernavbar.php";
    }else{
        include "./views/unknavbar.php";
    } 
    if(isset($_POST["agregar"])){
        $_SESSION["carrito"][] = $_POST["agregar"];
    }
    ?>
    <div class="container mt-4 py-3" style="background-color: lightcyan; border-radius: 50px ;border:solid 5px skyblue;">
        <div class="row offset-1">
        <?php while ($fila = mysqli_fetch_assoc($resultado)) {
          echo "<div class='card col-md-3 mx-2 mb-3' style='width: 18rem;'>
            <div class='m-3' style='width:230px; height:270px;'><img style='max-width: 100%; max-height: 100%;' src='".$fila["cover"]."' class='card-img-top' alt='...'/></div>
            <div class='card-body'>
                <h5 class='card-title centrar'>".$fila["nombre"]."</h5>
                <p class='card-text centrar'>".$fila["precio"]."</p>
                <form method='post' class='btn btn-success offset-4'>
                    <input type='hidden' name='agregar' value='".$fila["id"]."'>
                    <button style='border: none;background-color: transparent;color: inherit;padding: 0;font-size: inherit;'>Al carrito</button>
                </form>
            </div>
          </div>";
          }
          ?>
        </div>
    </div>
</body>
</html>