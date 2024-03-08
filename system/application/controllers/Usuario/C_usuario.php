<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_usuario extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	 	 public function __construct(){
		parent::__construct();
		$this->load->model('M_examen');
		
	}
	public function InicioU()
	{
		$usuario_id = $this->session->userdata('id_usuario');
		$datos["title_meta"] = "Alumno";
		$data['examenes']=$this->M_examen->obtenerExamenes();
		$data['examenes'] = $this->M_examen->obtener_examenes_usuario($usuario_id);
		$this->load->view('templates/header',$datos);
		$this->load->view('Alumno/InicioU',$data);
		$this->load->view('templates/footer');
	}
	public function R_examen()
	{
		$datos["title_meta"] = "Resultado";
		$data['calificaciones']=$this->M_examen->obtenerCalificacion();
		$this->load->view('templates/header',$datos);
		$this->load->view('Alumno/R_examen', $data);
		$this->load->view('templates/footer');
	}

	public function R_examenUsuario(){
		$datos["title_meta"] = "Resultado de examen";
		$data['calificaciones']=$this->M_examen->obtenerCalificacion($this->session->userdata('id_usuario'));
		$this->load->view('templates/header',$datos);
		$this->load->view('Alumno/R_examen', $data);
		$this->load->view('templates/footer');
	}

	public function Examen()
	{
		$datos["title_meta"] = "Examen";
		$this->load->view('templates/header',$datos);
		$this->load->view('Alumno/Examen');
		$this->load->view('templates/footer');
	}
}