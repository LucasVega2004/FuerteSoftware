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

    <title>Lista de Clientes</title>
    <style>
        @media (max-width: 767px) {
            .hide-mobile {
                display: none;
            }

            .dropdown-toggle::after {
                content: "";
                display: inline-block;
                width: 8px;
                height: 8px;
                margin-left: 5px;
                border-top: 2px solid #fff;
                border-right: 2px solid #fff;
                transform: rotate(45deg);
            }
        }

        @media (min-width: 768px) {
            .hide-desktop {
                display: none;
            }
        }
    </style>
</head>

<body>
    <?php
    navbar()
        ?>
    <?php
    // Almacenar la consulta en una variable para que sea mas manejable
    if (isset($_POST['buscador']) && $_POST['buscador'] != "") {
        $n = $_POST["buscador"];
        $consulta = "SELECT * FROM Clientes where Nombre LIKE '%$n%' or Direccion LIKE '%$n%' or email LIKE '%$n%'or telefono LIKE '%$n%'"; // or estado LIKE '%$n%' or c.Nombre like '%$n%'";
    } else {
        $n = "";
        $consulta = "SELECT * FROM Clientes";
    }

    $tabla = mysqli_query($conexion, $consulta)
        ?>
    <form action="listaclientes.php" method="post" class="rounded-3">
        Buscador: <input type="text" name="buscador" value="<?php echo $n; ?>">
        <input type="submit" value="Buscar" class="ms-4">
    </form>
    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th class="hide-mobile">E-mail</th>
                <th class="hide-mobile">Telefono</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($registro = mysqli_fetch_assoc($tabla)) { ?>
                <tr>
                    <td>
                        <?php echo $registro["idClientes"]; ?>
                    </td>
                    <td>
                        <?php echo $registro["Nombre"]; ?>
                    </td>
                    <td>
                        <?php echo $registro["Direccion"]; ?>
                    </td>
                    <td class="hide-mobile">
                        <?php echo $registro["email"]; ?>
                    </td>
                    <td class="hide-mobile">
                        <?php
                        if ($registro["telefono"] == "") {
                            echo "No se ha registrado teléfono";
                        } else {
                            echo $registro["telefono"];
                        }
                        ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-success hide-mobile"
                                href="./clientes_updateform.php?op=update&id=<?php echo $registro["idClientes"]; ?>">
                                Editar
                            </a>
                            <button type="button" class="btn btn-success hide-desktop dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><strong>E-mail:</strong>
                                    <?php echo $registro["email"]; ?>
                                </li>
                                <li><strong>Teléfono:</strong>
                                    <?php echo ($registro["telefono"] == "") ? "No se ha registrado teléfono" : $registro["telefono"]; ?>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td class="hide-mobile">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal<?php echo $registro['idClientes']; ?>">
                            Borrar
                        </button>
                        <div class="modal fade" id="exampleModal<?php echo $registro['idClientes']; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmación de borrado</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-primary"
                                            href="../sql/clientes_sql.php?op=borrar&id=<?php echo $registro['idClientes']; ?>">
                                            Borrar Cliente
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>

</body>

</html> 