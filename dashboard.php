<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location:index.php");
}

include("conexion.php");

/* CONTAR CLIENTES */

$sql_clientes = "SELECT COUNT(*) as total_clientes FROM clientes";
$result_clientes = $conn->query($sql_clientes);
$data_clientes = $result_clientes->fetch_assoc();
$total_clientes = $data_clientes['total_clientes'];

/* CONTAR VENDEDORES */

$sql_vendedores = "SELECT COUNT(*) as total_vendedores FROM vendedores";
$result_vendedores = $conn->query($sql_vendedores);
$data_vendedores = $result_vendedores->fetch_assoc();
$total_vendedores = $data_vendedores['total_vendedores'];

/* CONTAR PAGOS */

$sql_pagos = "SELECT COUNT(*) as total_pagos FROM pagos";
$result_pagos = $conn->query($sql_pagos);
$data_pagos = $result_pagos->fetch_assoc();
$total_pagos = $data_pagos['total_pagos'];

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Sistema de Préstamos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>

body{
margin:0;
background:#f4f6f9;
font-family:Arial;
}

/* SIDEBAR */

.sidebar{
width:230px;
height:100vh;
background:#1f2d3d;
position:fixed;
left:0;
top:0;
color:white;
}

.sidebar h4{
text-align:center;
padding:20px;
border-bottom:1px solid #34495e;
}

.sidebar a{
display:block;
padding:15px 20px;
color:white;
text-decoration:none;
transition:0.3s;
}

.sidebar a:hover{
background:#34495e;
}

.sidebar i{
margin-right:10px;
}

/* CONTENIDO */

.main{
margin-left:230px;
padding:30px;
}

.dashboard-card{
border-radius:12px;
}

.icon-circle{
width:60px;
height:60px;
border-radius:50%;
background:rgba(255,255,255,0.3);
display:flex;
align-items:center;
justify-content:center;
font-size:25px;
color:white;
}

</style>

</head>

<body>

<!-- MENU LATERAL -->

<div class="sidebar">

<h4 class="text-center">JIMAA</h4>

<a href="prestamos/nuevo.php">
<i class="fa fa-hand-holding-dollar"></i>
Nuevo Préstamo
</a>

<a href="prestamos/ver_prestamo.php">
<i class="fa fa-chart-line"></i>
Estatus de Pago
</a>

<a href="clientes/listar.php">
<i class="fa fa-user"></i>
Base de Clientes
</a>

<a href="pagos/registrar_pago.php">
<i class="fa fa-cash-register"></i>
Realizar Cobro
</a>

<a href="pagos/historial.php">
<i class="fa fa-clock"></i>
Historial de Pago
</a>

<a href="prestamos/estado_cuenta.php">
<i class="fa fa-file-invoice-dollar"></i>
Estado de Cuenta
</a>

<a href="vendedores/listar.php">
<i class="fa fa-users"></i>
Lista de Vendedores
</a>

<a href="logout.php">
<i class="fa fa-sign-out-alt"></i>
Cerrar sesión
</a>

</div>

<!-- CONTENIDO -->

<div class="main">

<h1 class="text-center mb-5">Sistema de Préstamos</h1>

<div class="row g-4">

<!-- VENDEDORES -->

<div class="col-md-4">

<div class="card dashboard-card bg-primary">

<div class="card-body d-flex justify-content-between align-items-center">

<div>
<h6 class="text-white">VENDEDORES REGISTRADOS</h6>
<h2 class="text-white"><?php echo $total_vendedores; ?></h2>
<a href="vendedores/listar.php" class="text-white">Ir al módulo</a>
</div>

<div class="icon-circle">
<i class="fa fa-user-tie"></i>
</div>

</div>

</div>

</div>

<!-- CLIENTES -->

<div class="col-md-4">

<div class="card dashboard-card bg-danger">

<div class="card-body d-flex justify-content-between align-items-center">

<div>
<h6 class="text-white">CLIENTES REGISTRADOS</h6>
<h2 class="text-white"><?php echo $total_clientes; ?></h2>
<a href="clientes/listar.php" class="text-white">Ir al módulo</a>
</div>

<div class="icon-circle">
<i class="fa fa-users"></i>
</div>

</div>

</div>

</div>

<!-- PAGOS -->

<div class="col-md-4">

<div class="card dashboard-card bg-success">

<div class="card-body d-flex justify-content-between align-items-center">

<div>
<h6 class="text-white">PAGOS REALIZADOS</h6>
<h2 class="text-white"><?php echo $total_pagos; ?></h2>
<a href="pagos/registrar_pago.php" class="text-white">Ir al módulo</a>
</div>

<div class="icon-circle">
<i class="fa fa-money-bill-wave"></i>
</div>

</div>

</div>

</div>

</div>

</div>

</body>

</html>