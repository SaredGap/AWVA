<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_editarUsuarios extends CI_Model {

    public function obtenerUsuarioPorID($id_usuario) {
        // Obtener los datos del usuario por su ID desde la base de datos
        $this->db->where('id_usuarios', $id_usuario);
        $query = $this->db->get('usuarios');
        return $query->row_array();
    }
    public function editarUsuario($id_usuario,$nombre,$apellido,$correo,$contrasena,$tipousuario,$foto_perfil) {

		$data = array(
			"nombre"=>$nombre,
			"apellido"=>$apellido,
			"correo_electronico"=>$correo,
			"contraseña"=>$contrasena,
			"id_perfil"=>$tipousuario,
            "foto_perfil"=>$foto_perfil
           
		);
        $this->db->where('id_usuarios', $id_usuario);
        $this->db->update('usuarios', $data);

    }
    public function editarUsuarioSinContrasena($id_usuario,$nombre,$apellido,$correo,$tipousuario,$foto_perfil) {

		$data = array(
			"nombre"=>$nombre,
			"apellido"=>$apellido,
			"correo_electronico"=>$correo,
			"id_perfil"=>$tipousuario,
            "foto_perfil"=>$foto_perfil
           
		);
        $this->db->where('id_usuarios', $id_usuario);
        $this->db->update('usuarios', $data);

    }
    public function editarUsuarioSinFoto($id_usuario,$nombre,$apellido,$correo,$tipousuario) {

		$data = array(
			"nombre"=>$nombre,
			"apellido"=>$apellido,
			"correo_electronico"=>$correo,

			"id_perfil"=>$tipousuario
           
		);
        $this->db->where('id_usuarios', $id_usuario);
        $this->db->update('usuarios', $data);

    }

}
