<?php
session_start();
include("./includes/funciones.inc.php");

if (!isset($_SESSION['Nombre'])) {
  header('Location:./login/login.php');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/indexstyle.css">
  <link rel="shortcut icon" href="./img/logo.ico" type="image/x-icon">

  <title>FuerteSoftware</title>

  <style>

  </style>
</head>

<body>
  <!-- Menú de Navegación -->


  <?php
  navbarindex();
  ?>



  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">

      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>

      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a class="enlacecarousel" href="./subpaginas/listaproyectos.php"><img src="./img/proyectos.jpg" class="d-block mx-auto imgcarousel" alt="..."></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>Proyectos</h5>
        </div>
      </div>
      <div class="carousel-item">
       <a href="./subpaginas/insertstareas.php"> <img src="./img/tareas.avif" class="d-block mx-auto imgcarousel" alt="..."></a>
        <div class="carousel-caption d-none d-md-block">

          <h5 class="">Tareas</h5>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev ms-5" type="button" data-bs-target="#carouselExampleCaptions"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next me-5" type="button" data-bs-target="#carouselExampleCaptions"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </div>






  <!-- Scripts de Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>