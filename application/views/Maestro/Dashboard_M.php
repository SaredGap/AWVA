<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz del Usuario - Maestro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="<?php echo base_url('assets/css/Dashboard_M.css'); ?>" rel="stylesheet" type="text/css" />
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
                                <tr class="<?= 'estado-' . strtolower($documento['estado']) ?>">
                                    <td><?= htmlspecialchars($documento['titulo']) ?></td>
                                    <td><?= htmlspecialchars($documento['nombre_alumno']) ?></td>
                                    <td><?= htmlspecialchars($documento['estado']) ?></td>
                                    <td><?= htmlspecialchars($documento['motivo'] ?? '') ?></td>
                                    <td>
                                        <?php if (strtolower($documento['estado']) === 'pendiente'): ?>
                                            <button class="btn btn-outline-success"
                                                onclick="mostrarModalAceptacion(<?= $documento['id'] ?>)"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAMNJREFUSEvt1NsRQDAQBdCrE6UohU6ohE4oRSlyZ2TGxGM3D/xsZoyP4GSvTSr8NKqfXBj8WfIWtUWdk0APYNmv03feaq4RQOuuFUB3hb8Be5RVfgarUK6oZMVqtCQchWphNsn00N7RqAaeXUc27pcM7mFuj3AkoRJcAyDMO0eIJ6MSzPk7PAvVwFc4TyPG/7hPpSNPu53CyrNQbcV+8Uf89kSSKvXz2oqPOP8vG42RJ49YOBkKXzS4WJTShyxqKaFi8xsQxDAfuS9EkgAAAABJRU5ErkJggg=="/></button>
                                            <button class="btn btn-outline-danger"
                                                onclick="mostrarModalRechazo(<?= $documento['id'] ?>)"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAPFJREFUSEvtlNENwjAMRK+bwCYwCTAJowCTwCZlFHpSLEUlcc6tRPmIP1vXrz77PGCjGDbiooN/pnyX+q+k3gG4AngAeDX+7ADgNuXuWx0oM35OQBZ8A7g4cOYwl8FcF66Az6kLK1iC51DmHVvqKGAW8uBhKAuq4Bqcz01eqVObfQRcgnPxLJry5gsXBc/hi6BRqQ0yn2lr24vOinY8h1rRMDwCLm0vZ8yD4VltVceeZRSff8GVjhWfhuEKeARgtvEsk8Pv6bxWT7YCJpRHwrvTBiD8lE5mFbrUTm5B9aXSsVorlNfBIbnWJHep16gX+vYDg2Y2HyWbDqIAAAAASUVORK5CYII="/></button>
                                        <?php endif; ?>
                                        <button class="btn btn-outline-primary" data-toggle="modal"
                                            data-target="#verDocumentoModal<?= $documento['id'] ?>"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAT1JREFUSEvtl9ENwjAMBd1JgEmASYBJgEmASWATYBLoIVuqStK4IVURwhI/SZrLcxzbVDKSVSNxpQs8FZG182A3ETk6176WxcAAD302qvfa1+t33m9i4GutAMV9zQ2PgR89iLi4eSUueAnwUr3TvJokvBT4oqrd8JJgbqcdlFHlpcFu+BDgEPyNUwLM/YaM52hPchCw5+X9wdFc3Sdz/aarSQQTjdKFViKUMmZ5mpx9V/mrVpHJCi6eC/mYdMgBziIy0xJIHWaesY3CeELFwGxqQEomYCudHArQScHzQAPxkWJczG+rDYSBOQRjBi6uGJAZCug2zNXMmfJQu5Sl2DZvF3s7BGoxggu1eKVtWWDPO02t+X5wbrMXU+5WnNPexqDBLqSroSdImjU1dY+heQKO4ExHW87uOd+M9t/pCZmoTx/udBQiAAAAAElFTkSuQmCC"/>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal para ver el documento -->
                                <div class="modal fade" id="verDocumentoModal<?= $documento['id'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="verDocumentoModalLabel<?= $documento['id'] ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="verDocumentoModalLabel<?= $documento['id'] ?>">Ver Documento</h5>
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
                                <td colspan="5">No hay documentos disponibles.</td>
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
