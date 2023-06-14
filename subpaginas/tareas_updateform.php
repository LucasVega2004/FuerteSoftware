<?php
session_start();
include("../includes/funciones.inc.php");

$conexion = mysqli_connect("localhost:3306", "root", "majada", "ivan");

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
    <title>Editar Cliente</title>
</head>

<body>
    <?php
    navbar()
        ?>


    <?php
    $id = $_GET['id'];
    $tabla = mysqli_query($conexion, "SELECT * FROM Tareas where idtareas=$id");
    $registro = mysqli_fetch_assoc($tabla);
    ?>
    <form action="../sql/tareas_sql.php?op=update&id=<?php echo $id ?>" method="post">
        <div class="ms-5 mb-3 w-75 mt-2">
            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
            <input value="<?php echo $registro["NombreTarea"] ?>"maxlength="45" type="text" name="NombreTarea" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="ms-5 mb-3 w-75">
            <label for="exampleInputPassword1" class="form-label">Descripcion:</label>
            <textarea name="Descripcion" id="" cols="30" rows="5"><?php echo $registro["Descripcion"] ?></textarea>
        </div>
        <div class="ms-5 mb-3 w-75">
            <label for="cliente" class="form-label">Cliente:</label>
            <select name="estado" class="form-select" id="cliente">
                <option value="<?php echo $registro["estado"] ?>"><?php echo $registro["estado"] ?></option>
                <!-- Aquí puedes agregar más opciones si es necesario -->
                <option name="estado" value="En proceso">En proceso</option>
                <option name="estado" value="Finalizado">Finalizado</option>
                <option name="estado" value="En pausa">En pausa</option>

            </select>
        </div>

        <div class="ms-5 mb-3 w-75">
            <label for="cliente" class="form-label">id Proyecto asignado: </label>
            <select name="idProyectos" class="form-select" id="cliente">
                <option value="<?php echo $registro["idProyectos"] ?>"><?php echo $registro["idProyectos"] ?></option>
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




        <button type="submit" class="btn btn-primary mb-3 ms-5">Enviar</button>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>