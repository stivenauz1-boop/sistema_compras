<?php

include("conexion.php");

$id_compra=$_POST['id_compra'];

$sql="
INSERT INTO pagos
(id_compra,metodo_pago,estado)
VALUES
('$id_compra',
'Tarjeta',
'Aprobado')
";

mysqli_query($conexion,$sql);

echo "
<h1>Pago realizado correctamente</h1>
<a href='productos.php'>Volver</a>
";
?>
