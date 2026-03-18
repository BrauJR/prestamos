<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Sistema de Préstamos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/estilos.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

<div class="login-container">

<div class="login-box">

<!-- LADO IZQUIERDO -->
<div class="login-left">

<div class="logo">
<h2>SISTEMA</h2>
<h4>PRÉSTAMOS</h4>
</div>

</div>

<!-- LADO DERECHO -->
<div class="login-right">

<h1>Bienvenido</h1>
<p>Ingrese su usuario y contraseña para continuar</p>

<form action="validar_login.php" method="POST">

<div class="input-group mb-3">

<span class="input-group-text">
<i class="fa fa-user"></i>
</span>

<input type="text" name="usuario" class="form-control" placeholder="Usuario" required>

</div>

<div class="input-group mb-4">

<span class="input-group-text">
<i class="fa fa-lock"></i>
</span>

<input type="password" name="password" class="form-control" placeholder="Contraseña" required>

</div>

<button class="btn-login">
LOGIN
</button>

</form>

</div>

</div>

</div>

</body>

</html>