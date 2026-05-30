<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM productos WHERE id='$id'";
$resultado = mysqli_query($conexion,$sql);
$producto = mysqli_fetch_assoc($resultado);

if(!$producto){
    die("Producto no encontrado");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Comprar Producto</title>

<style>

body{
font-family:Segoe UI;
background:#f1f5f9;
}

.card{
width:500px;
margin:auto;
margin-top:50px;
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 0 15px rgba(0,0,0,.1);
}

.btn{
background:#2563eb;
color:white;
padding:12px 20px;
text-decoration:none;
border:none;
border-radius:8px;
cursor:pointer;
}

input{
width:100%;
padding:10px;
margin:10px 0;
}

</style>

</head>
<body>

<div class="card">

<h2><?php echo $producto['nombre']; ?></h2>

<h3>
Precio: $<?php echo number_format($producto['precio'],2); ?>
</h3>

<form action="procesar_compra.php" method="POST">

<input
type="hidden"
name="id_producto"
value="<?php echo $producto['id']; ?>">

<label>Cantidad</label>

<input
type="number"
name="cantidad"
value="1"
min="1"
max="<?php echo $producto['stock']; ?>"
required>

<button type="submit" class="btn">
Comprar
</button>

</form>

</div>

</body>
</html>