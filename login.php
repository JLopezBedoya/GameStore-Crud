<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="store.css">
    <title>Login</title>
  </head>
  <body>
    <nav class="navbar bg-body-tertiary" style="border-bottom:4px solid skyblue ;">
        <div class="container-fluid">
          <a class="navbar-brand">GameStore</a>
          <form class="d-flex" role="search">
            <a href="tiendaUser.php" class="btn btn-outline-danger">Entrar como cliente</a>
          </form>
        </div>
      </nav>
      <div class="container mt-5">
    <form method="POST" action="comprobacion.php" class="col-md-6 offset-3  bg-body-tertiary pt-5"style="border-radius: 50px; height: 400px; border: 5px solid yellowgreen;">
            <h3 class="pt-5" style="text-align: center;" >Entrar como admin</h3>
            <div class="input-group flex-nowrap pt-5 px-5">
                <span class="input-group-text" id="addon-wrapping">Nombre de usuario</span>
                <input name="bynombre" id="bynombre" type="text" class="form-control" placeholder="user" aria-label="Username" aria-describedby="addon-wrapping">
              </div>
              <div class="input-group flex-nowrap pt-3 px-5">
                <span class="input-group-text" id="addon-wrapping">Contraseña</span>
                <input name="bypass" id="bypass" type="password" class="form-control" placeholder="password" aria-label="Username" aria-describedby="addon-wrapping">
              </div>
              <input type="submit" class="btn btn-success offset-5 mt-4" />
        </form>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
