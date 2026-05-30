<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();

include("conexion.php");

if(!isset($_POST['id_producto'])){
    die("Acceso no válido");
}

$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];

$sql = "SELECT * FROM productos WHERE id='$id_producto'";

$resultado = mysqli_query($conexion,$sql);

$producto = mysqli_fetch_assoc($resultado);

if(!$producto){
    die("Producto no encontrado");
}

if($cantidad > $producto['stock']){
    die("Stock insuficiente");
}

$total = $producto['precio'] * $cantidad;

$id_usuario = $_SESSION['id'];

mysqli_query(
    $conexion,
    "INSERT INTO compras(total,id_usuario,fecha)
     VALUES('$total','$id_usuario',NOW())"
);

$id_compra = mysqli_insert_id($conexion);

mysqli_query(
    $conexion,
    "INSERT INTO pagos(id_compra,metodo_pago,estado)
     VALUES('$id_compra','PayPal','Aprobado')"
);

$nuevoStock = $producto['stock'] - $cantidad;

mysqli_query(
    $conexion,
    "UPDATE productos
     SET stock='$nuevoStock'
     WHERE id='$id_producto'"
);

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Compra Exitosa</title>

<style>

body{
    font-family:Segoe UI;
    background:#f1f5f9;
}

.card{
    width:600px;
    margin:auto;
    margin-top:60px;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 0 15px rgba(0,0,0,.1);
    text-align:center;
}

h1{
    color:#10b981;
}

.total{
    font-size:28px;
    font-weight:bold;
    margin:20px 0;
}

.btn{
    display:inline-block;
    padding:12px 20px;
    margin:10px;
    text-decoration:none;
    color:white;
    border-radius:8px;
}

.catalogo{
    background:#2563eb;
}

</style>

</head>
<body>

<div class="card">

<h1>✅ Compra realizada correctamente</h1>

<h2>
<?php echo $producto['nombre']; ?>
</h2>

<p>
Cantidad: <?php echo $cantidad; ?>
</p>

<div class="total">
Total: $<?php echo number_format($total,2); ?>
</div>

<a
class="btn catalogo"
href="catalogo.php">
Volver al Catálogo
</a>

</div>

</body>
</html>