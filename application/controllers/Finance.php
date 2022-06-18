<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pfnmodel');
        }
    public function Index()
    {
        $data['datanya'] = $this->pfnmodel->tampil_data('budgeting')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Finance',$data);
        $this->load->view('template/footer');
    } 

    public function Create_Data_budgeting(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Create_budgeting');
        $this->load->view('template/footer');
    }
 
    public function tambah_aksi(){
        $data1 = $this->input->post('data1');
        $data2 = $this->input->post('data2');
        $data3 = $this->input->post('data3');
        $data4 = $this->input->post('data4');
        $data5 = $this->input->post('data5');
        $data = array(
            'nama_issues' => $data1,
            'Divisi' => $data2,
            'Biaya' => $data3,
            'Status' => $data4,
            'Keterangan' => $data5
            );
        $this->pfnmodel->input_data($data,'budgeting');
  redirect('Finance');

}

    public function hapus($id){
            $where = array('ID' => $id);
            $this->pfnmodel->hapus_data($where,'budgeting');
            redirect('Finance');
}

    public function Tampil_update($id){
        $where = array('ID' => $id);
        $data['user'] = $this->pfnmodel->edit_data($where,'budgeting')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Update_Budgeting',$data);
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
           'nama_issues' => $data1,
            'Divisi' => $data2,
            'Biaya' => $data3,
            'Status' => $data4,
            'Keterangan' => $data5
            );
 
         $where = array(
        'ID' => $data6
         );
 
        $this->pfnmodel->update_data($where,$data,'budgeting');
        redirect('Finance');
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