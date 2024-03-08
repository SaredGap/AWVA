<div class="vertical-menu">
    <div class="h-100">
        <div class="user-wid text-center py-4">
            <div class="user-img">
            <img src="<?php echo base_url('assets/images/users/'.$this->session->userdata('foto_perfil'))?>" alt=""
                                        class="avatar-md mx-auto rounded-circle">
                    
            </div>
            <div class="mt-3">
                <a href="javascript: void(0);" class="text-dark fw-medium font-size-16">
                    <?php echo $this->session->userdata('nombre_usuario'); ?>
                </a>
                <p class="text-body mt-1 mb-0 font-size-13">
                    <?php 
                        $rol = $this->session->userdata('id_perfil');
                        if ($rol == '1') {
                            echo "Administrador";
                        } else {
                            echo "Usuario Normal";
                        }
                    ?>
                </p>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <div class="sidebar">
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>
                    <?php if ($rol == '1'): ?>
                        <li>
                            <a href="<?php echo site_url() . "/Admin/C_Admin/InicioA"; ?>" class="waves-effect">
                                <i class="mdi mdi-home"></i>
                                <span>Panel De Control</span>
                            </a>
                        </li>
                        <li>
                        <a href="<?php echo site_url() . "/Admin/C_agregarUsuario/O_usuarios"; ?>" class="waves-effect">
                                <i class="mdi mdi-account-multiple"></i>
                                <span>Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() . "/Admin/C_admin/O_examen"; ?>" class="waves-effect">
                                <i class="mdi mdi-file-document"></i>
                                <span>Exámenes</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() . "/Admin/C_Preguntas/preguntas"; ?>" class="waves-effect">
                                <i class="mdi mdi-pencil"></i>
                                <span>Preguntas</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() . "/Admin/C_admin/Cn_resultados"; ?>" class="waves-effect">
                                <i class="mdi mdi-chart-pie"></i>
                                <span>Resultados</span>
                            </a>
                        </li>
                       
                    <?php else: ?>
                        <li>
                            <a href="<?php echo site_url() . "/Usuario/C_usuario/InicioU"; ?>" class="waves-effect">
                                <i class="mdi mdi-home"></i>
                                <span>Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() . "/Usuario/C_usuario/R_examenUsuario"; ?>" class="waves-effect">
                                <i class="mdi mdi-star"></i>
                                <span>Calificaciones</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
