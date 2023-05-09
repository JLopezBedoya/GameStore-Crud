<?php include "./controllers/conexion.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./views/header.php";
        $user = $_SESSION['usuario'];
        $sql = "SELECT compras FROM usuarios WHERE id = $user";
        $compras = mysqli_query($conexion, $sql);
        if ($fila = mysqli_fetch_assoc($compras)) {
        $mostrar = unserialize($fila["compras"]);
        }
    ?>
</head>

<body>
    <?php include "./views/usernavbar.php" ?>

    <div class="container mt-5" style="background-color: azure; border-radius:50px; border: solid 5px crimson; height: 470px;">
        <h1 class="centrar">COMPRADOS</h1>
        <div style="overflow-y: scroll; height: 400px;scrollbar-width: none;">
            <table class="table table-striped centrar">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>cover</th>
                    </tr>
                </thead>
                <tbody>
                        <?php                 
                        foreach($mostrar as $datos){
                        $sql = "SELECT * FROM juegos WHERE id = $datos";
                        $moscom = mysqli_query($conexion, $sql);
                            if ($fila = mysqli_fetch_assoc($moscom)) {
                                $gname = $fila["nombre"];
                                $gprice = $fila["precio"];
                                $gcover = $fila["cover"]; 
                            }
                        echo '<tr>
                            <td>'.$fila["id"].'</td>
                            <td>'.$fila["nombre"].'</td>
                            <td>$'.$fila["precio"].'</td>
                            <td><img src="'.$fila["cover"].'" style="width:65px"/></td>
                        </tr>';
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>