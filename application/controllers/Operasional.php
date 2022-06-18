<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operasional extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pfnmodel');
        }
    public function Index()
    {
        $data['datanya'] = $this->pfnmodel->tampil_data('data_reparasi_mesin')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Operasional',$data);
        $this->load->view('template/footer');
    } 

    public function Create_data_reparasi(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Create_data_reparasi');
        $this->load->view('template/footer');
    }
 
    public function tambah_aksi(){
        $data1 = $this->input->post('data1');
        $data2 = $this->input->post('data2');
        $data3 = $this->input->post('data3');
        $data4 = $this->input->post('data4');
        $data5 = $this->input->post('data5');

        $data = array(
            'Mesin' => $data1,
            'Report_type' => $data2,
            'Risk' => $data3,
            'PJ' => $data4,
            'Indikasi' => $data5,

            );
        $this->pfnmodel->input_data($data,'data_reparasi_mesin');
        redirect('Operasional');
    }

    public function hapus($id){
            $where = array('ID' => $id);
            $this->pfnmodel->hapus_data($where,'data_reparasi_mesin');
            redirect('Operasional');
}

    public function Tampil_update($id){
        $where = array('ID' => $id);
        $data['user'] = $this->pfnmodel->edit_data($where,'data_reparasi_mesin')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Update_data_reparasi',$data);
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
            'Mesin' => $data1,
            'Report_type' => $data2,
            'Risk' => $data3,
            'PJ' => $data4,
            'Indikasi' => $data5,

            );
 
         $where = array(
        'ID' => $data6
         );
 
        $this->pfnmodel->update_data($where,$data,'data_reparasi_mesin');
        redirect('Operasional');
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