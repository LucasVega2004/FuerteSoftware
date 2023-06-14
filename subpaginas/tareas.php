<?php
session_start();
$conexion = mysqli_connect("localhost:3306", "root", "majada", "ivan");
include("../includes/funciones.inc.php");

if (!isset($_SESSION['Nombre'])) {
    header('Location:../index.php');
    die();
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
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

    <style>
        @media (max-width: 767.98px) {
            .hide-small {
                display: none;
            }
        }

        @media (min-width: 768px) {
            .hide-large {
                display: none;
            }
        }
    </style>

    <title>Lista de Proyectos</title>
</head>

<body>


    <?php
    navbar();
    ?>

    <?php
    // Almacenar la consulta en una variable para que sea más manejable
    if (isset($_POST['buscador']) && $_POST['buscador'] != "") {
        $n = trim($_POST["buscador"]);
        $consulta = "SELECT p.NombreProyecto, t.idTareas, t.NombreTarea, t.Descripcion, t.estado 
        FROM Proyectos p INNER JOIN Tareas t ON t.idProyectos = p.idProyectos 
        WHERE p.NombreProyecto LIKE '%$n%' OR t.estado LIKE '%$n%' OR t.Descripcion LIKE '%$n%';";
    } else {
        $n = "";
        $consulta = "SELECT p.NombreProyecto, t.idTareas, t.NombreTarea, t.Descripcion, t.estado
        FROM Proyectos p INNER JOIN Tareas t ON t.idProyectos = p.idProyectos 
        WHERE p.idProyectos = '$id';";
    }

    $tabla = mysqli_query($conexion, $consulta);
    ?>

    <form action="tareas.php?id=<?php echo $id ?>" method="post" class="rounded-3">
        Buscador: <input type="text" name="buscador" value="<?php echo $n; ?>">
        <input type="submit" value="Buscar" class="ms-4">
    </form>

    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th class="hide-small d-none d-sm-table-cell">Descripción</th>
                <th class="hide-small d-none d-sm-table-cell">Estado</th>
                <th class="hide-small d-none d-sm-table-cell">Nombre Proyecto</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($registro = mysqli_fetch_assoc($tabla)) { ?>
                <tr>
                    <td>
                        <?php echo $registro["idTareas"] ?>
                    </td>
                    <td>
                        <?php echo $registro["NombreTarea"] ?>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <?php echo $registro["Descripcion"] ?>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <?php echo $registro["estado"] ?>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <?php echo $registro["NombreProyecto"] ?>
                    </td>
                    <td>
                        <div class="btn-group">

                            <button type="button" class="btn btn-success hide-desktop dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><strong>Descripcion:</strong>
                                    <?php echo $registro["Descripcion"] ?>
                                </li>
                                <li><strong>Estado:</strong>
                                    <?php echo ($registro["estado"]) ?>
                                </li>
                                <li><strong>Nombre del Proyecto:</strong>
                                    <?php echo $registro["NombreProyecto"] ?>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <a class="btn btn-success"
                            href="./tareas_updateform.php?op=update&id=<?php echo $registro["idTareas"]; ?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <?php if (isset($_SESSION['admin'])) { ?>
                            <div class="btn-group">
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal<?php echo $registro['idTareas']; ?>">
                                Borrar
                            </button>
                        </td>
                        <div class="modal fade" id="exampleModal<?php echo $registro['idTareas']; ?>" tabindex="-1"
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
                                            href="../sql/proyectos_sql.php?op=borrar&id=<?php echo $registro['idTareas']; ?>">
                                            Borrar Tarea
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>