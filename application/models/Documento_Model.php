<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Documento_model extends CI_Model
{

    public function guardar_documento($tipoDocumento, $titulo, $nombreArchivo, $maestro_id)
    {
        $data = array(
            'usuario_id' => $this->session->userdata('id_usuario'),
            'titulo' => $titulo,
            'archivo_path' => $nombreArchivo,
            'estado' => 'pendiente',
            'fecha_subida' => date('Y-m-d H:i:s'),
            'maestro_id' => $maestro_id,
        );

        $this->db->insert('documentos', $data);
    }

    public function obtener_todos_archivos()
    {
        $query = $this->db->get('documentos');
        return $query->result_array();
    }

    public function obtener_maestros()
    {
        $this->db->where('tipo_usuario', 'profesor');
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }

    public function obtener_documentos_del_alumno($usuario_id)
    {
        $this->db->select('*');
        $this->db->from('documentos');
        $this->db->where('usuario_id', $usuario_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function obtener_documentos_pendientes_del_maestro($maestro_id)
    {
        $this->db->select('documentos.*, usuarios.nombre as nombre_alumno');
        $this->db->from('documentos');
        $this->db->join('usuarios', 'usuarios.id = documentos.usuario_id');
        $this->db->where('documentos.maestro_id', $maestro_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function obtener_documento_por_id($idDocumento)
    {
        $this->db->where('id', $idDocumento);
        $query = $this->db->get('documentos');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function procesar_rechazo_documento($idDocumento, $motivoRechazo)
    {
        $data = array(
            'estado' => 'rechazado',
            'motivo' => $motivoRechazo,
        );

        $this->db->where('id', $idDocumento);
        $this->db->update('documentos', $data);
    }

    public function eliminarDocumento($documento_id)
    {
        $this->db->where('id', $documento_id);
        $this->db->delete('documentos');
    }

    public function aceptarDocumento($idDocumento, $comentario)
    {
        $data = array(
            'estado' => 'Aceptado',
            'motivo' => $comentario
        );
        $this->db->where('id', $idDocumento);
        $this->db->update('documentos', $data);
    }

    public function obtener_tipos_documentos() {
        $query = $this->db->get('tipos_documentos');
        return $query->result_array();
    }

    public function agregarTipoDocumento($nombreTipoDocumento)
    {
        // Insertar el nuevo tipo de documento en la base de datos
        $data = array(
            'nombre' => $nombreTipoDocumento
        );
        $this->db->insert('tipos_documentos', $data);
    }

    

}



