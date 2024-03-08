<div class="page-content">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body rounded-0">
                <?php echo isset($pregunta) ? '<h1 class="d-flex justify-content-center">Editar Pregunta</h1>' .$pregunta->id_preguntas : '<h1 class="d-flex justify-content-center">Crear Pregunta</h1>';?>
                </div>
            </div>
            <!-- BOTON PARA CREAR NUEVA PREGUNTA -->


          

            <!-- CARD CONTAINER -->
            
            <div class="card  mt-4">
                <div class="card-body rounded-0">
                               
                   <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form  class="outer-repeater" action="<?php echo isset($pregunta) ? site_url().'/Admin/C_Preguntas/updatePregunta/'.$pregunta->id_preguntas : site_url().'/Admin/C_Preguntas/Guardarpregunta';?>" method="post">
                                        <div data-repeater-list="outer-group" class="outer">
                                            <div data-repeater-item class="outer">
                                                <div class="mb-3">
                                                    <label class="form-label" for="formname">Pregunta:</label>
                                                    <input type="text" class="form-control" id="formname"
                                                        placeholder="Escriba su pregunta..." name="texto_p" value="<?php echo isset($pregunta) ? $pregunta->texto:''; ?>">
                                                </div>

                                                <div class="inner-repeater mb-4">
                                                    <div data-repeater-list="inner-group" class="inner mb-3">
                                                        <label class="form-label">Respuesta:</label>
                                                        <?php if(isset($pregunta)){ ?>
                                                        <?php foreach($respuestas as $respuesta){?>
                                                        <div data-repeater-item class="inner mb-3 row">
                                                            <div class="col-md-8 col-8">
                                                                <input type="text" class="inner form-control"
                                                                    placeholder="Escriba su respuesta..." name="respuesta_texto" value="<?php echo isset($respuesta) ? $respuesta->texto_r:''; ?>" />
                                                                    
                                                            </div>
                                                            <div class="col-md-2 col-2">

                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="flexRadioDefault1" name="flexRadioDefault1"
                                                                        class="form-check-input" value="<?php echo isset ($respuesta) ? $respuesta->es_correcta:'';?>" <?php echo  ($respuesta->es_correcta > 0 ) ? "checked" :'';?>>
                                                                    <label class="form-check-label" for="flexRadioDefault1">Correcta</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-4">
                                                                <input data-repeater-delete type="button"
                                                                    class="btn btn-primary w-100 inner" value="Delete" />
                                                            </div>
                                                        </div>

                                                        <?php } ?> 
                                                        <?php } else {?>
                                                            <div data-repeater-item class="inner mb-3 row">
                                                            <div class="col-md-8 col-8">
                                                                <input type="text" class="inner form-control"
                                                                    placeholder="Escriba su respuesta..." name="respuesta_texto" value="" />
                                                                    
                                                            </div>
                                                            <div class="col-md-2 col-2">

                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="flexRadioDefault1" name="flexRadioDefault1"
                                                                        class="form-check-input" value="">
                                                                    <label class="form-check-label" for="flexRadioDefault1">Correcta</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-4">
                                                                <input data-repeater-delete type="button"
                                                                    class="btn btn-primary w-100 inner" value="Delete" />
                                                            </div>
                                                        </div>
                                                        <?php } ?>      
                                                    </div>
                                                    <input data-repeater-create type="button" class="btn btn-success inner"
                                                        value="Agregar respuesta" id="crear_respuesta" />
                                                </div>

                                              
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                <a type="button" class="btn btn-danger mb-2" href="<?php echo site_url(); ?>/Admin/C_Preguntas/preguntas">Cancelar</a>
                                            </div>
                                        </div>
                                    
                                    
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- FIN DEL FORMULARIO -->
                </div>
            </div>
        </div>





    </div>


    