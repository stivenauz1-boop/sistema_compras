<?php

session_start();
include("conexion.php");

$id_usuario = $_SESSION['id_usuario'];
$id_producto = $_GET['id'];

$sql="
INSERT INTO carrito
(id_usuario,id_producto,cantidad)
VALUES
('$id_usuario','$id_producto',1)
";

mysqli_query($conexion,$sql);

header("Location: carrito.php");