<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location:../index.php");
}

include("../conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Registrar Asesor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body style="background:#f4f6f9">

    <div class="container mt-4">

        <div class="card">

            <div class="card-header bg-dark text-white">
                <h4>Registrar Asesor / Vendedor</h4>
            </div>

            <div class="card-body">

                <form action="guardar.php" method="POST">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Teléfono</label>
                            <input type="text" name="telefono" class="form-control">
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Dirección</label>
                            <input type="text" name="direccion" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Correo</label>
                            <input type="email" name="correo" class="form-control">
                        </div>

                    </div>

                    <div class="mb-3">
                        <label>Fecha de registro</label>
                        <input type="text" name="fecha_registro" id="fecha_registro" class="form-control">
                    </div>

                    <button class="btn btn-success">
                        <i class="fa fa-save"></i> Guardar
                    </button>

                    <a href="listar.php" class="btn btn-secondary">
                        Volver
                    </a>

                </form>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

    <script>
        flatpickr("#fecha_registro", {
            locale: "es",
            dateFormat: "Y-m-d",
            maxDate: "today"
        });
    </script>

</body>

</html>