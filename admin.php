<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location:index.php");
    exit();
}

if($_SESSION['usuario']!="admin"){
    die("Acceso denegado");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel Administrador</title>

<style>

body{
font-family:Arial;
background:#f4f6f9;
margin:0;
}

header{
background:#2563eb;
color:white;
padding:20px;
}

.container{
width:90%;
margin:auto;
margin-top:30px;
}

.card{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
}

a{
display:inline-block;
padding:12px 20px;
background:#2563eb;
color:white;
text-decoration:none;
border-radius:6px;
margin-right:10px;
}

.logout{
background:#ef4444;
}

</style>

</head>
<body>

<header>

<h1>Panel Administrador</h1>

<p>
Bienvenido:
<?php echo $_SESSION['usuario']; ?>
</p>

</header>

<div class="container">

<div class="card">

<h2>Opciones</h2>

<a href="productos.php">
Administrar Productos
</a>

<a class="logout" href="logout.php">
Cerrar Sesión
</a>

</div>

</div>

</body>
</html>