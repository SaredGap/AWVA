<div class="page-content">
    <div class="row">
        <div class="card-body">
            <div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body rounded-0">
                            <h1 class="d-flex justify-content-center">Perfil</h1>
                        </div>
                        <div class="alert-warning text-center h5" role="alert">
                        <?php if (isset($error)) { ?>
                        <p><?php echo $error; ?></p>
                        <?php } ?>                   
                    </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body rounded-0">
                            <center>
                                <div class="user-img">
                                    <img src="<?php echo base_url('assets/images/users/'.$this->session->userdata('foto_perfil'))?>" alt=""
                                        class="avatar-md mx-auto rounded-circle">
                                </div>
                                <h3 class="d-flex justify-content-center">
                                    <?php echo $this->session->userdata('nombre_usuario'); ?>
                                </h3>
                                <div class="row">
                                    <center>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary w-100 waves-effect waves-light "
                                                type="button" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal1">Cambiar foto</button>
                                        </div>
                                    </center>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="card  mt-4">
                    <div class="card-body rounded-0">
                        <h1 class="d-flex justify-content-center">Datos Personales</h1>
                        <div class="mb-2">
                            <label class="form-label">Nombre:</label>
                            <label class="form-label"><?php echo $this->session->userdata('nombre_usuario'); ?></label>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Correo Electronico:</label>
                            <label class="form-label"><?php echo $this->session->userdata('correo'); ?></label>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Rol:</label>
                            <label class="form-label">
                                <?php
                                $rol = $this->session->userdata('id_perfil');
                                if ($rol == '1') {
                                    echo "Administrador";
                                } else {
                                    echo "Usuario Normal";
                                }
                                ?>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card  mt-4">
                    <div class="card-body rounded-0">
                        <h1 class="d-flex justify-content-center">Credencial</h1>
                        <div class="mb-2">
                            <label class="form-label">Usuario:</label>
                            <label class="form-label"><?php echo $this->session->userdata('nombre_usuario'); ?></label>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Clave:</label>
                            <label class="form-label">*****</label>
                        </div>
                        <div class="row">
                            <center>
                                <div class="col-md-2">
                                    <button class="btn btn-primary w-100 waves-effect waves-light " type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Cambiar Clave</button>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para cambiar contraseña -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?= site_url('C_login/cambiar_contrasena') ?>">
                    <div class="modal-body">
                        <!-- Formulario para ingresar nueva contraseña -->
                        <div class="col-md-12">
                        <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Contraseña</span>
                                <input type="text" class="form-control" placeholder="Contraseña" aria-label="Username" name="contrasena" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Confirmar Contraseña</span>
                                <input type="text" class="form-control" placeholder="Confirmar Contraseña" aria-label="Username" name="confirmar_contrasena" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para cambiar foto de perfil -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= site_url('C_login/cambiar_foto') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <input type="file" class="form-control" name="profile_image" enctype="multipart/form-data" id="userphoto">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    