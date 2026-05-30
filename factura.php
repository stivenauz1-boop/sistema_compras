<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexion.php");

if(!isset($_GET['id'])){
    die("No se recibió el ID de la compra");
}

$id_compra = $_GET['id'];

$sql = "SELECT * FROM compras WHERE id_compra='$id_compra'";

$resultado = mysqli_query($conexion,$sql);

if(!$resultado){
    die("Error SQL: ".mysqli_error($conexion));
}

if(mysqli_num_rows($resultado)==0){
    die("Compra no encontrada");
}

$compra = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Factura</title>

<style>

body{
font-family:Arial;
background:#f4f6f9;
padding:40px;
}

.factura{
max-width:700px;
margin:auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.1);
}

h1{
text-align:center;
color:#2563eb;
}

.total{
font-size:24px;
font-weight:bold;
color:green;
}

</style>

</head>

<body>

<div class="factura">

<h1>FACTURA DE COMPRA</h1>

<hr>

<p><strong>ID Compra:</strong> <?php echo $compra['id_compra']; ?></p>

<p><strong>Fecha:</strong> <?php echo $compra['fecha']; ?></p>

<p class="total">
Total: $<?php echo $compra['total']; ?>
</p>

<hr>

<h2>✅ Compra realizada correctamente</h2>

<a href="catalogo.php">
Volver al catálogo
</a>

</div>

</body>
</html>