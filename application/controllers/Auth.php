<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('Auth_Model');

    }
    public function index()
    {

        $this->load->view('Login/login');
    }


    public function iniciarSesion()
    {
        $correo = $this->input->post('Usuario');
        $contrasena = $this->input->post('Contraseña');
    
        $user = $this->Auth_Model->obtenerUsuario($correo, $contrasena);
    
        if ($user) {
            $this->session->set_userdata('tipo_usuario', $user->tipo_usuario);

            $this->session->set_userdata('nombre_usuario', $user->nombre);
            $this->session->set_userdata('id_usuario', $user->id);
            $this->session->set_userdata('correo', $user->correo);

    
            if ($user->tipo_usuario == 'Profesor') {
                $datos["title_meta"] = "Profesor";
                redirect('Maestro/Dashboard_M/InicioA');
                
                $this->load->view('assets/navbar',$datos);
            } else if ($user->tipo_usuario == 'Estudiante'){
                $datos["title_meta"] = "Estudiante";
                redirect('Alumno/Dashboard_A/InicioU');
               
                $this->load->view('assets/navbar',$datos);
            } else {
                $datos["title_meta"] = "Admin";
                redirect('Admin/Dashboard/Inicio');

                $this->load->view('assets/navbar',$datos);
            }
        } else {
            $data['error'] = 'Usuario o contraseña incorrectos ';
            $this->load->view('Login/login', $data);
        }
    }
    

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect(base_url('index.php/Auth/index'));
    }






}
