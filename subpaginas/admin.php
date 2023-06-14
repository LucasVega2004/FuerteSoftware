<?php
session_start();

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
    <link rel="stylesheet" href="../css/indexstyle.css">
    <title>AdminView</title>
</head>

<body>
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
                            <a class="nav-link" href="./login/login.php">Iniciar Sesión</a>
                            <?php
                        } ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">No sé</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mascotas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Opciones de Administrador
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Insertar Usuario</a></li>
                            <li><a class="dropdown-item" href="#">Ver Lista de Usuarios</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <?php // SI ESTAS LOGEADO APARECE EL ENLACE PARA DESLOGEARSE
                    if (isset($_SESSION['Nombre'])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../login/logout.php">Cerrar Sesión</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <H1>ADMIN</H1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>