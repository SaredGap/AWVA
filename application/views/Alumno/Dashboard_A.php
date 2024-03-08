<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz del Usuario - Alumno</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <div id="navbar-container">
        <?php include "assets/navbar.php" ?>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Mis Documentos</h2>
            </div>
            <div class="card-body">
                <?php if (!empty($documentos)): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Estado</th>
                                <th>Comentario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($documentos as $documento): ?>
                                <tr>
                                    <td>
                                        <?= $documento['titulo'] ?>
                                    </td>
                                    <td class="<?= strtolower($documento['estado']) ?>">
                                        <?= $documento['estado'] ?>
                                    </td>
                                    <td><?= $documento['motivo'] ?? '' ?></td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#verDocumentoModal<?= $documento['id'] ?>">Ver Documento</button>

                                        <!-- Agregado: Botón para eliminar archivo -->
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#eliminarDocumentoModal<?= $documento['id'] ?>">Eliminar</button>
                                    </td>
                                </tr>

                                <!-- Modal para ver detalles del documento -->
                                <div class="modal fade" id="verDocumentoModal<?= $documento['id'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="verDocumentoModalLabel<?= $documento['id'] ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="verDocumentoModalLabel<?= $documento['id'] ?>">Ver
                                                    Documento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <embed src="<?= base_url('uploads/documentos/' . $documento['archivo_path']) ?>"
                                                    type="application/pdf" width="100%" height="600px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Agregado: Modal para confirmar eliminación del documento -->
                                <div class="modal fade" id="eliminarDocumentoModal<?= $documento['id'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="eliminarDocumentoModalLabel<?= $documento['id'] ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="eliminarDocumentoModalLabel<?= $documento['id'] ?>">Eliminar
                                                    Documento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Estás seguro de que deseas eliminar este documento?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <!-- Agregado: Botón para confirmar eliminación -->
                                                <a href="<?= site_url('Documento/eliminar/' . $documento['id']) ?>"
                                                    class="btn btn-danger">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No hay documentos disponibles.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
