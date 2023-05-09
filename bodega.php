<?php include "./controllers/conexion.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./views/header.php" ?>
        <?php     
        if(isset($_POST['gamename'])){
            $nombre = $_POST['gamename'];
            $precio = $_POST['gameprice'];
            $link = $_POST['gamecover'];
            $sql = "INSERT INTO juegos (nombre, precio, cover) VALUES ('$nombre', $precio, '$link')";
            mysqli_query($conexion, $sql);
            echo '<script>
                    window.location.replace("./bodega.php");
                </script>';
        }
         if(isset($_POST['borrar'])){
             $iden=$_POST['borrar'];
             $sql = "DELETE FROM juegos WHERE id = $iden";
            mysqli_query($conexion, $sql);
            echo '<script>
                window.location.replace("./bodega.php");
            </script>';
         }
    ?>
</head>

<body>
    <?php include "./views/adminnavbar.php" ?>

    <div class="container mt-5" style="background-color: azure; border-radius:50px; border: solid 5px crimson; height: 470px;">
        <div class="row py-3">
            <div class="col-md-4">
                <form method="post">
                    <h2 class="py-4" style="text-align:center;">Añadir un juego</h2>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping1" style="width:100px;">Nombre</span>
                        <input type="text" id="gamename" name="gamename" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping2" style="width:100px;">Precio</span>
                        <input type="number" id="gameprice" name="gameprice" class="form-control" placeholder="Price" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping3" style="width:100px;">URL Cover</span>
                        <input type="text" id="gamecover" name="gamecover" class="form-control" placeholder="Cover" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <button type="submit" class="btn btn-success offset-4 mt-4">Añadir Juego</button>
                </form>
            </div>
            <div class="col-md-8 py-4 bodega" style="overflow-y: scroll; height: 400px;scrollbar-width: none;">
                <table class="table table-striped centrar">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>cover</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo '<tr>
                            <td>'.$fila["id"].'</td>
                            <td>'.$fila["nombre"].'</td>
                            <td>$'.$fila["precio"].'</td>
                            <td><img src="'.$fila["cover"].'" style="width:65px"/></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <form method="post" action="actualizar.php" class="btn btn-success">
                                        <input type="hidden" name="id" value="'. $fila["id"] .'">
                                        <button style="border: none;background-color: transparent;color: inherit;padding: 0;font-size: inherit;">Actualizar</button>
                                    </form>
                                    <form method="post" class="btn btn-danger">
                                        <input type="hidden" name="borrar" value="'. $fila["id"] .'">
                                        <button style="border: none;background-color: transparent;color: inherit;padding: 0;font-size: inherit;">Borrar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>