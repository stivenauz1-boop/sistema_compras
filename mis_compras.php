<?php

session_start();
include("conexion.php");

$id_usuario = $_SESSION['id_usuario'];

$sql = "
SELECT *
FROM compras
WHERE id_usuario='$id_usuario'
ORDER BY id_compra DESC
";

$resultado = mysqli_query($conexion,$sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>Mis Compras</title>
</head>
<body>

<h1>Mis Compras</h1>

<table border="1">

<tr>
<th>ID</th>
<th>Fecha</th>
<th>Total</th>
</tr>

<?php while($fila=mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?php echo $fila['id_compra']; ?></td>

<td><?php echo $fila['fecha']; ?></td>

<td>$<?php echo $fila['total']; ?></td>

</tr>

<?php } ?>

</table>

</body>
</html>