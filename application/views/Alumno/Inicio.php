<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información General</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>assets/css/Dashboard.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div id="navbar-container">
        <?php include "assets/navbar.php" ?>
    </div>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Información General</h2>

        <div class="row">
            <!-- Generar cartas dinámicamente -->
            <?php foreach ($documentos as $documento): ?>
                <div class="col-md-4">
                    <div class="card mb-4" data-toggle="modal" data-target="#modalDocumento<?= $documento['id'] ?>">
                        <div class="card-header">
                            <h5 class="card-title"><?= $documento['nombre'] ?></h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Propósito:</strong> <?= $documento['proposito'] ?></p>
                            <p><strong>Contenido:</strong> <?= $documento['contenido'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <!-- Generar modales dinámicamente -->
    <?php foreach ($documentos as $documento): ?>
        <div class="modal fade" id="modalDocumento<?= $documento['id'] ?>" tabindex="-1" role="dialog"
            aria-labelledby="modalDocumento<?= $documento['id'] ?>Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDocumento<?= $documento['id'] ?>Label"><?= $documento['nombre'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <embed src="<?= base_url('uploads/Ejemplos/' . $documento['documento_path']) ?>"
                            type="application/pdf" width="100%" height="600px">
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
