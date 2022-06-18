<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Engineering extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pfnmodel');
        }
    public function Index()
    {
        $data['datanya'] = $this->pfnmodel->tampil_data('biaya_reparasi')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Engineering',$data);
        $this->load->view('template/footer');
    } 

    public function Create_Data_engineering(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Create_Engineering');
        $this->load->view('template/footer');
    }
 
    public function tambah_aksi(){
        $data1 = $this->input->post('data1');
        $data2 = $this->input->post('data2');
        $data3 = $this->input->post('data3');
        $data4 = $this->input->post('data4');
        $data5 = $this->input->post('data5');
        $data = array(
            'mesin' => $data1,
            'biaya' => $data2,
            'Engineer' => $data3,
            'status' => $data4,
            'keterangan' => $data5
            );
        $this->pfnmodel->input_data($data,'engineer');
  redirect('Finance');
    }

    public function hapus($id){
            $where = array('no' => $id);
            $this->pfnmodel->hapus_data($where,'engineer');
            redirect('Engineering');
}

    public function Tampil_update($id){
        $where = array('no' => $id);
        $data['user'] = $this->pfnmodel->edit_data($where,'engineer')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Update_Engineering',$data);
        $this->load->view('template/footer');
        }


    public function update(){
        $data1 = $this->input->post('data1');
        $data2 = $this->input->post('data2');
        $data3 = $this->input->post('data3');
        $data4 = $this->input->post('data4');
        $data5 = $this->input->post('data5');
        $data6 = $this->input->post('id');
        $data = array(
            'mesin' => $data1,
            'biaya' => $data2,
            'Engineer' => $data3,
            'status' => $data4,
            'keterangan' => $data5
            );
 
         $where = array(
        'no' => $data6
         );
 
        $this->pfnmodel->update_data($where,$data,'engineer');
        redirect('Engineering');
}
    // public function Tambahin()
    // {
    //     $this->load->view('template/header');
    //     $this->load->view('template/sidebar');
    //     $this->load->view('dashboard');
    //     $this->load->view('template/footer');
    // }   
}
/*End of file Dashboard.php*/
/*Location:./application/controllers/Dashboard.php*/