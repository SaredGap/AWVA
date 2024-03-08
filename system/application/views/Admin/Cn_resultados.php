<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body rounded-0">
                    <h1 class="d-flex justify-content-center">Resultados de Examenes</h1>
                </div>
            </div>
        </div>
    </div>

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
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td><?php echo $usuario->id_usuarios; ?></td>
                                <td>
                                    <img src="" alt="Foto"> <br>
                                    <?php echo $usuario->nombre; ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url() . "/Admin/C_admin/R_examenAdmin/" . $usuario->id_usuarios ?>" class="btn btn-sm btn-primary">Mostrar Calificaciones</a>
                                </td>
                            </tr>
                            <!-- Agrega más filas de la tabla aquí -->
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
