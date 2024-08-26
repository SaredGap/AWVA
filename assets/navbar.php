<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Dinámico por Roles</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.min.css">
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Sistema Escolar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if ($tipo_usuario === 'Estudiante'): ?>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo base_url('index.php//Alumno/Dashboard_A/InicioU'); ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('index.php/Alumno/Dashboard_A/Dashboard'); ?>">Mis
                            Documentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#subirDocumentoModal">Subir
                            Documento</a>
                    </li>
                <?php elseif ($tipo_usuario === 'Profesor'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Documentos Pendientes</a>
                    </li>
                <?php elseif ($tipo_usuario === 'Admin'): ?>

                    <li class="nav-item">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('index.php/Admin/Dashboard/Inicio'); ?>">Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('index.php/Admin/Dashboard/Documentos'); ?>">Tipo de
                            Documentos</a>
                    </li>
                    <li class="nav-item">

                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('index.php/Auth/logout'); ?>">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Modal para subir el documento -->
    <div class="modal fade" id="subirDocumentoModal" tabindex="-1" role="dialog"
        aria-labelledby="subirDocumentoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="subirDocumentoModalLabel">Subir Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formularioSubirDocumento" action="<?= site_url('Documento/procesar_subida') ?>"
                        method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="tipoDocumento">Tipo de Documento:</label>
                            <select class="form-control" id="tipoDocumento" name="tipoDocumento" required>
                                <?php foreach ($tiposDocumentos as $tipoDocumento): ?>
                                    <option value="<?= $tipoDocumento['id'] ?>">
                                        <?= $tipoDocumento['nombre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="titulo">Título del Documento:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="form-group">
                            <label for="maestro">Seleccionar Maestro:</label>
                            <select class="form-control" id="maestro" name="maestro">
                                <?php foreach ($maestros as $maestro) {
                                    echo '<option value="' . $maestro['id'] . '">' . $maestro['nombre'] . '</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="archivo">Subir Archivo:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="archivo" name="archivo" accept=".pdf"
                                    required>
                                <label class="custom-file-label" for="archivo">Seleccionar archivo</label>
                            </div>
                            <small class="form-text text-muted">Solo se permiten archivos .pdf de hasta 5 MB.</small>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="confirmarSubidaDocumento()">Subir
                            Documento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Actualiza el texto del label cuando se selecciona un archivo
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            var fileName = document.getElementById("archivo").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });

        function confirmarSubidaDocumento() {
            var archivoInput = document.getElementById('archivo');
            var archivo = archivoInput.files[0];

            // Validar el tipo de archivo
            var fileTypes = ['application/pdf'];
            if (fileTypes.indexOf(archivo.type) === -1) {
                alert('Por favor, selecciona un archivo válido (.pdf).');
                return;
            }

            // Validar el tamaño del archivo (máximo 5 MB)
            var maxSize = 5 * 1024 * 1024;
            if (archivo.size > maxSize) {
                alert('El archivo es demasiado grande. El tamaño máximo permitido es de 5 MB.');
                return;
            }

            // Si pasa las validaciones, envía el formulario
            document.getElementById('formularioSubirDocumento').submit();
        }
    </script>





    <!-- Modal para crear usuario -->
    <div class="modal fade" id="crearUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="crearUsuarioModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearUsuarioModalLabel">Crear Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('Admin/Dashboard/crear_usuario') ?>" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="form-group">
                            <label for="contrasena">Contraseña:</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                        </div>
                        <div class="form-group">
                            <label for="tipo_usuario">Tipo de Usuario:</label>
                            <select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
                                <option value="Estudiante">Estudiante</option>
                                <option value="Profesor">Profesor</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar un nuevo tipo de documento -->
    <div class="modal fade" id="modalAgregarTipoDocumento" tabindex="-1" role="dialog"
    aria-labelledby="modalAgregarTipoDocumentoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarTipoDocumentoLabel">Agregar Tipo de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar un nuevo tipo de documento -->
                <form id="formAgregarTipoDocumento" action="<?= site_url('Documento/agregar_tipo_documento') ?>"
                    method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombreTipoDocumento">Nombre del Tipo de Documento</label>
                        <input type="text" class="form-control" id="nombreTipoDocumento" name="nombreTipoDocumento" required>
                    </div>
                    <div class="form-group">
                        <label for="propositoTipoDocumento">Propósito del Tipo de Documento</label>
                        <input type="text" class="form-control" id="propositoTipoDocumento" name="propositoTipoDocumento" required>
                    </div>
                    <div class="form-group">
                        <label for="contenidoTipoDocumento">Contenido del Tipo de Documento</label>
                        <textarea class="form-control" id="contenidoTipoDocumento" name="contenidoTipoDocumento" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="documento">Documento</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="documento" name="documento" accept=".pdf" required>
                            <label class="custom-file-label" for="documento">Seleccionar archivo</label>
                        </div>
                        <small class="form-text text-muted">Acepta archivos PDF</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var customFileInput = document.querySelector('.custom-file-input');
        var customFileLabel = document.querySelector('.custom-file-label');
        
        customFileInput.addEventListener('change', function () {
            var fileName = this.files.length > 0 ? this.files[0].name : 'Seleccionar archivo';
            customFileLabel.textContent = fileName;
        });
    });
</script>
</body>

</html>