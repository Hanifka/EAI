<?php
class PFN_model extends CI_Model{
public function __construct() {
        parent::__construct();
    }

	function tampil_data(){
			return $this->db->get('engineer');
		}



}