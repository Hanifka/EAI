<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qualitycontrol extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pfnmodel');
        }
    public function Index()
    {
        $data['datanya'] = $this->pfnmodel->tampil_data('data_qc')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Qualitycontrol',$data);
        $this->load->view('template/footer');
    } 

    public function Create_Data_qc(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('CreateQC');
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
            'Nama_mesin' => $data1,
            'Time' => date('H:i:s'),
            'PJ'=> $data2,
            'Quality' => $data3,
            'Performance' => $data4,
            'Availibility' => $data5,
            'Status' => $data6
            );
        $this->pfnmodel->input_data($data,'data_qc');
  redirect('Qualitycontrol');

}

    public function hapus($id){
            $where = array('ID' => $id);
            $this->pfnmodel->hapus_data($where,'data_qc');
            redirect('Qualitycontrol');
}

    public function Tampil_update($id){
        $where = array('ID' => $id);
        $data['user'] = $this->pfnmodel->edit_data($where,'data_qc')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Update_QC',$data);
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
            'Nama_mesin' => $data1,
            'Time' => date('H:i:s'),
            'PJ'=> $data2,
            'Quality' => $data3,
            'Performance' => $data4,
            'Availibility' => $data5,
            'Status' => $data7
            );
         $where = array(
        'ID' => $data6
         );
 
        $this->pfnmodel->update_data($where,$data,'data_qc');
        redirect('Qualitycontrol');
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