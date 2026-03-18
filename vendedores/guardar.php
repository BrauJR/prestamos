<?php

include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $fecha_registro = $_POST['fecha_registro'];

    $sql = "INSERT INTO vendedores (nombre,telefono,direccion,correo,fecha_registro)
VALUES ('$nombre','$telefono','$direccion','$correo','$fecha_registro')";

    if ($conn->query($sql)) {

        echo "<script>
alert('Asesor registrado correctamente');
window.location='listar.php';
</script>";
    } else {

        echo "Error: " . $conn->error;
    }
}
