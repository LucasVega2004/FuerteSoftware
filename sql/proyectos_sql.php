<?php
//Recojo los campos, los guardo en variables para manejarlos mas comodamente
include("../includes/funciones.inc.php");

$conexion = conectaMySQL();

$operacion = $_GET["op"];
if ($operacion == 'insertar') {
    $nombre = trim($_POST['NombreProyecto']);
    $descripcion = trim($_POST["Descripcion"]);
    $tipo = trim($_POST['Tipo']);
    $cliente = trim($_POST['idClientes']);



    //Conectamos con la base de datos 



    //Insert 

    $insert = "INSERT INTO `Proyectos` (`NombreProyecto`, `Descripcion`, `Tipo`, `idClientes`) VALUES ('$nombre','$descripcion','$tipo','$cliente')";
    mysqli_query($conexion, $insert);
    header("Location:../subpaginas/listaproyectos.php");


} else if ($operacion == 'borrar') {
    $id = $_GET["id"];
    $delete = "DELETE FROM Proyectos WHERE idProyectos = $id";
    mysqli_query($conexion, $delete);
    header('Location:../subpaginas/listaproyectos.php');
    die();


} else if ($operacion == 'update') {
    $id = $_GET["id"];
    $nombre = trim($_POST['NombreProyecto']);
    $descripcion = trim($_POST["Descripcion"]);
    $tipo = trim($_POST['Tipo']);
    $estado = trim($_POST['estado']);
    $cliente = trim($_POST['idClientes']);


    $update = "UPDATE Proyectos set NombreProyecto= '$nombre', Descripcion='$descripcion', Tipo='$tipo',estado='$estado',idClientes='$cliente' where idProyectos  =$id";

    mysqli_query($conexion, $update);

    header('Location:../subpaginas/listaproyectos.php');
    die();


} 

/*
else if($operacion == 'sincomenzar'){
    $_POST['
    '];
    header('Location:../subpaginas/listaproyectos.php');
    die();
}else if($operacion =='comenzados'){

    $_SESSION['comenzados']=true;
    header('Location:../subpaginas/listaproyectos.php');
    die();

}

*/
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