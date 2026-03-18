<?php
session_start();

if(!isset($_SESSION['admin'])){
header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Datos del Préstamo</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>

body{
background:#f4f6f9;
}

.card{
border-radius:10px;
box-shadow:0px 5px 15px rgba(0,0,0,0.2);
}

.titulo{
border-bottom:2px solid #eee;
margin-top:20px;
margin-bottom:15px;
padding-bottom:5px;
}

</style>

</head>

<body>

<div class="container mt-4">

<div class="card">

<div class="card-header bg-dark text-white">

<h4>
<i class="fa fa-money-bill"></i>
DATOS DEL PRÉSTAMO
</h4>

</div>

<div class="card-body">

<form action="guardar_prestamo.php" method="POST">

<!-- DATOS OCULTOS PASO 1 Y 2 -->

<?php foreach($_POST as $key => $value){ ?>

<input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>">

<?php } ?>

<h5 class="titulo">Datos del préstamo</h5>

<div class="row">

<div class="col-md-4 mb-3">
<label>Número de semanas</label>

<select name="semanas" id="semanas" class="form-control">

<option value="8">8</option>
<option value="12">12</option>
<option value="16">16</option>
<option value="20">20</option>
<option value="24">24</option>

</select>

</div>

<div class="col-md-4 mb-3">
<label>Monto del préstamo</label>

<select name="monto" id="monto" class="form-control">

<option value="2000">2000</option>
<option value="3000">3000</option>
<option value="5000">5000</option>
<option value="8000">8000</option>
<option value="10000">10000</option>

</select>

</div>

<div class="col-md-4 mb-3">
<label>Interés anual (%)</label>

<input type="number" name="interes_anual" id="interes" class="form-control" value="20">

</div>

</div>

<div class="row">

<div class="col-md-4 mb-3">
<label>Cargo servicio + IVA</label>

<input type="number" name="cargo_servicio" id="cargo" class="form-control" value="200">

</div>

<div class="col-md-4 mb-3">
<label>Cuota</label>

<input type="number" name="cuota" id="cuota" class="form-control" readonly>

</div>

<div class="col-md-4 mb-3">
<label>Fecha del primer pago</label>

<input type="text" name="fecha_primer_pago" id="fecha_pago" class="form-control">

</div>

</div>

<h5 class="titulo">Dación de pago</h5>

<div class="row">

<div class="col-md-4 mb-3">
<label>Descripción</label>
<input type="text" name="descripcion" class="form-control">
</div>

<div class="col-md-4 mb-3">
<label>Estado que guarda</label>
<input type="text" name="estado" class="form-control">
</div>

<div class="col-md-4 mb-3">
<label>Marca</label>
<input type="text" name="marca" class="form-control">
</div>

</div>

<div class="row">

<div class="col-md-4 mb-3">
<label>Modelo</label>
<input type="text" name="modelo" class="form-control">
</div>

<div class="col-md-4 mb-3">
<label>No. de serie</label>
<input type="text" name="numero_serie" class="form-control">
</div>

<div class="col-md-4 mb-3">
<label>No. de motor</label>
<input type="text" name="numero_motor" class="form-control">
</div>

</div>

<div class="mb-3">
<label>Color</label>
<input type="text" name="color" class="form-control">
</div>

<div class="d-flex justify-content-between mt-4">

<button type="button" onclick="history.back()" class="btn btn-secondary">

<i class="fa fa-arrow-left"></i>
Atrás

</button>

<button class="btn btn-success">

<i class="fa fa-save"></i>
Registrar Préstamo

</button>

</div>

</form>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>

flatpickr("#fecha_pago",{

dateFormat:"Y-m-d"

});

/* CALCULO AUTOMATICO */

function calcular(){

let monto = document.getElementById("monto").value;
let interes = document.getElementById("interes").value;
let semanas = document.getElementById("semanas").value;
let cargo = document.getElementById("cargo").value;

let total = parseFloat(monto) + (monto * interes / 100) + parseFloat(cargo);

let cuota = total / semanas;

document.getElementById("cuota").value = cuota.toFixed(2);

}

document.getElementById("monto").addEventListener("change",calcular);
document.getElementById("interes").addEventListener("keyup",calcular);
document.getElementById("semanas").addEventListener("change",calcular);
document.getElementById("cargo").addEventListener("keyup",calcular);

</script>

</body>

</html>