<?php
session_start();
include("../includes/funciones.inc.php");

$conexion = mysqli_connect("localhost:3306", "root", "majada", "ivan");

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
    <title>Editar Cliente</title>
</head>

<body>
    <?php
    navbar()
        ?>


    <?php
    $id = $_GET['id'];
    $tabla = mysqli_query($conexion, "SELECT * FROM clientes where idClientes=$id");
    $registro = mysqli_fetch_assoc($tabla);
    ?>
    <form action="../sql/clientes_sql.php?op=update&id=<?php echo $id ?>" method="post">
        <div class="ms-5 mb-3 w-75 mt-2">
            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
            <input value="<?php echo $registro["Nombre"] ?>" type="text" name="Nombre" class="form-control"
                id="exampleInputEmail1" maxlength="45" aria-describedby="emailHelp">
        </div>
        <div class="ms-5 mb-3 w-75">
            <label for="exampleInputPassword1" class="form-label">Telefono:</label>
            <input value="<?php echo $registro["telefono"] ?>" type="text" name="telefono" maxlength="9" minlength="9" class="form-control"
                id="exampleInputPassword1">
        </div>
        <div class="ms-5 mb-3 w-75">
            <label for="exampleInputPassword1" class="form-label">Direccion:</label>
            <input value="<?php echo $registro["Direccion"] ?>" maxlength="100" type="text" name="Direccion" class="form-control"
                id="exampleInputPassword1">
        </div>

        <div class="ms-5 mb-3 w-75">
            <label for="exampleInputPassword1" class="form-label">Correo Electronico:</label>
            <input value="<?php echo $registro["email"] ?>" maxlength="100"type="email" name="email" class="form-control"
                id="exampleInputPassword1">
        </div>



        <button type="submit" class="btn btn-primary mb-3 ms-5">Enviar</button>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>