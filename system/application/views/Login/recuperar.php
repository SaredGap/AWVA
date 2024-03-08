
<link href="<?php echo base_url(); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.0.5/dist/sweetalert2.min.css">



<div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <p class="text-white-50 mb-0">Recupera tu contraseña.</p>
                                    <img src="<?php echo base_url(); ?>assets/images/logo.png"  height="100">
                                
                            </div>
                        </div>
                        <div class="card-body pt-5">

                            <div class="p-2">

                                <form class="form-horizontal" action="<?php echo site_url('C_login/enviarCorreo'); ?> "method="post">
                                    
                                    <div class="alert-warning text-center mt-4 mb-4" role="alert">
                                        <?php if (isset($success)) { ?>
                                        <p><?php echo $success; ?></p>
                                        <?php } ?>  
                                    </div>
                                    <div class="alert-warning text-center mt-4 mb-4" role="alert">
                                        <?php if (isset($failed)) { ?>
                                        <p><?php echo $failed; ?></p>
                                        <?php } ?>  
                                    </div>

                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        Ingresa tu correo electronico.
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">Correo electronico.</label>
                                        <input type="email" class="form-control" name ="correo" id="useremail" placeholder="Ingresa tu correo electronico.">
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Enviar</button>
                                        </div>
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
