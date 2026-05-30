<?php

$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "sistema_compras"
);

if(!$conexion){
    die("Error de conexión");
}
?>