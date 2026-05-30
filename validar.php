<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();

include("conexion.php");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM usuarios
        WHERE usuario='$usuario'
        AND clave='$clave'";

$resultado = mysqli_query($conexion,$sql);

if(mysqli_num_rows($resultado)>0){

    $datos = mysqli_fetch_assoc($resultado);

    $_SESSION['id'] = $datos['id'];
    $_SESSION['usuario'] = $datos['usuario'];

    if($datos['usuario']=="admin"){
        header("Location:admin.php");
    }else{
        header("Location:catalogo.php");
    }

    exit();

}else{

    echo "
    <h2>Usuario o contraseña incorrectos</h2>
    <a href='index.php'>Volver</a>
    ";

}

?>