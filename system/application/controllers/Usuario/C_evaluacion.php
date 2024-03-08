<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_evaluacion extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Carga el modelo para interactuar con la base de datos
        $this->load->model('M_evaluacion');
        $this->load->library('session');
    }

// taer todo tanto como preguntas como espuesta en un array  
    public function index($examen_id) {

        $data['preguntas'] =$this->M_evaluacion->obtenerPreguntasExamenes($examen_id);
        $data['respuestaspregunta']  = array();
        foreach($data['preguntas'] as  $pregunta){
            $opcionesrespuesta = $this->M_evaluacion->obtenerRespuesta($pregunta->pregunta_id);
            $data['respuestaspregunta'] = array_merge($data['respuestaspregunta'] , $opcionesrespuesta);
        }

        $this->load->view('templates/header');
        $this->load->view('Alumno/Examen', $data);
		$this->load->view('templates/footer');
       
    }
// registrando respuestas del usuario

public function insertarRespuesta() {
  
    $respuestas = $this->input->post(); 
    $contadorPregunta =$this->input->post('contadorPregunta'); 
    $usuario = $this->session->userdata('id_usuario'); 

    print_r($respuestas);
    
    for($i=1; $i<$contadorPregunta; $i++){
        
        $correcta = $this->M_evaluacion->calificacionCorrecta($this->input->post('flexRadioDefault'.$i));
        // if($correcta->es_correcta == 1 ){
        //     $calificacion = 100;
            
        // }
        // else {
        //     $calificacion = 0;
        // }
        
        // ($correcta->es_correcta == 1) ? 100 : 0

        $datos_respuesta = array(
                    'usuario_id' => $usuario ,
                    'examenpreguntas_id' => $this->input->post('pregunta_id'.$i),
                    'respuesta_seleccionada_id' => $this->input->post('flexRadioDefault'.$i),
                    'calificacion' => ($correcta->es_correcta == 1) ? 100 : 0
                );
        
                $this->M_evaluacion->guardarRespuesta($datos_respuesta);

    redirect('/Usuario/C_usuario/InicioU');
    }
   
}


    
}