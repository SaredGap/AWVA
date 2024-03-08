<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Preguntas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_prototipo');
		$this->load->model('M_preguntas');
		$this->load->helper('url');
	}

	public function preguntas() {
		$datos['Preguntas']= $this->M_prototipo->getPreguntas();
			$this->load->view('templates/header');
			$this->load->view('Admin/O_pregunta', $datos);
			$this->load->view('templates/footer');
	}
	
    public function Guardarpregunta(){
		//print_r($this->input->post());
		$res = $this->input->post('outer-group');
		//print_r($res [0]['inner-group']);	
		$pregunta = array(
			"texto" => $res [0]['texto_p']
		);
		$this->M_prototipo->guardarpregunta($pregunta);
		if( $this->db->affected_rows() > 0 )
		{
			$pregunta_id = $this->db->insert_id();
			foreach($res[0]['inner-group'] as $respuestas)
				{
					$this->Guardarrespuesta($pregunta_id, $respuestas);
				}
			
			
			$this->preguntas();
		} 


	} 

	public function Guardarrespuesta($id_pregunta,$POST)
	{
		//print_r($this->input->post());
		$respuesta = array(
			"texto_r" => $POST["respuesta_texto"],
			"pregunta_id" => $id_pregunta,
			"es_correcta" => isset($POST['flexRadioDefault1']) ? 1 : 0,
		);	
		$this->M_prototipo->guardarrespuesta($respuesta);//TODO cambiar por usuario
		//Validar si se inserto correctamente


		//Dentro if (todo esta correcto) enviar o redireccionar ala vista de usuarios(listado)
		if ($this->db->affected_rows() > 0)
		{
			//$this->users();
		}
		
	}

	public function editarPreguntas ($pregunta_id){
			$datos['pregunta']= $this->M_prototipo->getPregunta($pregunta_id);
			$datos['respuestas']= $this->M_prototipo->getRespuestas($pregunta_id);
			$this->load->view('templates/header');
			$this->load->view('Admin/C_pregunta',$datos);
			$this->load->view('templates/footer');

	}

	public function updatePregunta($id_pregunta)
	{
		//print_r($this->input->post());
		
		if($this->input->post()){
			$res = $this->input->post('outer-group');
			$this->M_prototipo->updatePregunta($id_pregunta,$res [0]['texto_p']);
			$this->M_prototipo->borrarRespuesta($id_pregunta);
			
			foreach($res[0]['inner-group'] as $respuestas)
				{
					$this->Guardarrespuesta($id_pregunta, $respuestas);
				}
			
		}

		redirect('Admin/C_preguntas/preguntas');
		
	}

	public function actualizar_estatus($id_preguntas, $estatus_pregunta) {
		$this->M_preguntas->actualizar_estatus($id_preguntas, $estatus_pregunta);
		//echo $id_examenes, $estatus;
		if( $this->db->affected_rows() == 0 ){ 
			$bandera = false;
		}
		else {
			$bandera = true;
		}
		echo json_encode($bandera);
	}


	
}
?>