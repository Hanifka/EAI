<?php   


class Costeng_model extends CI_Model
{
    public function getCosteng(){
        return $this->db->get('engineer')->result_array();
    }
}