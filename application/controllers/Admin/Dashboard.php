<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model');
        $this->load->model('Documento_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function Inicio()
    {
        $data['tipo_usuario'] = $this->session->userdata('tipo_usuario');
        $data['usuarios'] = $this->Admin_Model->obtener_todos_usuarios();
        $this->load->view('Admin/Dashboard', $data);
    }

    public function editar_usuario($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $this->input->post('nombre');
            $correo = $this->input->post('correo');
            $data = array(
                'nombre' => $nombre,
                'correo' => $correo,
            );
            $this->load->model('Admin_Model');
            $this->Admin_Model->actualizar_usuario($id, $data);
            redirect('Admin/Dashboard/Inicio');
        } else {
            $this->load->model('Admin_Model');
            $data['usuario'] = $this->Admin_Model->obtener_usuario_por_id($id);
            redirect('Admin/Dashboard/Inicio', $data);
        }
    }

	public function editar_tipo($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $this->input->post('nombre');
            $data = array(
                'nombre' => $nombre,
            );
            $this->load->model('Admin_Model');
            $this->Admin_Model->actualizar_tipo($id, $data);
            redirect('Admin/Dashboard/Documentos');
        } else {
            $this->load->model('Admin_Model');
            $data['usuario'] = $this->Admin_Model->obtener_usuario_por_id($id);
            redirect('Admin/Dashboard/Documentos', $data);
        }
    }

    public function actualizar_usuario($id, $data)
    {
        if (!empty($id) && !empty($data)) {
            $this->db->where('id', $id);
            $this->db->update('usuarios', $data);
            return true;
        }
        return false;
    }

    public function eliminar_usuario($idUsuario)
    {
        $this->Admin_Model->eliminar($idUsuario);
        redirect('Admin/Dashboard/Inicio');
    }

    public function crear_usuario()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
        $this->form_validation->set_rules('correo', 'Correo', 'required');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required');
        $this->form_validation->set_rules('tipo_usuario', 'Tipo de Usuario', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('Admin/Dashboard/Inicio');
        } else {
            $nombre = $this->input->post('nombre');
            $apellidos = $this->input->post('apellidos');
            $correo = $this->input->post('correo');
            $contrasena = $this->input->post('contrasena');
            $tipo_usuario = $this->input->post('tipo_usuario');
            $data = array(
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'correo' => $correo,
                'contrasena' => $contrasena,
                'tipo_usuario' => $tipo_usuario
            );
            $this->Admin_Model->crear_usuario($data);
            redirect('Admin/Dashboard/Inicio');
        }
    }



    public function Documentos() {
        $data['tipo_usuario'] = $this->session->userdata('tipo_usuario');
        $data['tiposDocumentos'] = $this->Documento_model->obtener_tipos_documentos();
        $this->load->view('Admin/Documentos', $data);
    }

	public function eliminar_tipodocumento($id)
    {
        $this->Admin_Model->eliminartipo($id);
        redirect('Admin/Dashboard/Documentos');
    }
}
