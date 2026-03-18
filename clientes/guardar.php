<?php

include("../conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$fecha_registro = $_POST['fecha_registro'];

$sql = "INSERT INTO clientes (nombre,direccion,telefono,correo,fecha_registro)
VALUES ('$nombre','$direccion','$telefono','$correo','$fecha_registro')";

if($conn->query($sql) === TRUE){

echo "<script>
alert('Cliente guardado correctamente');
window.location='listar.php';
</script>";

}else{

echo "Error: ".$conn->error;

}

}

?>