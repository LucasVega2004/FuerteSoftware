<?php

session_start();

$nombre = $_POST['Nombre'];
$password = md5($_POST['password']);

$con = mysqli_connect("localhost:3306", "root", "majada", "ivan");
$clientes = mysqli_query($con, "SELECT * FROM Empleado WHERE usuario='$nombre' and `password` = '$password'");

$registro = mysqli_fetch_assoc($clientes);

if (mysqli_num_rows($clientes) == 1) {

    //Login bien
    if ($registro['admin'] == 1) {

        $_SESSION['Nombre'] = $registro['Nombre'];
        $_SESSION['admin'] = $registro['admin'];

        header('Location:../index.php');
        die();
    } else {
        $_SESSION['Nombre'] = $registro['Nombre'];
        header('Location:../index.php');
        die();
    }

} else {

    //Login mal
    header('Location:login.php?error=1');
    die();
}

?>