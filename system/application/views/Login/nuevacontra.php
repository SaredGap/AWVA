<head>
    <link href="<?php echo base_url(); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

</head>

<div class="page-content">

<div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">ODABIR</h5>
                                <p class="text-white-50 mb-0">Ingresa tu nueva contraseña</p>

                                <a href="/" class="logo logo-admin mt-4">
                                    <img src="<?php echo base_url(); ?>assets/images/logo-sm-dark.png" alt="logo-sm-dark" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">

                            <div class="p-2">

                                <form class="form-horizontal" action="<?php echo site_url('C_login/guardarNuevaContrasena'); ?> "method="post">

                                    <div class="mb-3">
                                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                                        <label class="form-label" for="useremail">Contraseña</label>
                                        <input type="text" class="form-control" name="contrasena" id="useremail" placeholder="Ingresa la nueva contraseña.">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">Confirmar Contraseña</label>
                                        <input type="text" class="form-control" name="confirmar_contrasena"id="useremail" placeholder="Confirma la nueva contraseña.">
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Enviar</button>
                                        </div>
                                    </div>

                                    <div class="alert-warning text-center mt-4 mb-4" role="alert">
                                        <?php if (isset($error)) { ?>
                                        <p><?php echo $error; ?></p>
                                        <?php } ?>
                                         
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />