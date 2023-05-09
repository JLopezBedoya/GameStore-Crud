<?php include "./controllers/conexion.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./views/header.php";?>
    <?php 
    if(isset($_POST["quitar"])){
        unset($_SESSION["carrito"][$_POST["quitar"]]);
    }
    if(isset($_POST["comprartodo"])){
        $usuario=$_SESSION['usuario'] ;
        $consul = "SELECT compras FROM usuarios WHERE id = $usuario";
        $buy = mysqli_query($conexion, $consul);
        if ($fila = mysqli_fetch_assoc($buy)) {
        $desc = unserialize($fila["compras"]);
        }
        $juntos = array_merge($_SESSION["carrito"], $desc);
        $compras = serialize($juntos);
        $sql = "UPDATE usuarios SET compras='$compras' WHERE id=$usuario";
        mysqli_query($conexion, $sql);
        $_SESSION["carrito"] = [];
    }
    if(isset($_POST["comprarUnico"])){
        $usuario = $_SESSION['usuario'];
        $consul = "SELECT compras FROM usuarios WHERE id = $usuario";
        $buy = mysqli_query($conexion, $consul);
        if ($fila = mysqli_fetch_assoc($buy)) {
        $desc = unserialize($fila["compras"]);
        }
        $unico = $_POST["comprarUnico"];
        $nuevo = array_merge([$_SESSION["carrito"][$unico]], $desc); 
        $compra = serialize($nuevo);
        $sql = "UPDATE usuarios SET compras='$compra' WHERE id=$usuario";
        mysqli_query($conexion, $sql);
        unset($_SESSION["carrito"][$unico]);
    }

    ?>
</head>

<body>
    <?php include "./views/usernavbar.php" ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 p-3 carrito" style="background-color: azure; height: 450px; overflow-y:scroll; border-radius:50px;scrollbar-width: none;border:solid 4px lightseagreen;">
                <?php 
                 foreach($_SESSION["carrito"] as $i =>$iu){
                    $sql = "SELECT * FROM juegos WHERE id = $iu";
                    $carrito = mysqli_query($conexion, $sql);
                    if ($fila = mysqli_fetch_assoc($carrito)) {
                        $gname = $fila["nombre"];
                        $gprice = $fila["precio"];
                        $gcover = $fila["cover"]; 
                    }
                    echo '<div class="card mb-3 p-2" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <div class="col-10" style="width: 150px; height: 150px;">
                                <img src="'.$gcover.'" style="max-width: 100%; max-height: 100%;" alt="..." />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body offset-1">
                                <h5 class="card-title centrar">'.$gname.'</h5>
                                <p class="card-text centrar">'.$gprice.'</p>
                                <div class="btn-group offset-3" role="group" aria-label="Basic mixed styles example">
                                    <form method="post" class="btn btn-success">
                                        <input type="hidden" name="comprarUnico" value="'. $i .'">
                                        <button style="border: none;background-color: transparent;color: inherit;padding: 0;font-size: inherit;">Comprar</button>
                                    </form>
                                    <form method="post" class="btn btn-danger">
                                        <input type="hidden" name="quitar" value="'. $i .'">
                                        <button style="border: none;background-color: transparent;color: inherit;padding: 0;font-size: inherit;">Quitar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';   
                 }
                ?>
            </div>
            <div class="col-5" style="margin-left:10px;">
                <div class="p-3" style="background-color: lightcyan; border: solid 5px turquoise; border-radius: 30px;">
                    <h2 class="centrar">Informacion de Compra</h2>
                    <p>Cantidad de juegos: 10</p>
                    <p>Total a pagar: $1000000</p>
                </div>
                <div style="background-color: lightcyan; border: solid 5px turquoise; border-radius: 30px;" class="mt-5 p-3">
                    <form method="post" class="btn btn-success">
                        <input type="hidden" name="comprartodo" value="a">
                        <button style="border: none;background-color: transparent;color: inherit;padding: 0;font-size: inherit;">Comprar todo</button>
                    </form>
                    <button class="btn btn-warning">Limpiar el carrito</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>