<div class="page-content">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body rounded-0">
                <h1 class="d-flex justify-content-center">Usuarios</h1>
            </div>
        </div>
    </div>

    <a class="btn btn-primary" href="<?php echo site_url() . "/Admin/C_admin/C_Usuario"; ?>" class="waves-effect">Crear Usuario</a>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Usuarios</th>
                                <th>Acciones</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr>
                                    <td>
                                        <?php echo $usuario['nombre']; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-warning btn-sm"
                                            href="<?php echo site_url(); ?>/Admin/C_agregarUsuario/E_Usuario/<?php echo $usuario['id_usuarios']; ?>"><i
                                                class="fas fa-edit"></i>Editar</a>
                                         <a type="button" class="btn btn-outline-success btn-sm"
                                            href="<?php echo site_url(); ?>/Admin/C_agregarUsuario/AsignarE/<?php echo $usuario['id_usuarios']; ?>"><i
                                                class="fas fa-edit"></i> Asignar Examen</a>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="<?php echo $usuario['id_usuarios'] ?>" <?php echo ($usuario['estatus_usuario'] > 0) ? 'checked' : ''; ?>
                                                onClick="cambiarEstatus(this)">
                                            <label class="form-check-label" for="<?php echo $usuario['id_usuarios'] ?>"><?php echo ($usuario['estatus_usuario'] > 0) ? 'Activo' : 'Inactivo'; ?></label>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <!-- Agrega más filas de la tabla aquí -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    

    <script src="<?php echo base_url(); ?>assets/js/O_usuarios.js"></script>