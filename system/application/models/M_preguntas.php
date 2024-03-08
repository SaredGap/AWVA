<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_preguntas extends CI_Model{

    function __construct()  
      {  
         parent::__construct();  
      } 

    public function obtenerPreguntas(){
        $query = $this->db->get('preguntas');
        return $query->result();
    }

    public function actualizar_estatus($id_preguntas, $estatus_pregunta) {
      //$this->db->where('id_examenes', $id_examenes);
      //$this->db->update('examenes', array('estatus' => $estatus));

      $this->db->set('estatus_pregunta',$estatus_pregunta);
		  $this->db->where('id_preguntas', $id_preguntas);
		  $this->db->update('preguntas');
    }
}
?>