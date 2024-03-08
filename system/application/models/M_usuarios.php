<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usuarios extends CI_Model{

    function __construct()  
      {  
         parent::__construct();  
      } 

    public function obtenerUsuarios(){
        $this->db->where('id_perfil', 2);
        $query = $this->db->get('usuarios');
        return $query->result();
    }
}
?>