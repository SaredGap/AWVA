<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		//$this->load->view('welcome_message');
		$datos["title_meta"] = "Evaluador";
		$this->load->view('templates/header',$datos);
		$this->load->view('templates/footer');
	}

	public function tabla()
	{
		$datos["title_meta"] = "Evaluador";
		$this->load->view('templates/header',$datos);
		$this->load->view('tabla');
		$this->load->view('templates/footer');
	}

	public function InicioA()
	{
		$datos["title_meta"] = "Admin";
		$this->load->view('templates/header',$datos);
		$this->load->view('InicioA');
		$this->load->view('templates/footer');
	}

	public function InicioU()
	{
		$datos["title_meta"] = "Alumno";
		$this->load->view('templates/header',$datos);
		$this->load->view('InicioU');
		$this->load->view('templates/footer');
	}

	public function resultadoP()
	{
		$datos["title_meta"] = "Resultado";
		$this->load->view('templates/header',$datos);
		$this->load->view('resultadoP');
		$this->load->view('templates/footer');
	}

	public function registroU()
	{
		$datos["title_meta"] = "Registro";
		$this->load->view('templates/header',$datos);
		$this->load->view('registroU');
		$this->load->view('templates/footer');
	}

	public function guardarX($id)
	{
		//Ir al modelo y consultar el id
		$this->nombre_modelo->funcion($id);
	}

	public function guardarPost()
	{
		$this->input->post();
		$var = $this->input->post('apellido');
		//Ir al modelo y consultar el id
		$this->nombre_modelo->funcion($var);
	}
}
