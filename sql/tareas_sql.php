<?php
//Recojo los campos, los guardo en variables para manejarlos mas comodamente
include("../includes/funciones.inc.php");

$conexion = conectaMySQL();

$operacion = $_GET["op"];
if ($operacion == 'insertar') {
    $nombre = trim($_POST['NombreTarea']);
    $descripcion = trim($_POST["Descripcion"]);
    $proyecto = trim($_POST['idProyectos']);



    //Conectamos con la base de datos 



    //Insert 

    $insert = "INSERT INTO `Tareas` (`NombreTarea`, `Descripcion`, `idProyectos`) VALUES ('$nombre','$descripcion','$proyecto')";
    mysqli_query($conexion, $insert);
    header("Location:../subpaginas/listaproyectos.php");


} else if ($operacion == 'borrar') {
    $id = $_GET["id"];
    $delete = "DELETE FROM Tareas WHERE idTareas = $id";
    mysqli_query($conexion, $delete);
    header('Location:../subpaginas/listaproyectos.php');
    die();


} else if ($operacion == 'update') {
    $id = $_GET["id"];
    $nombre = trim($_POST['NombreTarea']);
    $descripcion = trim($_POST["Descripcion"]);
    $estado = trim($_POST["estado"]);
    $proyecto = trim($_POST['idProyectos']);


    $update = "UPDATE Tareas set NombreTarea= '$nombre', Descripcion='$descripcion',estado='$estado',idProyectos='$proyecto' where idTareas  =$id";

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