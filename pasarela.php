<?php

session_start();

$total = $_GET['total'];
$id_producto = $_GET['producto'];
$cantidad = $_GET['cantidad'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Pasarela de Pago</title>

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
text-align:center;
box-shadow:0 0 15px rgba(0,0,0,.1);
}

input,select{
width:100%;
padding:12px;
margin:10px 0;
}

button{
background:#10b981;
color:white;
border:none;
padding:15px;
width:100%;
cursor:pointer;
border-radius:8px;
}

</style>

</head>

<body>

<div class="card">

<h2>💳 Pasarela de Pago</h2>

<h3>Total a pagar: $<?php echo $total; ?></h3>

<form action="procesar_compra.php" method="POST">

<input type="hidden" name="id_producto"
value="<?php echo $id_producto; ?>">

<input type="hidden" name="cantidad"
value="<?php echo $cantidad; ?>">

<label>Nombre del titular</label>
<input type="text" required>

<label>Número de tarjeta</label>
<input type="text"
maxlength="16"
required>

<label>Banco</label>

<select>
<option>Banco Pichincha</option>
<option>Banco Guayaquil</option>
<option>Produbanco</option>
<option>Pacífico</option>
</select>

<button type="submit">
Pagar Ahora
</button>

</form>

</div>

</body>
</html>