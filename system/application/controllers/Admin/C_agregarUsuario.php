<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_agregarUsuario extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('M_login');
        $this->load->model('M_agregarUsuarios');
        $this->load->model('M_editarUsuarios');
		
		
    }
    
    public function O_usuarios()
	{
		$datos["title_meta"] = "Registro";
		$this->load->view('templates/header',$datos);
		$data['usuarios'] = $this->M_agregarUsuarios->obtenerUsuarios();
		$this->load->view('Admin/O_usuarios', $data);
		$this->load->view('templates/footer');
        $this->load->helper('url', 'form');
	}
    public function actualizar_estatus($id_usuario, $estatus_usuario) {
		$this->M_agregarUsuarios->actualizar_estatus($id_usuario, $estatus_usuario);
		//echo $id_examenes, $estatus;
		if( $this->db->affected_rows() == 0 ){ 
			$bandera = false;
		}
		else {
			$bandera = true;
		}
		echo json_encode($bandera);
	}
    

    public function agregarUsuario() {
        // Obtener los datos del formulario
        $nombre = $this->input->post("nombre");
        $apellido = $this->input->post("apellido");
        $correo = $this->input->post("correo");
        $contrasena = $this->input->post("contrasena");
        $confirmar_contrasena = $this->input->post('confirmar_contrasena');
        $tipousuario = $this->input->post("tipo_usuario");
        
        // Validar que se hayan proporcionado datos
        if (empty($nombre) || empty($apellido) || empty($correo) || empty($tipousuario)) {
            $data['error'] = "Por favor, completa todos los campos del formulario.";
            $datos["title_meta"] = "Crear Usuario";
            $this->load->view('templates/header', $datos);
            $this->load->view('Admin/C_Usuario', $data);
            $this->load->view('templates/footer');
            return;
        }
    
        // Verificar si las contraseñas coinciden.
        if ($contrasena === $confirmar_contrasena) {
            // Cargamos la biblioteca "upload" para manejar la carga de la foto
            $config['upload_path'] = './assets/images/users';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $config['max_width'] = 1500;
            $config['max_height'] = 1500;
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('profile_image')) {
                // El archivo se cargó correctamente
                $upload_data = $this->upload->data();
                $foto_perfil = $upload_data['file_name'];
    
                // Llamamos al modelo para agregar el usuario, pasando el nombre de la foto ya obtenido.
               
                $this->M_agregarUsuarios->agregarUsuario($nombre, $apellido, $correo, $contrasena, $tipousuario, $foto_perfil);
                
    
                // Redireccionar o mostrar mensaje de éxito
                $this->O_usuarios();
            } else {
                // Error en la carga del archivo
               
                $data['error'] = "Por favor suba una imagen.";
                $datos["title_meta"] = "Crear Usuario";
                $this->load->view('templates/header', $datos);
                $this->load->view('Admin/C_Usuario', $data);
                $this->load->view('templates/footer');
            }
        } else {
            // Si las contraseñas no coinciden, puedes mostrar un mensaje de error o redireccionar al formulario nuevamente.
            $data['error'] = "Las contraseñas no coinciden. Intenta de nuevo.";
            $datos["title_meta"] = "Crear Usuario";
            $this->load->view('templates/header', $datos);
            $this->load->view('Admin/C_Usuario', $data);
            $this->load->view('templates/footer');
        }
    }
    //EDITAR USUARIOS
    public function E_Usuario($id_usuario)
	{
		$datos["title_meta"] = "Editar Usuario";
		$this->load->view('templates/header',$datos);
        $usuario = $this->M_editarUsuarios->obtenerUsuarioPorID($id_usuario);
        $data['usuario'] = $usuario;
		$this->load->view('Admin/C_Usuario', $data);
		$this->load->view('templates/footer');
	}

    public function editarUsuario(){

        $id_usuario = $this->input->post('id_usuario');
        $nombre = $this->input->post("nombre");
        $apellido = $this->input->post("apellido");
        $correo = $this->input->post("correo");
        $contrasena = $this->input->post("contrasena");
        $confirmar_contrasena = $this->input->post('confirmar_contrasena');
        $tipousuario = $this->input->post("tipo_usuario");
        $foto_perfil = $this->input->post("foto_perfil");
    
        // Verificar si las contraseñas coinciden.
        if ($contrasena === $confirmar_contrasena) {        
            // Cargamos la biblioteca "upload" para manejar la carga de la foto
            $config['upload_path'] = './assets/images/users';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $config['max_width'] = 1500;
            $config['max_height'] = 1500;
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('profile_image')) {
                // El archivo se cargó correctamente
                $upload_data = $this->upload->data();
                $foto_perfil = $upload_data['file_name'];

             if (!empty($contrasena)|| empty($foto_perfil)) {
                $this->M_editarUsuarios->editarUsuario($id_usuario, $nombre, $apellido, $correo, $contrasena, $tipousuario, $foto_perfil);
            } else {
                $this->M_editarUsuarios->editarUsuarioSinContrasena($id_usuario, $nombre, $apellido, $correo, $tipousuario, $foto_perfil);
            }
            // Redireccionar o mostrar mensaje de éxito
            $this->O_usuarios();

            
            }else {
                $this->M_editarUsuarios->editarUsuarioSinFoto($id_usuario, $nombre, $apellido, $correo,$tipousuario);

                $this->O_usuarios();
            }	
        } else {
            // Si las contraseñas no coinciden, puedes mostrar un mensaje de error o redireccionar al formulario nuevamente.
            $data['error'] = "Las contraseñas no coinciden. Intenta de nuevo.";
            $datos["title_meta"] = "Editar Usuario";
            $this->load->view('templates/header',$datos);
            $usuario = $this->M_editarUsuarios->obtenerUsuarioPorID($id_usuario);
            $data['usuario'] = $usuario;
            $this->load->view('Admin/C_Usuario', $data);
            $this->load->view('templates/footer');
        }
     }
    


    

    public function actualizarEstado($id_usuarios) {
            // Obtiene el estado actual del usuario desde el formulario
            $estado_usuario = $this->input->post('estado_usuario');
        
            // Llama al modelo para actualizar el estado del usuario
            $this->M_agregarUsuarios->actualizarEstadoUsuario($id_usuarios, $estado_usuario);
        
            // Redirige a la página principal o a la lista de usuarios
            $this->O_usuarios();            
        }

    //ASIGNAR EXAMEN 
    public function AsignarE($id_usuarios){
        // Pasa el ID del usuario a la vista
		$datos["title_meta"] = "Admin";
		$this->load->view('templates/header',$datos);
		$data['examenes'] = $this->M_agregarUsuarios->obtenerExamenes();
        $data['id_usuarios'] = $id_usuarios;
		$this->load->view('Admin/A_Examen', $data);
		$this->load->view('templates/footer');
	}
    
    public function asignarExamen() {
       
        $examenes_seleccionados = $this->input->post('examenes');
        $id_usuarios = $this->input->post('id_usuarios');

        // Procesa la asignación de exámenes
        $this->M_agregarUsuarios->asignarExamenesUsuario($id_usuarios, $examenes_seleccionados);
    
        // Redirige a la página original o a cualquier otra que desees mostrar después de asignar los exámenes
        $this->O_usuarios();
    }
    
}