<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz del Usuario - Maestro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <div id="navbar-container">
        <?php include "assets/navbar.php"; ?>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Documentos del Maestro</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Alumno</th>
                            <th>Estado</th>
                            <th>Motivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($documentos)): ?>
                            <?php foreach ($documentos as $documento): ?>
                                <tr>
                                    <td><?= $documento['titulo'] ?></td>
                                    <td><?= $documento['nombre_alumno'] ?></td>
                                    <td class="<?= strtolower($documento['estado']) ?>"><?= $documento['estado'] ?></td>
                                    <td><?= $documento['motivo'] ?? '' ?></td>
                                    <td>
                                        <?php if ($documento['estado'] === 'Pendiente'): ?>
                                            <button class="btn btn-success"
                                                onclick="mostrarModalAceptacion(<?= $documento['id'] ?>)">Aceptar</button>
                                            <button class="btn btn-danger"
                                                onclick="mostrarModalRechazo(<?= $documento['id'] ?>)">Rechazar</button>
                                        <?php endif; ?>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#verDocumentoModal<?= $documento['id'] ?>">Ver Documento</button>
                                    </td>
                                </tr>

                                <!-- Modal para ver el documento -->
                                <div class="modal fade" id="verDocumentoModal<?= $documento['id'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="verDocumentoModalLabel<?= $documento['id'] ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="verDocumentoModalLabel<?= $documento['id'] ?>">Ver
                                                    Documento</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <embed
                                                    src="<?= base_url('uploads/documentos/' . $documento['archivo_path']) ?>"
                                                    type="application/pdf" width="100%" height="600px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No hay documentos disponibles.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal para aceptar documento -->
    <div class="modal fade" id="modalAceptacion" tabindex="-1" role="dialog" aria-labelledby="modalAceptacionLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAceptacionLabel">Comentario de Aceptación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para aceptar el documento con comentario -->
                    <form id="formAceptacion"
                        action="<?= site_url('Documento/aceptarDocumento/') ?>" method="post">
                        <div class="form-group">
                            <label for="comentarioAceptacion">Comentario de Aceptación:</label>
                            <textarea class="form-control" id="motivo" name="motivo"
                                rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Aceptar Documento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para rechazar documento -->
    <div class="modal fade" id="modalRechazo" tabindex="-1" role="dialog" aria-labelledby="modalRechazoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRechazoLabel">Motivo de Rechazo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para rechazar el documento con motivo -->
                    <form id="formRechazo" action="<?= site_url('Documento/procesar_rechazo') ?>" method="post">
                        <div class="form-group">
                            <label for="motivoRechazo">Motivo:</label>
                            <textarea class="form-control" id="motivo" name="motivo" rows="3"
                                required></textarea>
                        </div>
                        <input type="hidden" id="idDocumentoRechazo" name="idDocumento" value="">
                        <button type="submit" class="btn btn-danger">Rechazar Documento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Scripts para manejar acciones sobre documentos -->
    <script>
        function mostrarModalAceptacion(idDocumento) {
            // Actualiza el valor del formulario con el ID del documento
            $('#formAceptacion').attr('action', '<?= site_url('Documento/aceptarDocumento/') ?>' + idDocumento);
            $('#modalAceptacion').modal('show');
        }

        function mostrarModalRechazo(idDocumento) {
            // Actualiza el valor del formulario con el ID del documento
            $('#idDocumentoRechazo').val(idDocumento);
            $('#modalRechazo').modal('show');
        }
    </script>

</body>

</html>
