<?php
class M_agregarUsuarios extends CI_Model{

    public function obtenerUsuarios() {
        // Realiza la consulta para obtener los exámenes desde la base de datos
        $query = $this->db->get('usuarios');

        // Verifica si existen registros
        if ($query->num_rows() > 0) {
            // Si hay registros, convierte los resultados en un array
            return $query->result_array();
        } else {
            // Si no hay registros, devuelve un array vacío
            return array();
        }
    }
    public function agregarUsuario($nombre,$apellido,$correo,$contrasena,$tipousuario,$foto_perfil){
        
		
		$data = array(
			"nombre"=>$nombre,
			"apellido"=>$apellido,
			"correo_electronico"=>$correo,
			"contraseña"=>$contrasena,
			"id_perfil"=>$tipousuario,
            "foto_perfil"=>$foto_perfil,
            "estatus_usuario" => 1
            
		);

        $this->db->query("ALTER TABLE usuarios AUTO_INCREMENT 1");
        $this->db->insert("usuarios",$data);
        // Retorna el ID del usuario insertado
        return $this->db->insert_id();

    }
    public function getUsuarioById($usuario_id) {
        // Realiza la consulta en la base de datos para obtener los detalles del usuario por ID
        $query = $this->db->get_where('usuarios', array('id_usuarios' => $usuario_id));
        return $query->row_array();
    }
    //ASIGNACION DE EXAMENES
    
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
    
     
    public function asignarExamenesUsuario($id_usuarios, $examenes_seleccionados) {
        // Asociar los exámenes seleccionados al usuario en la tabla "usuarios_examenes"
        foreach ($examenes_seleccionados as $examen_id) {
            $data = array(
                'usuario_id' => $id_usuarios,
                'examen_id' => $examen_id,
                'estatus_examen' => 1

            );
            
            $this->db->insert('usuariosexamen', $data);
        }
    }

   //ACTUALIZAR STATUS DE USUARIO
    public function actualizar_estatus($id_usuario, $estatus_usuario) {
        //$this->db->where('id_examenes', $id_examenes);
        //$this->db->update('examenes', array('estatus' => $estatus));
  
        $this->db->set('estatus_usuario',$estatus_usuario);
            $this->db->where('id_usuarios', $id_usuario);
            $this->db->update('usuarios');
      }

}
?>