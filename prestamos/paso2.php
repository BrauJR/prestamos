<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Solicitud de Préstamo - Aval</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: #f4f6f9;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        .titulo-seccion {
            border-bottom: 2px solid #eee;
            margin-top: 25px;
            margin-bottom: 15px;
            padding-bottom: 5px;
        }
    </style>

</head>

<body>

    <div class="container mt-4">

        <div class="card">

            <div class="card-header bg-dark text-white">

                <h4>
                    <i class="fa fa-user-shield"></i>
                    DATOS DEL AVAL
                </h4>

            </div>

            <div class="card-body">

                <form action="paso3.php" method="POST">

                    <!-- DATOS DEL PASO 1 OCULTOS -->

                    <?php foreach ($_POST as $key => $value) { ?>

                        <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>">

                    <?php } ?>

                    <!-- DATOS DEL AVAL -->

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Nombre completo</label>
                            <input type="text" name="aval_nombre" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Teléfono</label>
                            <input type="text" name="aval_telefono" class="form-control">
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Domicilio</label>
                            <input type="text" name="aval_domicilio" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Colonia</label>
                            <input type="text" name="aval_colonia" class="form-control">
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label>Estado y Municipio</label>
                            <input type="text" name="aval_estado" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Código Postal</label>
                            <input type="text" name="aval_cp" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>No. INE</label>
                            <input type="text" name="aval_ine" class="form-control">
                        </div>

                    </div>

                    <!-- REFERENCIAS DEL AVAL -->

                    <h5 class="titulo-seccion">REFERENCIAS DEL AVAL</h5>

                    <h6>Referencia 1</h6>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Nombre</label>
                            <input type="text" name="aval_ref1_nombre" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Teléfono</label>
                            <input type="text" name="aval_ref1_tel" class="form-control">
                        </div>

                    </div>

                    <h6>Referencia 2</h6>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Nombre</label>
                            <input type="text" name="aval_ref2_nombre" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Teléfono</label>
                            <input type="text" name="aval_ref2_tel" class="form-control">
                        </div>

                    </div>

                    <!-- BOTONES -->

                    <div class="d-flex justify-content-between mt-4">

                        <button type="button" onclick="history.back()" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i>
                            Atrás
                        </button>

                        <button class="btn btn-primary">
                            Siguiente
                            <i class="fa fa-arrow-right"></i>
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>