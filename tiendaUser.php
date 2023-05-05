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
    <title>Tienda</title>
</head>

<body>
    <nav class="navbar bg-body-tertiary" style="border-bottom:4px solid crimson;">
        <div class="container-fluid">
            <a class="navbar-brand">GameStore</a>
            <form class="d-flex" role="search">
                <a href="login.php" class="btn btn-outline-primary mx-2">Registrarse</a>
            </form>
        </div>
    </nav>
    <div class="container mt-5 py-3"
        style="background-color: aliceblue; border-radius: 50px ;border:solid 5px skyblue ;">
        <div class="row offset-1">

            <?php
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<div class='card col-md-3 mx-2 mb-3' style='width: 18rem;'>";
                echo "<img src='".$fila["link"]."' class='card-img-top' alt='...'/>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $fila["nombre"] . "</h5>";
                echo "<p class='card-text'>$" . $fila["precio"] . "</p>";
                echo "<a class='btn btn-success offset-3'>Comprar</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>