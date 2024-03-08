<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    public function obtener_todos_usuarios()
    {
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }
    public function actualizar_usuario($idUsuario, $datosUsuario)
    {
        $this->db->where('id', $idUsuario);
        $this->db->update('usuarios', $datosUsuario);
    }

    public function actualizar_tipo($id, $datosUsuario)
    {
        $this->db->where('id', $id);
        $this->db->update('tipos_documentos', $datosUsuario);
    }

    public function eliminar($idUsuario)
    {
        $this->db->where('id', $idUsuario);
        $this->db->delete('usuarios');
    }

    public function eliminartipo($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tipos_documentos');
    }

    public function crear_usuario($data) {
        $this->db->insert('usuarios', $data);
    }

    public function obtener_tipos_documentos() {
        $query = $this->db->get('tipos_documentos');
        return $query->result_array();
    }
}
