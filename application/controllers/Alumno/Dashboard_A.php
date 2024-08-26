<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_A extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Documento_model');
    }

    public function inicioU()
    {
        $data['tipo_usuario'] = $this->session->userdata('tipo_usuario');
		$data['documentos'] = $this->Documento_model->obtener_documentos_del_alumno($this->session->userdata('id_usuario'));
        $data['maestros'] = $this->Documento_model->obtener_maestros();
        $data['tiposDocumentos'] = $this->Documento_model->obtener_tipos_documentos();
        $data['documentos'] = $this->Documento_model->obtener_tipos_documentos();
        $this->load->view('Alumno/Inicio', $data);

       
    }

    public function Dashboard()
    {
        $data['tipo_usuario'] = $this->session->userdata('tipo_usuario');
		$data['documentos'] = $this->Documento_model->obtener_documentos_del_alumno($this->session->userdata('id_usuario'));
        $data['maestros'] = $this->Documento_model->obtener_maestros();
        $data['tiposDocumentos'] = $this->Documento_model->obtener_tipos_documentos();
        $this->load->view('Alumno/Dashboard_A', $data);
       
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        header('Location:' . base_url() . "index.php/Auth/index");
    }

    public function archivos()
    {
        $this->load->view('Alumno/Archivos');
    }
    

    public function mostrar_dashboard() {
        // Obtener la lista de documentos desde la base de datos
        $data['documentos'] = $this->Documento_model->obtener_documentos_del_alumno($this->session->userdata('id_usuario'));
    
        // Cargar la vista con la lista de documentos
        $this->load->view('Alumno/Dashboard_A', $data);
    }
}
