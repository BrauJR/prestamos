<?php
session_start();
include("../conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Nuevo Cliente</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>

body{
background:#eef1f5;
}

.card{
border-radius:12px;
box-shadow:0 8px 20px rgba(0,0,0,0.2);
}

.titulo{
background:#1f2d3d;
color:white;
padding:15px;
border-radius:10px 10px 0 0;
}

.form-label{
font-weight:bold;
}

</style>

</head>

<body>

<div class="container mt-4">

<div class="card">

<div class="titulo">
<h4><i class="fa fa-user"></i> Registro de Cliente</h4>
</div>

<div class="card-body">

<form action="guardar.php" method="POST">

<div class="row mb-3">

<div class="col-md-4">

<label class="form-label">Número de contrato</label>

<div class="input-group">

<span class="input-group-text">
<i class="fa fa-file-contract"></i>
</span>

<input type="text" class="form-control" placeholder="Se genera automáticamente" readonly>

</div>

</div>

<div class="col-md-4">

<label class="form-label">Fecha de registro</label>

<div class="input-group">

<span class="input-group-text">
<i class="fa fa-calendar"></i>
</span>

<input type="text" id="fecha_registro" name="fecha_registro" class="form-control" required>

</div>

</div>

</div>

<hr>

<h5>Datos del cliente</h5>

<div class="row mb-3">

<div class="col-md-6">

<label class="form-label">Nombre completo</label>

<div class="input-group">

<span class="input-group-text">
<i class="fa fa-user"></i>
</span>

<input type="text" name="nombre" class="form-control" required>

</div>

</div>

<div class="col-md-6">

<label class="form-label">Teléfono</label>

<div class="input-group">

<span class="input-group-text">
<i class="fa fa-phone"></i>
</span>

<input type="text" name="telefono" class="form-control">

</div>

</div>

</div>

<div class="row mb-3">

<div class="col-md-6">

<label class="form-label">Domicilio</label>

<div class="input-group">

<span class="input-group-text">
<i class="fa fa-home"></i>
</span>

<input type="text" name="direccion" class="form-control">

</div>

</div>

<div class="col-md-6">

<label class="form-label">Correo</label>

<div class="input-group">

<span class="input-group-text">
<i class="fa fa-envelope"></i>
</span>

<input type="email" name="correo" class="form-control">

</div>

</div>

</div>

<div class="text-end">

<button class="btn btn-success">
<i class="fa fa-save"></i> Guardar Cliente
</button>

</div>

</form>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

<script>

flatpickr("#fecha_registro",{

locale:"es",
dateFormat:"Y-m-d",
altInput:true,
altFormat:"d \\de F \\de Y",
maxDate:"today"

});

</script>

</body>
</html>