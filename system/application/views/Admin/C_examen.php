<div class="page-content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body rounded-0">
                <h1 class="d-flex justify-content-center">Examenes</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <form action="<?php echo isset($examen) ? site_url().'/Admin/C_admin/updateExamen/'.$examen->id_examenes : site_url().'/Admin/C_admin/storeExamen/';?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="align-self-center col-md-6">
                                    <div class="row">
                                        <h4 class="text-uppercase bottom-50 text-center"> Nombre del examen</h4>
                                    </div>
                                    <div class="row">
                                        <input class="form-control" type="text" name="examen" id="examen" value="<?php echo isset($examen) ? ''.$examen->titulo : ''; ?>" required>
                                    </div>
                                    <div class="row">
                                        <center>
                                        <div class="cold-md-7">
                                            <img id="uploadPreview1" width="75%" height="75%"  src="<?php echo isset($examen) ? base_url().'/assets/images/examenes'.$examen->imagen_examen : ''; ?>"/>
                                        </div>
                                        </center>   
                                    </div> 
                                </div>
                            
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            
                                                <div class="fallback">
                                                    <input id="uploadImage1" type="file" name="imagen_examen" onchange="previewImage(1);" >
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="align-self-center col-mb-6">
                                                        <center>
                                                            <i class="display-2 text-muted mdi mdi-cloud-upload"></i><br>
                                                            <label>Subir archivo</label>
                                                        </center>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div> 
                                <h5>Selecciona las preguntas que corresponden al examen</h5>
                                <!-- Tabla de datos -->
                                <div class="row">
                                    <div class="card">
                                        <div class="card-body">
                                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Pregunta</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                    <?php foreach ($preguntas as $pregunta): ?>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row"><?php echo $pregunta->id_preguntas; ?></th>
                                                                <td><?php echo $pregunta->texto; ?></td>
                                                                <td>
                                                                    <div class="form-check form-switch">
                                                                        <?php 
                                                                        $check=false;
                                                                        if(isset($preguntasexam)){
                                                                            foreach ($preguntasexam as $preguexam):
                                                                                if($pregunta->id_preguntas == $preguexam->pregunta_id){
                                                                                    $check=true;
                                                                                }
                                                                            endforeach; 
                                                                        } ?>
                                                                            <input class="form-check-input" type="checkbox" name="preguntas[<?php echo $pregunta->id_preguntas; ?>]" id="flexSwitchCheckChecked" <?php echo ($check) ? 'checked': '' ?>> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    <?php endforeach; ?>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                                                                    
                            <!-- Botones -->
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn btn-danger w-100 waves-effect waves-light" type="button" href="<?php echo site_url() . "/Admin/C_admin/O_examen"; ?>">Cancelar</a>
                                </div>
                                <div class="align-self-md-end col-md-6">
                                    <button button type="submit" class="btn btn-primary w-100 waves-effect waves-light"><?php echo isset($examen) ? 'Actualizar' : 'Guardar'; ?></button>
                                </div>
                            </div>
                        </form>                                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>