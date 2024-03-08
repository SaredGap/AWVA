<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cusuario extends CI_Controller {

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

	public function InicioA()
	{
		$datos["title_meta"] = "Admin";
		$this->load->view('templates/header',$datos);
		$this->load->view('Admin/InicioA');
		$this->load->view('templates/footer');
	}

	public function R_usuarios()
	{
		$datos["title_meta"] = "Registro";
		$this->load->view('templates/header',$datos);
		$this->load->view('Admin/R_usuarios');
		$this->load->view('templates/footer');
	}

	public function C_pregunta()
	{
		$datos["title_meta"] = "Crear Examen";
		$this->load->view('templates/header',$datos);
		$this->load->view('Admin/C_pregunta');
		$this->load->view('templates/footer');
	}

	public function O_examen()
	{
		$datos["title_meta"] = "Vista Examen";
		$this->load->view('templates/header',$datos);
		$this->load->view('Admin/O_examen');
		$this->load->view('templates/footer');
	}

	public function O_pregunta()
	{
		$datos["title_meta"] = "Vista Examen";
		$this->load->view('templates/header',$datos);
		$this->load->view('Admin/O_pregunta');
		$this->load->view('templates/footer');
	}

	public function C_examen()
	{
		$datos["title_meta"] = "Vista Examenes nuevos";
		$this->load->view('templates/header',$datos);
		$this->load->view('Admin/C_examen');
		$this->load->view('templates/footer');
	}

	public function C_Usuario()
	{
		$datos["title_meta"] = "Crear Usuario";
		$this->load->view('templates/header',$datos);
		$this->load->view('Admin/C_Usuario');
		$this->load->view('templates/footer');
	}

	public function Cn_resultados()
	{
		$datos["title_meta"] = "Vista Resultados";
		$this->load->view('templates/header',$datos);
		$this->load->view('Admin/Cn_resultados');
		$this->load->view('templates/footer');
	}

}
