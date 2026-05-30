<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Sistema de Compras</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI;
}

body{
    background:linear-gradient(135deg,#0f172a,#1e3a8a);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login{
    width:420px;
    background:white;
    padding:40px;
    border-radius:20px;
    box-shadow:0 0 30px rgba(0,0,0,.3);
}

.login h1{
    text-align:center;
    color:#1e3a8a;
    margin-bottom:25px;
}

input{
    width:100%;
    padding:14px;
    margin-top:10px;
    margin-bottom:20px;
    border:1px solid #ccc;
    border-radius:10px;
}

button{
    width:100%;
    padding:15px;
    border:none;
    border-radius:10px;
    background:#2563eb;
    color:white;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:#1d4ed8;
}

</style>

</head>
<body>

<div class="login">

<h1>Sistema de Compras</h1>

<form action="validar.php" method="POST">

<input
type="text"
name="usuario"
placeholder="Usuario"
required>

<input
type="password"
name="clave"
placeholder="Contraseña"
required>

<button type="submit">
Ingresar
</button>

</form>

</div>

</body>
</html>