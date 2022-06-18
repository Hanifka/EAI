<?php   


class Costeng_model extends CI_Model
{
    public function getCosteng($data,$id = null,$conditional =null){
        if( $id === null &&  $conditional === null ){
            return $this->db->get($data)->result_array();
        }else{
            return $this->db->get_where($data,[$conditional=> $id])->result_array();
        }
        // return $this->db->get($data)->result_array();
    }

    public function deleteCosteng($data,$id,$conditional){
        $this->db->delete($data,[$conditional=> $id]);
        return $this->db->affected_rows();

    }
    public function createCosteng($data,$isi){
        $this->db->insert($data,$isi);
        return $this->db->affected_rows();
    }
    public function updateCosteng($data,$isi,$id,$conditional){
        $this->db->update($data,$isi,[$conditional=>$id]);
        return $this->db->affected_rows();
    }
}