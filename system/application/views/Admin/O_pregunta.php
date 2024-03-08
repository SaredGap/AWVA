<div class="page-content">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body rounded-0">
                <h1 class="d-flex justify-content-center">Preguntas</h1>
            </div>
        </div>
    </div>

    <a class="btn btn-primary" href="<?php echo site_url() . "/Admin/C_admin/C_pregunta"; ?>" class="waves-effect">Crear
        Pregunta</a>


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
                                <th>Pregunta</th>
                                <th>Acciones</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Preguntas as $preguntas) { ?>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <?php echo $preguntas->texto; ?>
                                    </td>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-outline-warning btn-sm"
                                            href="<?php echo site_url() . "/Admin/C_Preguntas/editarPreguntas/" . $preguntas->id_preguntas ?>"><i
                                                class="fas fa-edit"></i></i> Editar</a>
                                    </td>
                                    <td>
                                    <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="<?php echo $preguntas->id_preguntas; ?>" <?php echo ($preguntas->estatus_preguntas > 0) ? 'checked' : ''; ?> onClick="cambiarEstatus(this)">
                                            <label class="form-check-label" for="<?php echo $preguntas->id_preguntas; ?>"><?php echo ($preguntas->estatus_preguntas > 0) ? 'Activo' : 'Inactivo'; ?></label>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            <!-- Agrega más filas de la tabla aquí -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/O_pregunta.js"></script>