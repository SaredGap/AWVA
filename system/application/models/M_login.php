<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
//LOGIN

public function obtenerUsuario($correo, $contraseña) {
    $this->db->where('nombre', $correo);
    $this->db->where('contraseña', $contraseña);
    
    // Agregar el filtro del estado del usuario (asumiendo que el campo se llama 'estado')
    $this->db->where('estatus_usuario', 1);

    $query = $this->db->get('usuarios');

    if ($query->num_rows() == 1) {
        return $query->row();
    } else {
        return false;
    }
}

//RECUPER CONTRASEÑA

    public function obtenerCorreo($correo) {
        $this->db->where('correo_electronico', $correo);
        
        $query = $this->db->get('usuarios');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function guardarToken($user_id, $token) {
        $data = array(
        'token' => $token
    );

    $this->db->where('id_usuarios', $user_id);
    $this->db->update('usuarios', $data);

    }
    public function obtenerToken($token) {
        // Realiza una consulta a la base de datos para obtener el usuario asociado al token.
        // Asegúrate de tener una columna en tu tabla de usuarios para almacenar el token de restablecimiento.

        $this->db->where('token', $token);
        $query = $this->db->get('usuarios');

        // Verifica si la consulta encontró un resultado.
        if ($query->num_rows() > 0) {
            // Devuelve el usuario encontrado.
            return $query->row_array();
        } else {
            // Si no se encontró un usuario con el token proporcionado, devuelve NULL o un valor que indique que no se encontró el usuario.
            return NULL;
        }
    }
    public function guardarNuevaContrasena($user_id, $contrasena) {
        // Actualiza la contraseña del usuario en la base de datos.
        // Asegúrate de tener una columna para almacenar la contraseña en la tabla de usuarios.

        $data = array(
            'contraseña' => ($contrasena), // Hashea la contraseña antes de almacenarla en la base de datos.
            'token' => null // Puedes eliminar el token de restablecimiento después de que se haya utilizado.
        );

        $this->db->where('id_usuarios', $user_id);
        $this->db->update('usuarios', $data);
    }


//AGREGAR USUARIOS

    
    public function agregarUsuario($nombre,$apellido,$correo,$contrasena,$tipousuario){
        
		
		$data = array(
			"nombre"=>$nombre,
			"apellido"=>$apellido,
			"correo_electronico"=>$correo,
			"contraseña"=>$contrasena,
			"id_perfil"=>$tipousuario
		);

        $this->db->query("ALTER TABLE usuarios AUTO_INCREMENT 1");
        $this->db->insert("usuarios",$data);
        // Retorna el ID del usuario insertado
        return $this->db->insert_id();

    }
    public function obtenerExamenes() {
        // Realiza la consulta para obtener los exámenes desde la base de datos
        $query = $this->db->get('examenes');

        // Verifica si existen registros
        if ($query->num_rows() > 0) {
            // Si hay registros, convierte los resultados en un array
            return $query->result_array();
        } else {
            // Si no hay registros, devuelve un array vacío
            return array();
        }
    }

    public function asociarExamenesUsuario($usuario_id, $examenesSeleccionados) {
        // Asociar los exámenes seleccionados al usuario en la tabla "usuarios_examenes"
        foreach ($examenesSeleccionados as $examen_id) {
            $data = array(
                'usuario_id' => $usuario_id,
                'examen_id' => $examen_id
            );
            $this->db->insert('usuariosexamen', $data);
        }
    }
    public function actualizar_contrasena($id_usuario,$contrasena)
    {
        $data = array(
            'contraseña' =>$contrasena
        );

        $this->db->where('id_usuarios', $id_usuario);
        $this->db->update('usuarios', $data);
    }
    public function cambiar_foto($id_usuario,$foto_perfil) {

        $data = array(
            "foto_perfil"=>$foto_perfil
        );

        $this->db->where('id_usuarios', $id_usuario);
        $this->db->update('usuarios', $data);
    }
}
?>