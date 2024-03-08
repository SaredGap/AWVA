<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body rounded-0">
                        <h1 class="d-flex justify-content-center">DashBoard</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="avatar-sm font-size-20 me-3">
                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                <i class="mdi mdi-file-document"></i>
                            </span>
                        </div>
                        <div class="flex-1">
                            <div class="font-size-16 mt-2">Examenes</div>
                        </div>
                    </div>
                    <h4 class="mt-4"><?php echo $conteo_e ?></h4>
                    <div class="row">
                        <div class="col-5 align-self-center">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="avatar-sm font-size-20 me-3">
                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                <i class="mdi mdi-account-multiple-outline"></i>
                            </span>
                        </div>
                        <div class="flex-1">
                            <div class="font-size-16 mt-2">Usuarios</div>
                        </div>
                    </div>
                    <h4 class="mt-4"><?php echo $conteo ?></h4>  
                    <div class="row">
                   
                        <div class="col-5 align-self-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Usuarios Destacados</h4>
                    <ul class="inbox-wid list-unstyled">
                        <li class="inbox-list-item">
                            <a href="javascript: void(0);">
                                <div class="d-flex align-items-start">
                                    <div class="me-3 align-self-center">
                                        <img src="assets/images/users/avatar-3.jpg" alt="avatar-3"
                                            class="avatar-sm rounded-circle">
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Paul</h5>
                                        <p class="text-truncate mb-0">Hey! there I'm available</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="inbox-list-item">
                            <a href="javascript: void(0);">
                                <div class="d-flex align-items-start">
                                    <div class="me-3 align-self-center">
                                        <img src="assets/images/users/avatar-4.jpg" alt="avatar-4"
                                            class="avatar-sm rounded-circle">
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Mary</h5>
                                        <p class="text-truncate mb-0">This theme is awesome!</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="inbox-list-item">
                            <a href="javascript: void(0);">
                                <div class="d-flex align-items-start">
                                    <div class="me-3 align-self-center">
                                        <img src="assets/images/users/avatar-5.jpg" alt="avatar-5"
                                            class="avatar-sm rounded-circle">
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Cynthia</h5>
                                        <p class="text-truncate mb-0">Nice to meet you</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="inbox-list-item">
                            <a href="javascript: void(0);">
                                <div class="d-flex align-items-start">
                                    <div class="me-3 align-self-center">
                                        <img src="assets/images/users/avatar-6.jpg" alt="avatar-6"
                                            class="avatar-sm rounded-circle">
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Darren</h5>
                                        <p class="text-truncate mb-0">I've finished it! See you so</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="text-center">
                        <a href="<?php echo site_url() . "/Admin/C_admin/Cn_resultados"; ?>"  class="btn btn-primary">
                            <span>Mas Informacion</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>