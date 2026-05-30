<?php

session_start();

if(!isset($_SESSION['rol']) || $_SESSION['rol']!="admin"){
    header("Location:index.php");
    exit();
}

include("conexion.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Administración de Productos</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f1f5f9;
}

header{
background:#1e3a8a;
color:white;
padding:20px;
display:flex;
justify-content:space-between;
align-items:center;
}

header h1{
font-size:28px;
}

header a{
background:#ef4444;
color:white;
text-decoration:none;
padding:10px 15px;
border-radius:8px;
}

.container{
width:95%;
max-width:1400px;
margin:30px auto;
}

.card{
background:white;
padding:25px;
border-radius:15px;
margin-bottom:25px;
box-shadow:0 3px 10px rgba(0,0,0,.1);
}

.card h2{
margin-bottom:20px;
color:#1e293b;
}

input{
width:100%;
padding:12px;
margin-bottom:12px;
border:1px solid #ccc;
border-radius:8px;
}

button{
background:#2563eb;
color:white;
border:none;
padding:12px 20px;
border-radius:8px;
cursor:pointer;
}

button:hover{
background:#1d4ed8;
}

table{
width:100%;
border-collapse:collapse;
background:white;
}

table th{
background:#2563eb;
color:white;
padding:15px;
}

table td{
padding:15px;
text-align:center;
border-bottom:1px solid #ddd;
}

table tr:hover{
background:#f8fafc;
}

.btn{
text-decoration:none;
padding:8px 12px;
border-radius:6px;
color:white;
font-size:14px;
}

.editar{
background:#10b981;
}

.eliminar{
background:#ef4444;
}

.comprar{
background:#f59e0b;
}

.acciones{
display:flex;
justify-content:center;
gap:8px;
flex-wrap:wrap;
}

.usuario{
font-size:18px;
font-weight:bold;
}

</style>

</head>

<body>

<header>

<div>

<h1>🛒 Sistema de Compras</h1>

<div class="usuario">
Administrador:
<?php echo $_SESSION['nombre']; ?>
</div>

</div>

<a href="logout.php">
Cerrar Sesión
</a>

</header>

<div class="container">

<div class="card">

<h2>Agregar Producto</h2>

<form action="agregar.php" method="POST">

<input
type="text"
name="nombre"
placeholder="Nombre del producto"
required>

<input
type="text"
name="descripcion"
placeholder="Descripción"
required>

<input
type="number"
step="0.01"
name="precio"
placeholder="Precio"
required>

<input
type="number"
name="stock"
placeholder="Stock"
required>

<button type="submit">
Guardar Producto
</button>

</form>

</div>

<div class="card">

<h2>Listado de Productos</h2>

<table>

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Descripción</th>
<th>Precio</th>
<th>Stock</th>
<th>Acciones</th>
</tr>

<?php

$sql="SELECT * FROM productos ORDER BY id_producto DESC";

$resultado=mysqli_query($conexion,$sql);

while($fila=mysqli_fetch_assoc($resultado))
{
?>

<tr>

<td>
<?php echo $fila['id_producto']; ?>
</td>

<td>
<?php echo $fila['nombre']; ?>
</td>

<td>
<?php echo $fila['descripcion']; ?>
</td>

<td>
$<?php echo number_format($fila['precio'],2); ?>
</td>

<td>
<?php echo $fila['stock']; ?>
</td>

<td>

<div class="acciones">

<a
class="btn editar"
href="editar.php?id=<?php echo $fila['id_producto']; ?>">
✏ Editar
</a>

<a
class="btn eliminar"
href="eliminar.php?id=<?php echo $fila['id_producto']; ?>"
onclick="return confirm('¿Eliminar producto?');">
🗑 Eliminar
</a>

<a
class="btn comprar"
href="comprar.php?id=<?php echo $fila['id_producto']; ?>">
🛒 Comprar
</a>

</div>

</td>

</tr>

<?php
}
?>

</table>

</div>

</div>

</body>
</html>