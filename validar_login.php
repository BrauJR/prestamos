<?php

session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM administradores 
WHERE usuario='$usuario' AND password='$password'";

$resultado = $conn->query($sql);

if($resultado->num_rows > 0){

$_SESSION['admin']=$usuario;

echo '

<html>

<head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<script>

Swal.fire({
title: "¡HOLA BIENVENIDO AL SISTEMA!",
text: "Acceso concedido correctamente",
icon: "success",
confirmButtonText: "Entrar al sistema",
confirmButtonColor: "#6f42c1",
background: "#0f2027",
color: "#fff",
width: "500px",
showClass: {
popup: "animate__animated animate__zoomIn"
}
}).then(() => {
window.location = "dashboard.php";
});

</script>

</body>

</html>

';

}else{

echo '

<html>

<head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<script>

Swal.fire({
title: "Error",
text: "Usuario o contraseña incorrectos",
icon: "error",
confirmButtonText: "Intentar otra vez",
confirmButtonColor: "#d33"
}).then(() => {
window.location = "index.php";
});

</script>

</body>

</html>

';

}

?>