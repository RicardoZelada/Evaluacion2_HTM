<?php
if(!isset($_SESSION)){
  session_start();
}

if(!isset($_SESSION['logeado'])){
  header('Location:login.php');
}else{
  if($_SESSION['logeado'] != true){
    header('Location:login.php');
    exit();
  }
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Reserva | Hotel Terra Mia</title>
</head>
  <body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light bg-gradient">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
              <h1 class="text-danger">HTM</h1>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class='nav-link text-dark <?php if($pagina == "home") {echo "active";}?>' aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class='nav-link text-dark <?php if($pagina == "ingresar_reserva") {echo "active";}?>' aria-current="page" href="ingresar_reserva.php">Ingresar Reserva</a>
              </li>
              <li class="nav-item">
                <a class='nav-link text-dark <?php if($pagina == "ver_reserva") {echo "active";}?>' aria-current="page" href="ver_reserva.php">Ver Reserva</a>
              </li>
              <li class="nav-item">
                <a class='nav-link text-dark <?php if($pagina == "ingreso_sesion") {echo "active";}?>' aria-current="page" href="login.php">Log in</a>
              </li>
            </ul>
          </div>
          <div class="sesion">
            <p>Bienvenido: <strong><?php echo $_SESSION['usuario'];?></strong></p>
            <form  method = "POST" action = "logout.php">
              <button type="submit" class="btn btn-success bg-gradient">Cerrar Sesion</button>
            </form>
          </div>
        </div>
      </nav>
    </header>

