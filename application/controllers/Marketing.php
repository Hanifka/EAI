<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pfnmodel');
        }
    public function Index()
    {
        $data['datanya'] = $this->pfnmodel->tampil_data('data_pengiklanan')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Marketing',$data);
        $this->load->view('template/footer');
    } 

    public function Create_Data_iklan(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Create_iklan');
        $this->load->view('template/footer');
    }
 
    public function tambah_aksi(){
        $data1 = $this->input->post('data1');
        $data2 = $this->input->post('data2');
        $data3 = $this->input->post('data3');
        $data4 = $this->input->post('data4');
        $data5 = $this->input->post('data5');
        $data6 = $this->input->post('data6');
        $data = array(
            'Purpose' => $data1,
            'Platform' => $data2,
            'Periode' => $data3,
            'Biaya' => $data4,
            'PJ' => $data5,
            'Hasil' => $data6
            );
        $this->pfnmodel->input_data($data,'data_pengiklanan');
        redirect('Marketing');
    }

    public function hapus($id){
            $where = array('id' => $id);
            $this->pfnmodel->hapus_data($where,'data_pengiklanan');
            redirect('Marketing');
}

    public function Tampil_update($id){
        $where = array('id' => $id);
        $data['user'] = $this->pfnmodel->edit_data($where,'data_pengiklanan')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Update_iklan',$data);
        $this->load->view('template/footer');
        }


    public function update(){
        $data1 = $this->input->post('data1');
        $data2 = $this->input->post('data2');
        $data3 = $this->input->post('data3');
        $data4 = $this->input->post('data4');
        $data5 = $this->input->post('data5');
        $data7 = $this->input->post('data6');
        $data6 = $this->input->post('id');
        $data = array(
            'Purpose' => $data1,
            'Platform' => $data2,
            'Periode' => $data3,
            'Biaya' => $data4,
            'PJ' => $data5,
            'Hasil' => $data7
            );
 
         $where = array(
        'id' => $data6
         );
 
        $this->pfnmodel->update_data($where,$data,'data_pengiklanan');
        redirect('Marketing');
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