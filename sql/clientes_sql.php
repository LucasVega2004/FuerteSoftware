<?php
//Recojo los campos, los guardo en variables para manejarlos mas comodamente
include("../includes/funciones.inc.php");

$conexion = conectaMySQL();

$operacion = $_GET["op"];
if ($operacion == 'insertar') {
    $nombre = trim($_POST['Nombre']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $direccion = trim($_POST['Direccion']);



    //Conectamos con la base de datos 



    //Insert 

    $insert = "INSERT INTO `clientes` (`Nombre`, `email`, `direccion`,`telefono`) VALUES ('$nombre','$email','$direccion','$telefono')";
    mysqli_query($conexion, $insert);
    header("Location:../subpaginas/listaclientes.php");
    die();


} else if ($operacion == 'borrar') {
    $id = $_GET["id"];
    $delete = "DELETE FROM clientes WHERE idClientes = $id";
    mysqli_query($conexion, $delete);
    header("Location:../subpaginas/listaclientes.php");
    die();


} else if ($operacion == 'update') {
    $id = $_GET["id"];
    $nombre = trim($_POST['Nombre']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $direccion = trim($_POST['Direccion']);


    $update = "UPDATE Clientes set Nombre = '$nombre', email='$email', telefono='$telefono',Direccion='$direccion' where idClientes=$id";

    mysqli_query($conexion, $update);

    header('Location:../subpaginas/listaclientes.php');
    die();
}


?>


<!--
//conecto con la bd
$conexion = mysqli_connect('localhost','root','','usuariosphp') or die('algo fallo en el insert');
// recojo los campos  y los filtro

//variables
$operacion = $_GET["op"];

if($operacion=='insertar'){

$nombre = trim($_POST["nombre"]);
$password = md5($_POST["password"]);
$email = trim($_POST["email"]);
$fechaNac = $_POST["fechanacimiento"];

//INSERT
$insert = "INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`, `fechanacimiento`) VALUES (NULL, '$email', '$password', '$nombre', '$fechaNac')";
mysqli_query($conexion,$insert);

}else if($operacion == 'borrar'){
    $id = $_GET["id"];
    $delete = "DELETE FROM usuarios WHERE id = $id";
    mysqli_query($conexion,$delete);
 
}

header("Location:usuarios.php");//inyectamos codigo en las cabeceras php y lo redirigimos
-->