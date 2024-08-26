<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Documentos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="<?php echo base_url('assets/css/admin.css'); ?>" rel="stylesheet" type="text/css" />
</head>

<body>

    <div id="navbar-container">
        <?php include "assets/navbar.php"; ?>
    </div>

    <div class="container mt-5">
        <h2 class="text-center">Tipos de Documentos</h2>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregarTipoDocumento">Crear
            Tipo
            de
            Documento</button>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Documento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tiposDocumentos as $tipoDocumento): ?>
                        <tr>
                            <td>
                                <?= $tipoDocumento['id'] ?>
                            </td>
                            <td>
                                <?= $tipoDocumento['nombre'] ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                    data-target="#editarTipoModal<?= $tipoDocumento['id'] ?>">
                                    <img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAWpJREFUSEvNlo1NxDAMRn2bwCTAJByTAJPAJsAkxybQJ9XVl1z+U6kX6aRr2uT5sx3HJztonA7i2k2CHzu88Wtm/Bh3y/+zmT2Y2c/y/Cnvti1Tiln00QFl4xeBslaNxqCnGJ4CX1arW9glKEDUM67gMRhLv9aP3xfLvyt0fw9AlbpBb2b2uu6hRl4ll4JxTw3sMVUo6u7FYISwbzBfUtwCjpU6D2+hVvNlN8Up96LM4woIsMeYBNw8OKo4F1Pmca3Dk1AmR8A5qLtZE4q4Bkr9o15wDaoxzUJ7Fc9AvaB0xxgohcVHkKFR9sZK/YgGp6TV1X+DUDW4G6xFpUcptmYLUovi3OKW7N0NzNEghs+l4iBh2Q0c3xnFI7OnqxVcg07HmMzUEuhw7Tpyt+eUqytXcvH1ENgTaRbsjUDxHKdulxmwrg2Obq7Zw8pUXEeMIBdoDCg+28j11bmEGgEn26ebbOhH1DWvOUzxP6dTlR/hIXkuAAAAAElFTkSuQmCC" />
                                </button>
                                <!-- Botón para abrir el modal de confirmación de eliminación -->
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                    data-target="#eliminarTipoModal<?= $tipoDocumento['id'] ?>">
                                    <img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAPFJREFUSEvtVtEVwiAQSyfRUXQT3cxNdBN1Exuf9VEEEmyf+AGfNHch4bjegEZraMSLGuIDgK046G3EnBwxLvEZwM5JOOIuAPYK6xBT5VUlir6TmAfILoeYSqmYq5TQxT0T/Q0xbWURhWsT7LFw7hn/FI6xLL6k4tCuymuV8Nk1xVY3Iw6PPT0h63lEemVsqbhkcMFcGVtLPHWvsEOl9lYnTiV092YG1Sp2SbrijzrsVqsG0ouLDrkuLHrHzTqX/Pe9AKs3kJ8Su2QpHKeOY+pDqYF8M13GHNnhUA17JOdUogb5nNr3jBUDFPESm4uxzYgf6SOGH0AL/E4AAAAASUVORK5CYII=" />
                                </button>

                                <!-- Modal de confirmación de eliminación -->
                                <div class="modal fade" id="eliminarTipoModal<?= $tipoDocumento['id'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="eliminarUsuarioModalLabel<?= $tipoDocumento['id'] ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="eliminarTipoModalLabel<?= $tipoDocumento['id'] ?>">
                                                    Confirmar Eliminación</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estás seguro de que deseas eliminar este Documento?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <!-- Enlace para eliminar el usuario y redirigir a la misma página -->
                                                <a href="<?= site_url('Admin/Dashboard/eliminar_tipodocumento/' . $tipoDocumento['id']) ?>"
                                                    class="btn btn-danger">
                                                    Eliminar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de Edición de Usuario -->
                                <div class="modal fade" id="editarTipoModal<?= $tipoDocumento['id'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="editarUsuarioModalLabel<?= $tipoDocumento['id'] ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="editarUsuarioModalLabel<?= $tipoDocumento['id'] ?>">
                                                    Editar Documento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulario de edición -->
                                                <form
                                                    action="<?= site_url('Admin/Dashboard/editar_tipo/' . $tipoDocumento['id']) ?>"
                                                    method="post">
                                                    <!-- Campos de edición -->
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre:</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                                            value="<?= $tipoDocumento['nombre'] ?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>