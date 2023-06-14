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
    <title>Editar Proyecto</title>
</head>

<body>
    <?php
    navbar()
        ?>

    <?php
    $id = $_GET['id'];
    $tabla = mysqli_query($conexion, "SELECT p.idProyectos,p.NombreProyecto,p.Descripcion, p.Tipo, p.estado, c.Nombre,c.idClientes FROM Proyectos p inner join clientes c on p.idClientes=c.idClientes where idProyectos = $id");
    $registro = mysqli_fetch_assoc($tabla);
    ?>
    <form action="../sql/proyectos_sql.php?op=update&id=<?php echo $id ?>" method="post">
        <div class="ms-5 mb-3 w-75 mt-2">
            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
            <input value="<?php echo $registro["NombreProyecto"] ?>"maxlength="45" type="text" name="NombreProyecto"
                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="ms-5 mb-3 w-75">
            <label for="exampleInputPassword1" class="form-label">Descripcion:</label>
            <textarea name="Descripcion" id="" cols="30" rows="5"><?php echo $registro["Descripcion"] ?></textarea>
        </div>
        <div class="ms-5 mb-3 w-75">
            <label for="exampleInputPassword1" class="form-label">Tipo:</label>
            <input value="<?php echo $registro["Tipo"] ?>"maxlength="45" type="text" name="Tipo" class="form-control"
                id="exampleInputPassword1">
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
            <label for="cliente" class="form-label">Cliente: </label>
            <select name="idClientes" class="form-select" id="cliente">
                <option value="<?php echo $registro["idClientes"] ?>"><?php echo $registro["idClientes"] ?></option>
                <!-- Aquí puedes agregar más opciones si es necesario -->
                <?php
                $tabla = mysqli_query($conexion, "SELECT idClientes from Clientes");
                while ($registro = mysqli_fetch_assoc($tabla)) {
                    ?>
                    <option>
                        <?php echo $registro["idClientes"]; ?>
                    </option>
                    <?php

                }

                ?>
            </select>
        </div>



        <button type="submit" class="btn btn-primary mb-3 ms-5">Editar</button>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>