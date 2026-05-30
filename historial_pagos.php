<?php

session_start();

include("conexion.php");

$sql="
SELECT *
FROM pagos
ORDER BY id_pago DESC
";

$resultado=mysqli_query($conexion,$sql);

?>

<table border="1">

<tr>
<th>ID</th>
<th>Método</th>
<th>Estado</th>
<th>Fecha</th>
</tr>

<?php while($fila=mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?php echo $fila['id_pago']; ?></td>

<td><?php echo $fila['metodo_pago']; ?></td>

<td><?php echo $fila['estado']; ?></td>

<td><?php echo $fila['fecha']; ?></td>

</tr>

<?php } ?>

</table>