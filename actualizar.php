<?php 
    $conexion = new mysqli("localhost", "id20668210_sudo", "lk3=kHk>ANIC?#sW", "id20668210_storedatabase");
    if ($conexion->connect_error) {
      die("ERROR AL CONECTARSE " . $conexion->connect_error);
    }
    $ide = $_POST["id"];
    $sql = "SELECT * FROM juegos WHERE id = $ide";
    $resultado = mysqli_query($conexion, $sql);
    if ($fila = mysqli_fetch_assoc($resultado)) {
      $nombre = $fila["nombre"];
      $precio = $fila["precio"];
      $link = $fila["link"]; 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="store.css">
    <title>Modificar</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary" style="border-bottom:4px solid #198754;">
        <div class="container-fluid">
            <a class="navbar-brand">GameStore</a>
            <form class="d-flex" role="search">
                <a href="bodega.php" class="btn btn-outline-primary mx-2">Volver a la bodega</a>
            </form>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="offset-1 col-5 p-3" style="background-color: azure; height: 500px; border-radius: 30px; border: solid lightseagreen">
            <form method="post" action="modificado.php">
            <h2 class="py-4" style="text-align:center;">Actualizar a <?php echo $nombre ?> </h2>
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping1" style="width:100px;">Nombre</span>
                <input type="text" id="gamename" name="gamename" class="form-control" placeholder="Name" value="<?php echo $nombre ?>"aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping2" style="width:100px;">Precio</span>
                <input type="number" id="gameprice" name="gameprice" class="form-control" placeholder="Price" value="<?php echo $precio ?>" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping3" style="width:100px;">URL Cover</span>
                <input type="text" id="gamecover" name="gamecover" class="form-control" placeholder="Cover"value="<?php echo $link ?>" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <input type='hidden' name='id' value="<?php echo $ide; ?>">
            <button type="submit" class="btn btn-success offset-4 mt-4">Actualizar juego</button>
        </form>
        </div>
        <div class="offset-1 col-5 p-3" style="overflow: hidden; background-color: azure; height: 500px; border-radius: 30px; border: solid lightseagreen">
            <img src="<?php echo $link; ?>" style="width: 440px;" />
        </div>
        </div>
    </div>
</body>
</html>