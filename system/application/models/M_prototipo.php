<?php
class M_prototipo extends CI_Model{

	public function getPreguntas() {
		return $this->db->select('*')
		->from('preguntas')
		->get()
		->result();
	}

	public function getPregunta($id_preguntas) {
		return $this->db->select('*')
						->from('preguntas')
						->where('id_preguntas',$id_preguntas)
						->get()
						->row();
	}

	
	public function getRespuestas($pregunta_id) {
		return $this->db->select('*')
		->from('opcionesrespuesta')
		->where('pregunta_id',$pregunta_id)
		->get()
		->result();
	}

    public function guardarpregunta($datos){
		//print_r($datos);
		$this->db->insert("preguntas",$datos);
	}

    public function guardarrespuesta($datos){
		//print_r($datos);
		$this->db->insert("opcionesrespuesta",$datos);
	}

	public function borrarRespuesta($pregunta_id){
		$this->db->where('pregunta_id', $pregunta_id);
		$this->db->delete('opcionesrespuesta');
	}

	public function updatePregunta($id_preguntas,$pregunta){
		$this->db->set('texto',$pregunta);
		$this->db->where('id_preguntas', $id_preguntas);
		$this->db->update('preguntas');
	}

	public function C_usuarios(){
		return $this->db->count_all('usuarios');
	}

	public function C_examenes(){
		return $this->db->count_all('examenes');
	}
}
?>