<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_M extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Documento_Model');
		$this->load->helper('url');
	}
	public function InicioA()
	{
		$data['tipo_usuario'] = $this->session->userdata('tipo_usuario');
		$data['documentos'] = $this->Documento_Model->obtener_documentos_pendientes_del_maestro($this->session->userdata('id_usuario'));
		$datos["title_meta"] = "Maestro";
		$this->load->view('Maestro/Dashboard_M', $data);
		
	}




	}
	
	
	
