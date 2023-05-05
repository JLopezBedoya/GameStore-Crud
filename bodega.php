<?php include "conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="store.css">
    <title>Bodega</title>
</head>

<body>
    <nav class="navbar bg-body-tertiary" style="border-bottom:4px solid #198754;">
        <div class="container-fluid">
            <a class="navbar-brand">GameStore</a>
            <form class="d-flex" role="search">
                <a href="login.php" class="btn btn-outline-primary mx-2">Cambiar usuario</a>
                <a href="tiendaAdmin.php" class="btn btn-outline-danger">Tienda</a>
            </form>
        </div>
    </nav>
    <div class="container mt-5"
        style="background-color: azure; border-radius:50px; border: solid 5px crimson; height: 470px;">
        <div class="row py-3">
            <div class="col-md-4">
                <form method="post" action="Crear.php">
                    <h2 class="py-4" style="text-align:center;">Añadir un juego</h2>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping1" style="width:100px;">Nombre</span>
                        <input type="text" id="gamename" name="gamename" class="form-control" placeholder="Name"
                            aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping2" style="width:100px;">Precio</span>
                        <input type="number" id="gameprice" name="gameprice" class="form-control" placeholder="Price"
                            aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping3" style="width:100px;">URL Cover</span>
                        <input type="text" id="gamecover" name="gamecover" class="form-control" placeholder="Cover"
                            aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <button type="submit" class="btn btn-success offset-4 mt-4">Añadir Juego</button>
                </form>
            </div>
            <div class="col-md-8 py-4" style="overflow-y: scroll; height: 400px">
                <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>url</th>
                            <th>actualizar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>" . $fila["id"] . "</td>";
                            echo "<td>" . $fila["nombre"] . "</td>";
                            echo "<td>$" . $fila["precio"] . "</td>";
                            echo "<td><img style='width: 70px' src='" . $fila["link"] . "'/></td>";
                            echo "<td>";
                            echo "<form method='post' action='actualizar.php'>";
                            echo "<input type='hidden' name='id' value='" . $fila["id"] . "'>";
                            echo "<button type='submit' class='btn btn-info' >Actualizar</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "<td>";
                            echo "<form method='post' action='eliminar.php'>";
                            echo "<input type='hidden' name='id' value='" . $fila["id"] . "'>";
                            echo "<button type='submit' class='btn btn-danger' >Eliminar</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>