<?php
class pfnmodel extends CI_Model{
public function __construct() {
        parent::__construct();
    }

	function tampil_data($data){
			return $this->db->get($data);
		}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}


	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
 
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	


	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
}