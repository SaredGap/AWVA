<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="<?php echo base_url('assets/css/admin.css'); ?>" rel="stylesheet" type="text/css" />
</head>

<body>

    <div id="navbar-container">
        <?php include "assets/navbar.php"; ?>
    </div>

    <div class="container mt-3">
        <h2 class="text-center">Gestión de Usuarios</h2>
        <a class="nav-link" href="#" data-toggle="modal" data-target="#crearUsuarioModal">Crear Usuario
                        </a>
        <div class="table-responsive">
            
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td>
                                <?= $usuario['id'] ?>
                            </td>
                            <td>
                                <?= $usuario['nombre'] ?>
                            </td>
                            <td>
                                <?= $usuario['correo'] ?>
                            </td>
                            <td>
                                <?= $usuario['tipo_usuario'] ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#editarUsuarioModal<?= $usuario['id'] ?>">
                                    Editar
                                </button>

                                <!-- Botón para abrir el modal de confirmación de eliminación -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#eliminarUsuarioModal<?= $usuario['id'] ?>">
                                    Eliminar
                                </button>

                                <!-- Modal de confirmación de eliminación -->
                                <div class="modal fade" id="eliminarUsuarioModal<?= $usuario['id'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="eliminarUsuarioModalLabel<?= $usuario['id'] ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="eliminarUsuarioModalLabel<?= $usuario['id'] ?>">
                                                    Confirmar Eliminación</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estás seguro de que deseas eliminar este usuario?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <!-- Enlace para eliminar el usuario y redirigir a la misma página -->
                                                <a href="<?= site_url('Admin/Dashboard/eliminar_usuario/' . $usuario['id']) ?>"
                                                    class="btn btn-danger">
                                                    Eliminar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de Edición de Usuario -->
                                <div class="modal fade" id="editarUsuarioModal<?= $usuario['id'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="editarUsuarioModalLabel<?= $usuario['id'] ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editarUsuarioModalLabel<?= $usuario['id'] ?>">
                                                    Editar Usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulario de edición -->
                                                <form action="<?= site_url('Admin/Dashboard/editar_usuario/' . $usuario['id']) ?>"
                                                    method="post">
                                                    <!-- Campos de edición -->
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre:</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                                            value="<?= $usuario['nombre'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="correo">Correo Electrónico:</label>
                                                        <input type="email" class="form-control" id="correo" name="correo"
                                                            value="<?= $usuario['correo'] ?>">
                                                    </div>
                                                    <!-- Otros campos a editar -->

                                                    <!-- Botón de guardar cambios -->
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>