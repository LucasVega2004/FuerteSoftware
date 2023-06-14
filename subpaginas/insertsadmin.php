<?php
session_start();
include("../includes/funciones.inc.php");

if (!isset($_SESSION['admin'])) {
    header('Location:../index.php');
    die();
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
    <link rel="stylesheet" href="../css/insertstyle.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">

    <title>Crear Empleado</title>
</head>

<body>
    <?php
    navbar()
        ?>
    <form action="../sql/empleados_sql.php?op=insertar" class="rounded-3" method="post">
        <div class="ms-5 mb-3 w-75 mt-2">
            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
            <input type="text" name="Nombre" maxlength="45" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                required>
        </div>
        <div class="ms-5 mb-3 w-75">
            <label for="exampleInputPassword1" class="form-label">Primer Apellido:</label>
            <input type="text" name="Apellido1" maxlength="45" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="ms-5 mb-3 w-75">
            <label for="exampleInputPassword1" class="form-label">Segundo Apellido:</label>
            <input type="text" name="Apellido2" maxlength="45" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="ms-5 mb-3 w-75">
            <label for="exampleInputEmail1" class="form-label">Contraseña:</label>
            <input type="password" name="password" maxlength="50" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" required>
        </div>
        <div class="ms-5 mb-3 w-75">
            <label for="exampleInputPassword1" class="form-label">E-mail:</label>
            <input type="email" name="email" maxlength="100" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="ms-5 mb-3 w-75">
            <label for="exampleInputPassword1" class="form-label">Telefono:</label>
            <input type="text" name="telefono" class="form-control" maxlength="9" minlength="9" id="exampleInputPassword1">
        </div>


        <button type="submit" class="btn btn-primary mb-3 ms-5">Insertar</button>
    </form>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>