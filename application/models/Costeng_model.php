<?php   


class Costeng_model extends CI_Model
{
    public function getCosteng($data,$id = null){
        if( $id === null ){
            return $this->db->get($data)->result_array();
        }else{
            return $this->db->get_where($data,['id'=> $id])->result_array();
        }
        // return $this->db->get($data)->result_array();
    }

    public function deleteCosteng($data,$id){
        $this->db->delete($data,['id'=> $id]);
        return $this->db->affected_rows();

    }
    public function createCosteng($data,$isi){
        $this->db->insert($data,$isi);
        return $this->db->affected_rows();
    }
    public function updateCosteng($data,$isi,$id){
        $this->db->update($data,$isi,['id'=>$id]);
        return $this->db->affected_rows();
    }
}