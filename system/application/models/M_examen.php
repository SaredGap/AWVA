<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_examen extends CI_Model{

    function __construct()  
      {  
         parent::__construct();  
      } 

    public function obtenerExamenes(){
        $query = $this->db->get('examenes');
        return $query->result();
    }

    public function obtenerPreguntasExamenes($examen_id){
      return $this->db->select('*')
              ->from('examenpreguntas')
              ->where('examen_id',$examen_id)
              ->get()
              ->result();
  }

  public function borrarPreguntasExamenes($examen_id){
      $this->db->where('examen_id', $examen_id);
      $this->db->delete('examenpreguntas');
  }

  public function insertarPreguntasExamenes($registro){
      $this->db->insert('examenpreguntas', $registro);
  }

  public function updateImgExamen($id_examenes, $imagen_examen){
      $data = array(
        "imagen_examen" => $imagen_examen
      );

      $this->db->where('id_examenes', $id_examenes);
      $this->db->update('examenes', $data);
  }

  public function guardarExamen($titulo, $imagen_examen){
    $data = array(
			'titulo' => $titulo,
      'imagen_examen' => $imagen_examen

    	);
    	$this->db->insert('examenes', $data);
		if( $this->db->affected_rows() > 0 ) {
			$examen_id = $this->db->insert_id();

		}
  }

    public function actualizar_estatus($id_examenes, $estatus) {
      $this->db->set('estatus',$estatus);
		  $this->db->where('id_examenes', $id_examenes);
		  $this->db->update('examenes');
    }
  

    public function getExamenId($id){
      return $this->db->select('*')
              ->from('examenes')
              ->where('id_examenes',$id)
              ->get()
              ->row();
    }

    public function obtenerCalificacion($id){
        return $this->db->select('*')
        ->from('vista_califinal')
        ->where('id_usuarios',$id)

        ->get()
        ->result();
    }
    public function obtener_examenes_usuario($usuario_id) {
      $this->db->select('*');
      $this->db->from('usuariosexamen'); // Asegúrate de que estás consultando la tabla de asignaciones
      $this->db->join('examenes', 'usuariosexamen.examen_id = id_examenes');
      $this->db->where('usuariosexamen.usuario_id', $usuario_id);
      $query = $this->db->get();
      return $query->result();
  }
}
?>