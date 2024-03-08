<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {
    public function obtenerUsuario($correo, $contrasena)
    {
        $this->db->where('nombre', $correo);
        $this->db->where('contrasena', $contrasena);

        $query = $this->db->get('usuarios');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }


}



