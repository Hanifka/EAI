<?php   


class Costeng_model extends CI_Model
{
    public function getCosteng($data){
        return $this->db->get($data)->result_array();
    }
}