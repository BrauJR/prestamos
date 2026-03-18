<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location:../index.php");
}

include("../conexion.php");

$sql = "SELECT * FROM vendedores";
$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Lista de Asesores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body style="background:#f4f6f9">

    <div class="container mt-4">

        <div class="card">

            <div class="card-header bg-dark text-white">
                <h4>Lista de Asesores / Vendedores</h4>
            </div>

            <div class="card-body">

                <a href="agregar.php" class="btn btn-primary mb-3">
                    <i class="fa fa-user-plus"></i> Nuevo Asesor
                </a>

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Fecha registro</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php while ($row = $resultado->fetch_assoc()) { ?>

                            <tr>

                                <td><?php echo $row['id_vendedor']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['telefono']; ?></td>
                                <td><?php echo $row['direccion']; ?></td>
                                <td><?php echo $row['correo']; ?></td>
                                <td><?php echo $row['fecha_registro']; ?></td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>