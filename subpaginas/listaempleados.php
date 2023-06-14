<?php
session_start();
$conexion = mysqli_connect("localhost:3306", "root", "majada", "ivan");
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

    <title>Lista de Empleados</title>
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
    navbar();
    ?>
    <?php
    // Almacenar la consulta en una variable para que sea más manejable
    if (isset($_POST['buscador']) && $_POST['buscador'] != "") {
        $n = $_POST["buscador"];
        $consulta = "SELECT * FROM Empleado where admin = false and  Nombre LIKE '%$n%' 
        or Apellido1 LIKE '%$n%' or Apellido2 LIKE '%$n%' or telefono 
        like '%$n%' or email like '%$n%' "; // or estado LIKE '%$n%' or c.Nombre like '%$n%'";
    } else {
        $n = "";
        $consulta = "SELECT * FROM Empleado where admin = false";
    }

    $tabla = mysqli_query($conexion, $consulta);
    ?>
    <form action="listaempleados.php" method="post" class="rounded-3">
        Buscador: <input type="text" name="buscador" value="<?php echo $n; ?>">
        <input type="submit" value="Buscar" class="ms-4">
    </form>
    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th class="hide-mobile">Segundo Apellido</th>
                <th class="hide-mobile">Teléfono</th>
                <th class="hide-mobile">E-mail</th>
                <th></th>
                <th class="hide-mobile"></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($registro = mysqli_fetch_assoc($tabla)) { ?>

                <tr>
                    <td>
                        <?php echo $registro["idEmpleado"] ?>
                    </td>
                    <td>
                        <?php echo $registro["Nombre"] ?>
                    </td>
                    <td>
                        <?php echo $registro["Apellido1"] ?>
                    </td>
                    <td class="hide-mobile">
                        <?php echo $registro["Apellido2"] ?>
                    </td>
                    <td class="hide-mobile">
                        <?php echo ($registro["telefono"] == "") ? "No se ha registrado teléfono" : $registro["telefono"]; ?>
                    </td>
                    <td class="hide-mobile">
                        <?php echo $registro["email"] ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-success hide-mobile"
                                href="./empleados_updateform.php?op=update&id=<?php echo $registro["idEmpleado"]; ?>">
                                Editar
                            </a>
                            <button type="button" class="btn btn-success hide-desktop dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><strong>Segundo Apellido:</strong>
                                    <?php echo $registro["Apellido2"] ?>
                                </li>
                                <li><strong>Teléfono:</strong>
                                    <?php echo ($registro["telefono"] == "") ? "No se ha registrado teléfono" : $registro["telefono"]; ?>
                                </li>
                                <li><strong>E-mail:</strong>
                                    <?php echo $registro["email"] ?>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td class="hide-mobile">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal<?php echo $registro['idEmpleado']; ?>">
                            Borrar
                        </button>
                        <div class="modal fade" id="exampleModal<?php echo $registro['idEmpleado']; ?>" tabindex="-1"
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
                                            href="../sql/empleados_sql.php?op=borrar&id=<?php echo $registro['idEmpleado']; ?>">
                                            Borrar Empleado
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