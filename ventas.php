<?php

session_start();

if(!isset($_SESSION['rol']) || $_SESSION['rol']!="admin"){
    header("Location:index.php");
    exit();
}

include("conexion.php");

?>

<!DOCTYPE html>
<html>
<head>

<title>Ventas</title>

<style>

body{
font-family:Arial;
background:#f1f5f9;
}

table{
width:90%;
margin:auto;
margin-top:30px;
background:white;
border-collapse:collapse;
}

th{
background:#2563eb;
color:white;
padding:15px;
}

td{
padding:15px;
text-align:center;
border-bottom:1px solid #ddd;
}

h1{
text-align:center;
}

</style>

</head>

<body>

<h1>Ventas Realizadas</h1>

<table>

<tr>
<th>ID Compra</th>
<th>Fecha</th>
<th>Total</th>
</tr>

<?php

$sql="SELECT * FROM compras
ORDER BY id_compra DESC";

$resultado=mysqli_query($conexion,$sql);

while($fila=mysqli_fetch_assoc($resultado))
{

?>

<tr>

<td><?php echo $fila['id_compra']; ?></td>

<td><?php echo $fila['fecha']; ?></td>

<td>$<?php echo $fila['total']; ?></td>

</tr>

<?php } ?>

</table>

</body>
</html>