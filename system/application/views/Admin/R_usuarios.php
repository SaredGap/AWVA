<div class="page-content">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body rounded-0">
                <h1 class="d-flex justify-content-center">Usuario</h1>
            </div>
        </div>
    </div>

    <a class="btn btn-primary" href="<?php echo site_url() . "/Admin/C_admin/C_Usuario"; ?>" class="waves-effect">Crear Usuario</a>
<br>
<br>
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Usuario</h4>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre de Usuario</th>
                        <th>Acciones</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sared</td>
                        <td>
                            <button type="button" class="btn btn-outline-warning btn-sm" ><i class="fas fa-edit"></i>Editar</button>
                            <a type="button" class="btn btn-outline-success btn-sm" href="<?php echo site_url() . "/Admin/C_Admin/AsignarE"; ?>"><i class="fas fa-edit"></i> Asignar Examen</a>
                        </td>
                        
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


