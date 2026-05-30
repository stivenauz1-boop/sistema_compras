<?php

session_start();

if(!isset($_SESSION['rol']) || $_SESSION['rol']!="user"){
header("Location:index.php");
exit();
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Panel Cliente</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI;
}

body{
background:#f1f5f9;
}

header{
background:#2563eb;
padding:20px;
color:white;
text-align:center;
}

.container{
width:90%;
margin:auto;
margin-top:40px;
}

.card{
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 0 15px rgba(0,0,0,.1);
text-align:center;
}

.btn{
display:inline-block;
padding:15px 25px;
margin:10px;
background:#2563eb;
color:white;
text-decoration:none;
border-radius:8px;
}

.logout{
background:#ef4444;
}

</style>

</head>

<body>

<header>

<h1>Panel del Cliente</h1>

<p>
Bienvenido
<?php echo $_SESSION['nombre']; ?>
</p>

</header>

<div class="container">

<div class="card">

<h2>Opciones Disponibles</h2>

<br>

<a
class="btn"
href="catalogo.php">

Ver Productos

</a>

<a
class="btn logout"
href="logout.php">

Cerrar Sesión

</a>

</div>

</div>

</body>
</html>