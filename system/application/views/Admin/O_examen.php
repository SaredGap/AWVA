<div class="page-content">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body rounded-0">
                <h1 class="d-flex justify-content-center">Examenes</h1>
            </div>
        </div>
    </div>

    <a class="btn btn-primary" href="<?php echo site_url() . "/Admin/C_admin/C_examen"; ?>" class="waves-effect">Crear
        Examen</a>

    <br />
    <br />

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre del Examen</th>
                                <th>Acciones</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($examenes as $examen): ?>
                                <tr>
                                    <td><?php echo $examen->id_examenes; ?></td>
                                    <td>
                                        <?php echo $examen->titulo; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning btn-sm btn-editar">
                                            <?php echo anchor('/Admin/C_admin/editExamen/' . $examen->id_examenes, '<i class="fas fa-edit"></i> Editar'); ?>
                                        </button>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="<?php echo $examen->id_examenes; ?>" <?php echo ($examen->estatus > 0) ? 'checked' : ''; ?> onClick="cambiarEstatus(this)">
                                            <label class="form-check-label" for="<?php echo $examen->id_examenes; ?>"><?php echo ($examen->estatus > 0) ? 'Activo' : 'Inactivo'; ?></label>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- Agrega más filas de la tabla aquí -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url(); ?>assets/js/O_examen.js"></script>