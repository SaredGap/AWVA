<div class="page-content">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body rounded-0">
                <h1 class="d-flex justify-content-center">Examen Seguro Social</h1>  <!-- cambiar por un echo--> 
            </div>
        </div>
    </div>
    <?php $cont = 1;?> <!-- inicia el examen--> 
    <form method="post" action="<?php echo site_url().'/Usuario/C_evaluacion/insertarRespuesta'; ?>">
    
    <div class="row justify-content-center mt-5">  <!--Incrementamos el margen superior --> 
        <?php foreach($preguntas as $pregunta) { ?>
        <div class="card" id="card<?php echo $cont;?>">
            <div class="card-body text-center">
                <div class="pregresp">
                    <div class="pregunta">
                        <h1 class="display-5"><?php echo $pregunta->texto;?></h1> 
                        
                        <input type="hidden" value="<?php echo $pregunta->id_examen_preguntas;?>" name="pregunta_id<?php echo $cont;?>"> 
                    </div>   
                    <!-- mostramos respuesta falta el js para el boton type="radio"--> 
                        <?php foreach($respuestaspregunta as $respuesta) {?>
                            <?php if($pregunta->pregunta_id == $respuesta->pregunta_id) {?>
                                <div class="respuestas"> 
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="flexRadioDefault<?php echo $respuesta->pregunta_id;?>"
                                            class="form-check-input" value="<?php echo $respuesta->id_opciones_respuestas;?>" >
                                        <label id="flexRadioDefault<?php echo $respuesta->id_opciones_respuestas?>" class="form-check-label btn btn-lg btn-secondary mx-2 my-2 waves-effect waves-light" for="flexRadioDefault<?php echo $respuesta->pregunta_id;?>"><?php echo $respuesta->texto_r;?></label>
                                    </div>
                                </div>
                            <?php }?>
                        <?php }?>
                    <div class="row justify-content-center mt-5"> <!-- Incrementamos el margen superior -->
                        <?php if($cont == 1) { ?>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-lg btn-outline-primary btn-block waves-effect waves-light" disabled>Pregunta anterior</button>
                            </div>
                        <?php }else {?>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-lg btn-outline-primary btn-block waves-effect waves-light" onclick="anterior(<?php echo $cont - 1;?>);">Pregunta anterior</button>
                            </div>
                        <?php }?>
                        <?php if($cont == sizeof($preguntas)) { ?>
                            <div class="col-md-6">
                                <!-- falta el form para enviar las respuestas al controlador con el submit  -->
                                <button type="submit" class="btn btn-lg btn-outline-primary btn-block waves-effect waves-light" >Finalizar Examen</button>

                            </div>
                        <?php }else {?>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-lg btn-outline-primary btn-block waves-effect waves-light" onclick="siguiente(<?php echo $cont + 1;?>);">Pregunta siguiente</button>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        
        <?php $cont++; }?>
        <input type="hidden" value="<?php echo $cont;?>" name="contadorPregunta"> 

        </form>
    </div>
    
</div>
<script>

    var contador = <?php echo $cont;?>;
    document.addEventListener("DOMContentLoaded", () => {

        for(var i = 2; i< contador; i++){
            $('#card'+i).hide();
        }
    });

    function siguiente(card){
        $('#card'+(card-1)).hide();
        $('#card'+card).show();
        
    }

    function anterior(card){
        $('#card'+card).show();
        $('#card'+(card+1)).hide();
    }

    function seleccionar(element){
        element.classList.remove("btn-secondary");
        element.classList.add("btn-success");
 
    }

    

</script>
