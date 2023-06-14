<?php
session_start();
$conexion = mysqli_connect("localhost:3306", "root", "majada", "ivan");
include("../includes/funciones.inc.php");

if (!isset($_SESSION['Nombre'])) {
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
    <title>Crear Tarea</title>
</head>

<body>
    <?php
    navbar()
        ?>

    <form action="../sql/tareas_sql.php?op=insertar" class="rounded-3" method="post">
        <div class="ms-5 mb-3 w-75 mt-2">
            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
            <input type="text" name="NombreTarea" maxlength="45" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" required>
        </div>
        <div class="ms-5 mb-3 w-75">
            <label for="exampleInputPassword1" class="form-label">Descripcion:</label>
            <textarea name="Descripcion" id="" cols="30" rows="5"></textarea>
        </div>
       

        <div class="ms-5 mb-3 w-75">
            <label for="cliente" class="form-label">Proyecto perteneciente: </label>
            <select name="idProyectos" class="form-select" id="proyecto">
                <!-- Aquí puedes agregar más opciones si es necesario -->
                <?php
                $tabla = mysqli_query($conexion, "SELECT idProyectos from Proyectos");
                while ($registro = mysqli_fetch_assoc($tabla)) {
                    ?>
                    <option>
                        <?php echo $registro["idProyectos"]; ?>
                    </option>
                    <?php

                }

                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mb-3 ms-5">Insertar</button>
    </form>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>