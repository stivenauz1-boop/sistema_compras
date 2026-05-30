<?php

include("conexion.php");

$id=$_GET['id'];

$sql="SELECT * FROM productos
WHERE id_producto='$id'";

$resultado=mysqli_query($conexion,$sql);

$fila=mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html>
<head>
<title>Editar Producto</title>

<style>

body{
font-family:Arial;
background:#f4f6f9;
}

form{
width:500px;
margin:auto;
margin-top:50px;
background:white;
padding:30px;
border-radius:10px;
}

input{
width:100%;
padding:12px;
margin-top:10px;
margin-bottom:15px;
}

button{
padding:12px;
background:#2563eb;
border:none;
color:white;
width:100%;
}

</style>

</head>

<body>

<form action="actualizar.php" method="POST">

<h2>Editar Producto</h2>

<input
type="hidden"
name="id"
value="<?php echo $fila['id_producto']; ?>">

<input
type="text"
name="nombre"
value="<?php echo $fila['nombre']; ?>">

<input
type="text"
name="descripcion"
value="<?php echo $fila['descripcion']; ?>">

<input
type="number"
step="0.01"
name="precio"
value="<?php echo $fila['precio']; ?>">

<input
type="number"
name="stock"
value="<?php echo $fila['stock']; ?>">

<button>
Actualizar
</button>

</form>

</body>
</html>