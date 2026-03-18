<?php

session_start();
include("../conexion.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

/* ===============================
   DATOS DEL PRESTAMO
================================ */

$id_cliente = $_POST['id_cliente'];
$id_vendedor = $_POST['id_vendedor'];
$fecha_registro = $_POST['fecha_registro'];
$tipo_pago = $_POST['tipo_pago'];

$monto = $_POST['monto'];
$interes = $_POST['interes_anual'];
$cargo = $_POST['cargo_servicio'];
$cuota = $_POST['cuota'];
$semanas = $_POST['semanas'];
$fecha_primer_pago = $_POST['fecha_primer_pago'];

/* GENERAR NUMERO DE CONTRATO */

$numero_contrato = "C-".rand(1000,9999);

/* INSERTAR PRESTAMO */

$sql = "INSERT INTO prestamos
(id_cliente,id_vendedor,numero_contrato,fecha_registro,monto,interes_anual,cargo_servicio,cuota,semanas,tipo_pago,fecha_primer_pago)
VALUES
('$id_cliente','$id_vendedor','$numero_contrato','$fecha_registro','$monto','$interes','$cargo','$cuota','$semanas','$tipo_pago','$fecha_primer_pago')";

$conn->query($sql);

$id_prestamo = $conn->insert_id;


/* ===============================
   DATOS DEL AVAL
================================ */

$aval_nombre = $_POST['aval_nombre'];
$aval_domicilio = $_POST['aval_domicilio'];
$aval_telefono = $_POST['aval_telefono'];
$aval_colonia = $_POST['aval_colonia'];
$aval_estado = $_POST['aval_estado'];
$aval_cp = $_POST['aval_cp'];
$aval_ine = $_POST['aval_ine'];

$sql_aval = "INSERT INTO aval
(id_prestamo,nombre,domicilio,telefono,colonia,estado_municipio,codigo_postal,ine)
VALUES
('$id_prestamo','$aval_nombre','$aval_domicilio','$aval_telefono','$aval_colonia','$aval_estado','$aval_cp','$aval_ine')";

$conn->query($sql_aval);

$id_aval = $conn->insert_id;


/* ===============================
   REFERENCIAS DEL AVAL
================================ */

$ref1_nombre = $_POST['aval_ref1_nombre'];
$ref1_tel = $_POST['aval_ref1_tel'];

$ref2_nombre = $_POST['aval_ref2_nombre'];
$ref2_tel = $_POST['aval_ref2_tel'];

$conn->query("INSERT INTO referencias_aval (id_aval,nombre,telefono)
VALUES ('$id_aval','$ref1_nombre','$ref1_tel')");

$conn->query("INSERT INTO referencias_aval (id_aval,nombre,telefono)
VALUES ('$id_aval','$ref2_nombre','$ref2_tel')");


/* ===============================
   DACION DE PAGO
================================ */

$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['numero_serie'];
$motor = $_POST['numero_motor'];
$color = $_POST['color'];

$conn->query("INSERT INTO dacion_pago
(id_prestamo,descripcion,estado,marca,modelo,numero_serie,numero_motor,color)
VALUES
('$id_prestamo','$descripcion','$estado','$marca','$modelo','$serie','$motor','$color')");


/* ===============================
   REDIRECCION
================================ */

echo "<script>
alert('Préstamo registrado correctamente');
window.location='../dashboard.php';
</script>";

}

?>