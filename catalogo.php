<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location:index.php");
    exit();
}

include("conexion.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Catálogo</title>

<style>

body{
font-family:Segoe UI;
background:#f1f5f9;
margin:0;
}

header{
background:#2563eb;
color:white;
padding:20px;
text-align:center;
}

.container{
width:95%;
margin:auto;
margin-top:20px;
}

.card{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.1);
}

table{
width:100%;
border-collapse:collapse;
}

th{
background:#2563eb;
color:white;
padding:15px;
}

td{
padding:15px;
border-bottom:1px solid #ddd;
text-align:center;
}

.btn{
background:#10b981;
color:white;
padding:10px 15px;
text-decoration:none;
border-radius:6px;
}

.logout{
background:#ef4444;
color:white;
padding:10px 15px;
text-decoration:none;
border-radius:6px;
display:inline-block;
margin-top:10px;
}

</style>

</head>
<body>

<header>

<h1>Catálogo de Productos</h1>

<p>
Bienvenido <?php echo $_SESSION['usuario']; ?>
</p>

<a href="logout.php" class="logout">
Cerrar Sesión
</a>

</header>

<div class="container">

<div class="card">

<table>

<tr>
<th>Producto</th>
<th>Precio</th>
<th>Stock</th>
<th>Comprar</th>
</tr>

<?php

$sql="SELECT * FROM productos";

$resultado=mysqli_query($conexion,$sql);

while($fila=mysqli_fetch_assoc($resultado))
{
?>

<tr>

<td><?php echo $fila['nombre']; ?></td>

<td>$<?php echo number_format($fila['precio'],2); ?></td>

<td><?php echo $fila['stock']; ?></td>

<td>

<?php if($fila['stock']>0){ ?>

<a
class="btn"
href="comprar.php?id=<?php echo $fila['id']; ?>">
Comprar
</a>

<?php } else { ?>

<span style="color:red;">
Sin Stock
</span>

<?php } ?>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>