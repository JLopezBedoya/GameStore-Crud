<nav class="navbar bg-body-tertiary" style="border-bottom:4px solid #198754;">
        <div class="container-fluid">
            <a class="navbar-brand">Angelo's GameStore</a>
            <form class="d-flex" role="search">
                <a href="./tienda.php" class="btn btn-outline-danger">Tienda</a>
                <a href="./bodega.php" class="btn btn-outline-primary mx-2">Bodega</a>
                <a href="./index.php" class="btn btn-outline-danger">Cerrar sesion</a>
            </form>
        </div>
    </nav>
    <?php 
    if($_SESSION["usuario"]!=1){
                    echo '<script>
                    window.location.replace("./index.php");
                </script>';
    }
    ?>