<?php
    include "./controllers/conexion.php";
    $ide = $_POST["id"];
    $sql = "SELECT * FROM juegos WHERE id = $ide";
    $mod = mysqli_query($conexion, $sql);
    if ($fila = mysqli_fetch_assoc($mod)) {
      $nombre = $fila["nombre"];
      $precio = $fila["precio"];
      $link = $fila["cover"]; 
    }
    if(isset($_POST["gamename"])){
        $nombre = $_POST['gamename'];
        $precio = $_POST['gameprice'];
        $link = $_POST['gamecover'];
        $id = $_POST['id'];
        $cnsl = "UPDATE juegos SET nombre='$nombre', precio=$precio, cover='$link' WHERE id=$id";
        mysqli_query($conexion, $cnsl);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./views/header.php" ?>
</head>

<body>
    <?php include "./views/adminnavbar.php" ?>
    <div class="container mt-5">
        <div class="row">
            <div class="offset-1 col-5 p-3" style="background-color: azure; height: 500px; border-radius: 30px; border: solid lightseagreen">
                <form method="post">
                    <h2 class="py-4" style="text-align:center;">Actualizar a <?php echo $nombre ?> </h2>
                    <div class="input-group flex-nowrap mt-5 mb-3">
                        <span class="input-group-text" id="addon-wrapping1" style="width:100px;">Nombre</span>
                        <input type="text" id="gamename" name="gamename" class="form-control" placeholder="Name" value="<?php echo $nombre ?>" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping2" style="width:100px;">Precio</span>
                        <input type="number" id="gameprice" name="gameprice" class="form-control" placeholder="Price" value="<?php echo $precio ?>" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping3" style="width:100px;">URL Cover</span>
                        <input type="text" id="gamecover" name="gamecover" class="form-control" placeholder="Cover" value="<?php echo $link ?>" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <input type='hidden' name='id' value="<?php echo $ide; ?>">
                    <button type="submit" class="btn btn-success offset-4 mt-4">Actualizar juego</button>
                </form>
            </div>
            <div class="offset-1 col-5 p-3" style="overflow: hidden; background-color: azure; height: 500px; border-radius: 30px; border: solid lightseagreen">
                <img src="<?php echo $link ?>" style="max-width: 100%; max-height: 100%;" alt="..."/>
            </div>
        </div>
    </div>
</body>

</html>