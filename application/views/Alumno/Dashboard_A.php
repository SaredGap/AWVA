<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz del Usuario - Alumno</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="<?php echo base_url('assets/css/Dashboard_M.css'); ?>" rel="stylesheet" type="text/css" />
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
                                <th>Comentario Maestro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($documentos as $documento): ?>
                                <tr class="<?= 'estado-' . strtolower($documento['estado']) ?>">
                                    <td>
                                        <?= htmlspecialchars($documento['titulo']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($documento['estado']) ?>
                                    </td>
                                    <td><?= htmlspecialchars($documento['motivo'] ?? '') ?></td>
                                    <td>
                                        <!-- Botón para ver archivo -->
                                        <button class="btn btn-outline-info" data-toggle="modal"
                                            data-target="#verDocumentoModal<?= $documento['id'] ?>">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAYJJREFUSEvtl11ygjAQx3dj71E8SfGtU3mIXqB6EvUk0gsYHqTTt3IT6T1KtrPUWIaSEiCOtVOe+Aj58d9vEC504IW4YAVLeR8IcbNw+TCtdZ4kz7HLWrOmESzlwwIRt502Qtzsdvu16zuN4NlsegCAwHWTk4oOcBuYXKFEECPCySXoCPcAxgmADqqucYF7ASfJPqvHRRvcG5hd0wXuFdwF7h3cBFcq/cYZDAaAzJIBnI5lSp4L3Jp5/2A2kQ8f/0FTcxXSmm4RyygN+ZplHu+VdZprthD49nlOj9Um0ze4MqXSiZTTLUCxQRy9KpWO5/NozX0YQGd8jwiXXLOFEIE3MFGxNEBumQw2rZOImwQrxCcGA+BdtVsNyeOj4igUAkIiWrHpvsDFGGC0MuBzKObhoDwYXDP1wSivqx2iOCeCrN7szUewBUxwmeCr51ff4GrN07YFVwHuNezZlDsr7jPe2qC2EeiHgT4KTUFo86HtudbvcZK85E3Pf98vTF+Vru99AAk+Ci5ShEjXAAAAAElFTkSuQmCC"/>
                                        </button>
                                        <!-- Botón para eliminar archivo -->
                                        <button class="btn btn-outline-danger" data-toggle="modal"
                                            data-target="#eliminarDocumentoModal<?= $documento['id'] ?>">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAARZJREFUSEvtVkEOwiAQ3EX/oU+pN6Me8Af1Z/2BHNR4sz+x/sOAYlKDFWEwRnpoj3TY2R2WZZgyfZyJl2BiKRelEGIaSlRr3Sh1qJBiIOL1enkiogIJeMfV2+1+FsNGiaWcT5lH51gg978xPFNqV4f2AMSrgtnYiikUUEoM1ybTD2IrqxDj0pVIazNhpseaMVQJwRefhDGc1tdKqWPjrdiVK+VMEWz3mF6kzkbsZu5cIeh6pO792Fy9Im6nlzuhfGtI0kkV+wKia90GHIifiqASorhB6qG5+tlc2SYX8vxZzM9H5r+JUb43nHUsSu03vgAfr9M37rJLEDKHQbNnyYlEETPyfg/26rHgkfm1vuDGqL0F4yTDbraVgC5eqmtpAAAAAElFTkSuQmCC"/>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal para ver detalles del documento -->
                                <div class="modal fade" id="verDocumentoModal<?= $documento['id'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="verDocumentoModalLabel<?= $documento['id'] ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="verDocumentoModalLabel<?= $documento['id'] ?>">Ver Documento</h5>
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

                                <!-- Modal para confirmar eliminación del documento -->
                                <div class="modal fade" id="eliminarDocumentoModal<?= $documento['id'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="eliminarDocumentoModalLabel<?= $documento['id'] ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="eliminarDocumentoModalLabel<?= $documento['id'] ?>">Eliminar Documento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Estás seguro de que deseas eliminar este documento?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
