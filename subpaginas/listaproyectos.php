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

    <title>Lista de Proyectos</title>
</head>

<body>
    <?php
    navbar()
        ?>
    <?php
    // Almacenar la consulta en una variable para que sea más manejable
    if (isset($_POST['buscador']) && $_POST['buscador'] != "") {
        $n = $_POST["buscador"];
        $consulta = "SELECT p.idProyectos,p.NombreProyecto,p.Descripcion,p.Tipo,p.estado,c.Nombre FROM Proyectos p inner join clientes c on c.idClientes = p.idClientes  where NombreProyecto LIKE '%$n%' or c.Nombre LIKE '%$n%' or p.estado LIKE '%$n%' or p.Tipo like '%$n%' or p.Descripcion LIKE '%$n%'";
    } else {
        $n = "";
        $consulta = "SELECT p.idProyectos,p.NombreProyecto,p.Descripcion,p.Tipo,p.estado,c.Nombre FROM Proyectos p inner join clientes c on c.idClientes = p.idClientes";
    }

    $tabla = mysqli_query($conexion, $consulta)
        ?>


    <form action="listaproyectos.php" method="post" class="rounded-3">
        Buscador: <input type="text" name="buscador" value="<?php echo $n; ?>">
        <input type="submit" value="Buscar" class="ms-4">
    </form>

    <div class="table-responsive">
        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th class="w-25 d-none d-sm-table-cell">Descripción</th>
                    <th class="d-none d-sm-table-cell">Tipo</th>
                    <th class="d-none d-sm-table-cell">Estado</th>
                    <th>Nombre Cliente</th>
                    <th class="d-none d-sm-table-cell"></th>
                    <th class="d-none d-sm-table-cell"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($registro = mysqli_fetch_assoc($tabla)) { ?>
                    <tr>
                        <td>
                            <?php echo $registro["idProyectos"] ?>
                        </td>
                        <td>
                            <?php echo $registro["NombreProyecto"] ?>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <?php echo $registro["Descripcion"] ?>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <?php echo $registro["Tipo"] ?>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <?php echo $registro["estado"]; ?>
                        </td>
                        <td>
                            <?php echo $registro["Nombre"] ?>
                        </td>
                        <td class=" d-sm-table-cell">
                            <a class="btn btn-primary"
                                href="./tareas.php?id=<?php echo $registro["idProyectos"]; ?>">Tareas</a>
                        </td>       
                        <?php if (isset($_SESSION['admin'])) { ?>

                            <td class="d-none d-sm-table-cell">
                                <a class="btn btn-success"
                                    href="./proyectos_updateform.php?op=update&id=<?php echo $registro["idProyectos"]; ?>">Editar</a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal<?php echo $registro['idProyectos']; ?>">
                                    Borrar
                                </button>
                            </td>
                        <?php } ?>
                            
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $registro['idProyectos']; ?>" tabindex="-1"
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
                                            href="../sql/proyectos_sql.php?op=borrar&id=<?php echo $registro['idProyectos']; ?>">
                                            Borrar Proyecto
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>