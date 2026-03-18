<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location:../index.php");
}

include("../conexion.php");

/* CONSULTAR VENDEDORES */

$vendedores = $conn->query("SELECT * FROM vendedores");

/* CONSULTAR CLIENTES */

$clientes = $conn->query("SELECT * FROM clientes");

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Solicitud de Nuevo Préstamo</title>

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

.titulo-seccion{
border-bottom:2px solid #eee;
margin-top:25px;
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
<i class="fa fa-file-signature"></i>
SOLICITUD DE NUEVO PRÉSTAMO
</h4>

</div>

<div class="card-body">

<form action="paso2.php" method="POST">

<!-- DATOS GENERALES -->

<div class="row mb-3">

<div class="col-md-4">

<label class="form-label">
<i class="fa fa-calendar"></i>
Fecha de registro
</label>

<input type="text" name="fecha_registro" id="fecha_registro" class="form-control" required>

</div>

<div class="col-md-4">

<label class="form-label">
<i class="fa fa-user-tie"></i>
Vendedor
</label>

<select name="id_vendedor" class="form-control" required>

<option value="">Seleccionar vendedor</option>

<?php while ($v = $vendedores->fetch_assoc()) { ?>

<option value="<?php echo $v['id_vendedor']; ?>">
<?php echo $v['nombre']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="col-md-4">

<label class="form-label">
<i class="fa fa-money-bill-wave"></i>
Tipo de pago
</label>

<select name="tipo_pago" class="form-control" required>

<option value="">Seleccionar</option>
<option value="semanal">Pagos Semanales</option>
<option value="quincenal">Pagos Quincenales</option>
<option value="mensual">Pagos Mensuales</option>

</select>

</div>

</div>

<!-- DATOS DEL CLIENTE -->

<h5 class="titulo-seccion">DATOS DEL CLIENTE</h5>

<div class="row">

<div class="col-md-6 mb-3">

<label>Nombre completo</label>

<select name="nombre_cliente" id="nombre_cliente" class="form-control" required>

<option value="">Seleccionar cliente</option>

<?php while ($c = $clientes->fetch_assoc()) { ?>

<option
value="<?php echo $c['id_cliente']; ?>"
data-direccion="<?php echo $c['direccion']; ?>"
data-telefono="<?php echo $c['telefono']; ?>"
data-correo="<?php echo $c['correo']; ?>"
>
<?php echo $c['nombre']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="col-md-6 mb-3">

<label>Número de cliente</label>

<input type="text" name="id_cliente" id="id_cliente" class="form-control">

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>Domicilio</label>

<input type="text" name="domicilio" id="domicilio" class="form-control">

</div>

<div class="col-md-6 mb-3">

<label>Teléfono</label>

<input type="text" name="telefono" id="telefono" class="form-control">

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>Correo electrónico</label>

<input type="email" name="correo" id="correo" class="form-control">

</div>

</div>

<div class="row">

<div class="col-md-4 mb-3">
<label>Colonia</label>
<input type="text" name="colonia" class="form-control">
</div>

<div class="col-md-4 mb-3">
<label>Estado y Municipio</label>
<input type="text" name="estado_municipio" class="form-control">
</div>

<div class="col-md-4 mb-3">
<label>Código Postal</label>
<input type="text" name="cp" class="form-control">
</div>

</div>

<div class="mb-3">
<label>No. INE</label>
<input type="text" name="ine" class="form-control">
</div>

<!-- REFERENCIAS -->

<h5 class="titulo-seccion">REFERENCIAS</h5>

<h6>Referencia 1</h6>

<div class="row">

<div class="col-md-6 mb-3">
<label>Nombre</label>
<input type="text" name="ref1_nombre" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Teléfono</label>
<input type="text" name="ref1_tel" class="form-control">
</div>

</div>

<h6>Referencia 2</h6>

<div class="row">

<div class="col-md-6 mb-3">
<label>Nombre</label>
<input type="text" name="ref2_nombre" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Teléfono</label>
<input type="text" name="ref2_tel" class="form-control">
</div>

</div>

<div class="text-end">

<button class="btn btn-primary">

Siguiente
<i class="fa fa-arrow-right"></i>

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
maxDate:"today"

});

document.getElementById("nombre_cliente").addEventListener("change",function(){

var selected = this.options[this.selectedIndex];

document.getElementById("id_cliente").value = this.value;
document.getElementById("domicilio").value = selected.getAttribute("data-direccion");
document.getElementById("telefono").value = selected.getAttribute("data-telefono");
document.getElementById("correo").value = selected.getAttribute("data-correo");

});

</script>

</body>
</html>