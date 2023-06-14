<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/loginstyle.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">

    <style>

    </style>
</head>

<body>
    <div class="container">

        <div class="form-container">
            <div class="img-container">

                <img src="../img/noaccountimg.png" alt="Imagen">
            </div>

            <h1 class="text-center">Inicia Sesión</h1>
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                ?>
                <div class="errorlogin">
                    <div class="alert alert-danger">El usuario o contraseña no es correcto</div>
                </div>
                <?php

            }
            ?>
            <form action="checklogin.php" method="post">

                <div class="mb-3">
                    <label for="nombre" class="form-label">
                        <p> Nombre de Usuario:</p>
                    </label>
                    <input type="text" class="form-control" id="nombre" name="Nombre" value="JohnDoe">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">
                        <p> Contraseña: </p>
                    </label>
                    <input type="password" class="form-control" id="password" name="password" value="JohnDoe">
                </div>
               
                <div class=" button-container">
                    <p>

                        <button type="submit" class="btn btn-primary">Login</button>
                    </p>
                </div>

            </form>
        </div>
    </div>
</body>

</html>