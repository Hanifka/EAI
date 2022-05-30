<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Humanresoure extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pfnmodel');
        }
    public function Index()
    {
        $data['datanya'] = $this->pfnmodel->tampil_data('data_rekruitasi')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Humanresoure',$data);
        $this->load->view('template/footer');
    } 

    public function Create_Data_recruit(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Create_recruit');
        $this->load->view('template/footer');
    }
 
    public function tambah_aksi(){
        $data1 = $this->input->post('data1');
        $data2 = $this->input->post('data2');
        $data3 = $this->input->post('data3');

        $data = array(
            'Nama_Calon' => $data1,
            'Email' => $data2,
            'Link_berkas' => $data3,

            );
        $this->pfnmodel->input_data($data,'data_rekruitasi');
        redirect('Humanresoure');
    }

    public function hapus($id){
            $where = array('Id' => $id);
            $this->pfnmodel->hapus_data($where,'data_rekruitasi');
            redirect('Humanresoure');
}

    public function Tampil_update($id){
        $where = array('Id' => $id);
        $data['user'] = $this->pfnmodel->edit_data($where,'data_rekruitasi')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Update_recruit',$data);
        $this->load->view('template/footer');
        }


    public function update(){
        $data1 = $this->input->post('data1');
        $data2 = $this->input->post('data2');
        $data3 = $this->input->post('data3');

        $data6 = $this->input->post('id');
        $data = array(
            'Nama_Calon' => $data1,
            'Email' => $data2,
            'Link_berkas' => $data3,

            );
 
         $where = array(
        'Id' => $data6
         );
 
        $this->pfnmodel->update_data($where,$data,'data_rekruitasi');
        redirect('Humanresoure');
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