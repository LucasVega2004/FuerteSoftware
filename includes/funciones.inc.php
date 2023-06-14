<?php
function conectaMySQL()
{

    $conexion = mysqli_connect("localhost:3306", "root", "majada", "ivan");

    return $conexion;

}

function headerHTML()
{
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <style>
            table,
            td,
            th {
                border-collapse: collapse;

                border: 1px solid black;

                padding: 0.5px
            }

            th {
                background-color: rgba(0, 0, 0, 0.2);
            }
        </style>
    </head>
    <?php
}
?>
<?php

function navbar()
{
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="../index.php"><img src="../img/logo.png"></a>
            <p class="navbar-brand">FuerteSoftware</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!-- PHP MOSTRAR PERFIL SI HAY Login-->
                        <?php if (isset($_SESSION['Nombre'])) {
                            //logged
                            ?>
                            <a class="nav-link usuariologin" href="#">Perfil de
                                <?php echo $_SESSION['Nombre']; ?>
                            </a>
                            <?php
                        } else {
                            //not logged
                            ?>
                            <a class="nav-link" href="./login/login.php">Iniciar Sesion</a>
                            <?php

                        } ?>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Proyectos </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php
                            if (isset($_SESSION['admin'])) {
                                ?>
                                <li><a class="dropdown-item" href="./insertsproyectos.php">Crea tu proyecto</a></li>
                                <?php
                            }
                            ?>
                            <li><a class="dropdown-item" href="./listaproyectos.php">Lista de proyectos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./insertstareas.php">Crea una Tarea</a>
                    </li>
                    <!--########################################################################## VER SOLO SI ERES ADMIN CAMBIAR A FUTURO -->

                    <?php
                    if (isset($_SESSION['admin'])) {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton1" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones de Administrador
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="./insertclientes.php">Insertar Clientes</a></li>

                                <li><a class="dropdown-item" href="./insertsadmin.php">Insertar Empleado</a></li>
                                <li><a class="dropdown-item" href="./listaclientes.php">Ver Lista de Clientes</a></li>
                                <li><a class="dropdown-item" href="./listaempleados.php">Ver Lista de Empleados</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                    <!--########################################################################## VER SOLO SI ERES ADMIN CAMBIAR A FUTURO -->

                    <?php // SI ESTAS LOGEADO APARECE EL ENLACE PARA DESLOGEARSE
                        if (isset($_SESSION['Nombre'])) {
                            ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../login/logout.php">Log Out</a>
                        </li>

                        <?php
                        }
                        ?>
                        
                </ul>
            </div>
        </div>
    </nav>
    <?php
}

function navbarindex()
{
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="./index.php"><img src="./img/logo.png"></a>
            <p class="navbar-brand">FuerteSoftware</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!-- PHP MOSTRAR PERFIL SI HAY Login-->
                        <?php if (isset($_SESSION['Nombre'])) {
                            //logged
                            ?>
                            <a class="nav-link usuariologin" href="#">Perfil de
                                <?php echo $_SESSION['Nombre']; ?>
                            </a>
                            <?php
                        } else {
                            //not logged
                            ?>
                            <a class="nav-link" href="./login/login.php">Iniciar Sesion</a>
                            <?php

                        } ?>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Proyectos </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php
                            if (isset($_SESSION['admin'])) {
                                ?>
                                <li><a class="dropdown-item" href="./subpaginas/insertsproyectos.php">Crea tu proyecto</a></li>
                                <?php
                            }
                            ?>
                         
                            <li><a class="dropdown-item" href="./subpaginas/listaproyectos.php">Lista de proyectos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./subpaginas/insertstareas.php">Crea una Tarea</a>
                    </li>
                    <!--########################################################################## VER SOLO SI ERES ADMIN CAMBIAR A FUTURO -->

                    <?php
                    if (isset($_SESSION['admin'])) {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton1" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones de Administrador
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="./subpaginas/insertclientes.php">Insertar Clientes</a></li>

                                <li><a class="dropdown-item" href="./subpaginas/insertsadmin.php">Insertar Empleado</a></li>

                                <li><a class="dropdown-item" href="./subpaginas/listaclientes.php">Ver Lista de Clientes</a>
                                </li>
                                <li><a class="dropdown-item" href="./subpaginas/listaempleados.php">Ver Lista de Empleados</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                    <!--########################################################################## VER SOLO SI ERES ADMIN CAMBIAR A FUTURO -->
                    <?php // SI ESTAS LOGEADO APARECE EL ENLACE PARA DESLOGEARSE
                        if (isset($_SESSION['Nombre'])) {
                            ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./login/logout.php">Log Out</a>
                        </li>

                        <?php
                        }
                        ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php
}
?>