<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información General</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <div id="navbar-container">
        <?php include "assets/navbar.php" ?>
    </div>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Información General</h2>

        <!-- Carta de Presentación -->
        <div class="card mb-4 border-primary" data-toggle="modal" data-target="#modalDocumentoPresentacion">
            <div class="card-header bg-primary text-white">
                <h5>Carta de Presentación</h5>
            </div>
            <div class="card-body">
                <p><strong>Propósito:</strong> Introducirte a un empleador potencial y resaltar tus habilidades y
                    experiencias relevantes.</p>
                <p><strong>Contenido:</strong> Información sobre quién eres, tu interés en la posición, y cómo tus
                    habilidades y experiencia se alinean con los requisitos del trabajo.</p>
            </div>
        </div>

        <!-- Carta de Aceptación -->
        <div class="card mb-4 border-success" data-toggle="modal" data-target="#modalDocumentoAceptacion">
            <div class="card-header bg-success text-white">
                <h5>Carta de Aceptación</h5>
            </div>
            <div class="card-body">
                <p><strong>Propósito:</strong> Confirmar formalmente que aceptas una oferta de empleo, admisión a una
                    institución educativa, participación en un programa, etc.</p>
                <p><strong>Contenido:</strong> Agradecimiento por la oferta, confirmación de aceptación, detalles
                    relevantes (fecha de inicio, condiciones, etc.).</p>
            </div>
        </div>

        <!-- Memoria de Estadías -->
        <div class="card mb-4 border-warning" data-toggle="modal" data-target="#modalDocumentoMemoria">
            <div class="card-header bg-warning text-white">
                <h5>Memoria de Estadías</h5>
            </div>
            <div class="card-body">
                <p><strong>Propósito:</strong> Documentar y reflexionar sobre las experiencias y aprendizajes adquiridos
                    durante un período específico de prácticas o estancias.</p>
                <p><strong>Contenido:</strong> Descripción de las actividades realizadas, logros, desafíos superados y
                    cómo la experiencia contribuyó al crecimiento personal o profesional.</p>
            </div>
        </div>

        <!-- Carta de Finalización -->
        <div class="card mb-4 border-danger" data-toggle="modal" data-target="#modalDocumentoFinalizacion">
            <div class="card-header bg-danger text-white">
                <h5>Carta de Finalización</h5>
            </div>
            <div class="card-body">
                <p><strong>Propósito:</strong> Comunicar la culminación exitosa de un programa, curso, proyecto o
                    trabajo.</p>
                <p><strong>Contenido:</strong> Resumen de lo logrado, agradecimientos a las personas o instituciones
                    involucradas, y cualquier información adicional necesaria.</p>
            </div>
        </div>

    </div>

    <!-- Modales para los documentos -->

    <!-- Modal para el documento de Carta de Presentación -->
    <div class="modal fade" id="modalDocumentoPresentacion" tabindex="-1" role="dialog"
        aria-labelledby="modalDocumentoPresentacionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDocumentoPresentacionLabel">Documento de Carta de
                        Presentación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed src="<?= base_url('uploads/Ejemplos/Borrador-CartaPresentacion.pdf') ?> " type="application/pdf" width="100%" height="600px">
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalDocumentoAceptacion" tabindex="-1" role="dialog"
        aria-labelledby="modalDocumentoPresentacionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDocumentoPresentacionLabel">Documento de Carta de
                        Aceptación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed src="<?= base_url('uploads/Ejemplos/Borrador-CartaAceptacion.pdf') ?>" type="application/pdf" width="100%" height="600px">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDocumentoMemoria" tabindex="-1" role="dialog"
        aria-labelledby="modalDocumentoPresentacionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDocumentoPresentacionLabel">Documento Memoria de Estadías</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed src="<?= base_url('uploads/Ejemplos/Borrador-Memoria.pdf') ?>" type="application/pdf" width="100%" height="600px">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDocumentoFinalizacion" tabindex="-1" role="dialog"
        aria-labelledby="modalDocumentoPresentacionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDocumentoPresentacionLabel">Documento de Carta de
                        Termino</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed src="<?= base_url('uploads/Ejemplos/Borrador-CartaTermino.pdf') ?>" type="application/pdf" width="100%" height="600px">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
