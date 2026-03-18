<?php

session_start();

if(!isset($_SESSION['admin'])){
header("Location:../index.php");
}

include("../conexion.php");

$sql = "SELECT * FROM clientes";
$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Base de Clientes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>

body{
background:#f4f6f9;
}

.card{
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

</style>

</head>

<body>

<div class="container mt-4">

<div class="card">

<div class="card-header bg-dark text-white">
<h4>Base de Clientes</h4>
</div>

<div class="card-body">

<a href="agregar.php" class="btn btn-primary mb-3">
<i class="fa fa-user-plus"></i> Nuevo Cliente
</a>

<div class="input-group mb-3">
<span class="input-group-text">
<i class="fa fa-search"></i>
</span>
<input type="text" id="buscarCliente" class="form-control" placeholder="Buscar cliente...">
</div>

<table class="table table-bordered table-striped" id="tablaClientes">

<thead class="table-dark">

<tr>

<th>Número de contrato</th>
<th>Nombre</th>
<th>Teléfono</th>
<th>Dirección</th>
<th>Fecha registro</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php while($row = $resultado->fetch_assoc()){ ?>

<tr>

<td>
MG-<?php echo str_pad($row['id_cliente'],4,"0",STR_PAD_LEFT); ?>
</td>

<td><?php echo $row['nombre']; ?></td>

<td><?php echo $row['telefono']; ?></td>

<td><?php echo $row['direccion']; ?></td>

<td><?php echo $row['fecha_registro']; ?></td>

<td>

<a href="editar.php?id=<?php echo $row['id_cliente']; ?>" class="btn btn-warning btn-sm">
<i class="fa fa-edit"></i>
</a>

<a href="eliminar.php?id=<?php echo $row['id_cliente']; ?>" class="btn btn-danger btn-sm">
<i class="fa fa-trash"></i>
</a>

<a href="../prestamos/estado_cuenta.php?id=<?php echo $row['id_cliente']; ?>" class="btn btn-success btn-sm">
<i class="fa fa-file-invoice-dollar"></i>
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

<script>

document.getElementById("buscarCliente").addEventListener("keyup", function(){

let filtro = this.value.toLowerCase();
let filas = document.querySelectorAll("#tablaClientes tbody tr");

filas.forEach(function(fila){

let texto = fila.textContent.toLowerCase();

if(texto.includes(filtro)){
fila.style.display = "";
}else{
fila.style.display = "none";
}

});

});

</script>

</body>

</html>