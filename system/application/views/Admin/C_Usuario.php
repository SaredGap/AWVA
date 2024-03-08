<div class="page-content">
    <div class="card">
        <div class="card-body rounded-0">
            <h1 class="d-flex justify-content-center">
                <?php echo isset($usuario) ? 'Editar Usuario' : 'Nuevo Usuario'; ?>
            </h1>
        </div>
    </div>
    <div class="alert-warning text-center h5" role="alert">
        <?php if (isset($error)) { ?>
            <p>
                <?php echo $error; ?>
            </p>
        <?php } ?>
    </div>
    <div class="card-body pt-5">
        <div class="p-2">
            <form class="form-horizontal"
                action="<?php echo isset($usuario) ? site_url('Admin/C_agregarUsuario/editarUsuario') : site_url('Admin/C_agregarUsuario/agregarUsuario'); ?>"
                method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_usuario"
                    value="<?php echo isset($usuario['id_usuarios']) ? $usuario['id_usuarios'] : ''; ?>">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="username">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="username" placeholder="Ingresa nombre"
                            value="<?php echo isset($usuario['nombre']) ? $usuario['nombre'] : ''; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="username">Apellidos</label>
                        <input type="text" class="form-control" name="apellido" id="apellido"
                            placeholder="Ingresa Apellidos"
                            value="<?php echo isset($usuario['apellido']) ? $usuario['apellido'] : ''; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="useremail">Correo</label>
                        <input type="email" class="form-control" name="correo" id="useremail"
                            placeholder="Ingresa Correo"
                            value="<?php echo isset($usuario['correo_electronico']) ? $usuario['correo_electronico'] : ''; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="tipo_usuario">Tipo de Usuario</label>
                        <select name="tipo_usuario" class="form-select mb-3" require
                            aria-label="Default select example">
                            <option value="<?php echo isset($usuario['id_perfil']) ? $usuario['id_perfil'] : ''; ?>">
                                Tipo Usuario</option>
                            <option value="1">Admin</option>
                            <option value="2">Alumno</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="userpassword">Contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="contrasena" id="userpassword"
                                placeholder="Ingresa Contraseña"
                                value="<?php echo isset($usuario['contraseña']) ? $usuario['contraseña'] : ''; ?>">
                            <button class="btn btn-primary" type="button" onclick="mostrarContrasena()">
                                <i class="mdi mdi-eye-off"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="userpassword-confirm">Confirmar Contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="confirmar_contrasena"
                                id="userpassword-confirm" placeholder="Confirmar Contraseña"
                                value="<?php echo isset($usuario['contraseña']) ? $usuario['contraseña'] : ''; ?>">
                            <button class="btn btn-primary" type="button" onclick="mostrarContrasena2()">
                                <i class="mdi mdi-eye-off"></i>
                            </button>
                        </div>
                    </div>

                </div>


                <div class="mb-3">
                    <label class="form-label" for="userphoto">Foto de perfil</label>

                    <input type="file" class="form-control" name="profile_image" enctype="multipart/form-data"
                        id="userphoto">

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-danger w-100 waves-effect waves-light"
                            href="<?php echo site_url() . "/Admin/C_agregarUsuario/O_usuarios"; ?>"
                            type="button">Cancelar</a>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">
                            <?php echo isset($usuario) ? 'Editar Usuario' : 'Registrar Usuario'; ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>



</style>

<script>
    function mostrarContrasena() {
        var tipo = document.getElementById("userpassword");
        if (tipo.type == "password") {
            tipo.type = "text";
        } else {
            tipo.type = "password";
        }
    }
</script>

<script>
    function mostrarContrasena2() {
        var tipo = document.getElementById("userpassword-confirm");
        if (tipo.type == "password") {
            tipo.type = "text";
        } else {
            tipo.type = "password";
        }
    }
</script>