<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pfnmodel');
        }
    public function Index()
    {
        $data['datanya'] = $this->pfnmodel->tampil_data('data_karyawan')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('karyawan',$data);
        $this->load->view('template/footer');
    } 

    public function Create_Data_karyawan(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Create_Karyawan');
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
            'Nama' => $data1,
            'NIP' => $data3,
            'Jenis_Kelamin'=> $data6,
            'Alamat' => $data4,
            'No_telp' => $data5,
            'Divisi' => $data2
            );
        $this->pfnmodel->input_data($data,'data_karyawan');
  redirect('karyawan');

}

    public function hapus($id){
            $where = array('ID' => $id);
            $this->pfnmodel->hapus_data($where,'data_karyawan');
            redirect('karyawan');
}

    public function Tampil_update($id){
        $where = array('ID' => $id);
        $data['user'] = $this->pfnmodel->edit_data($where,'data_karyawan')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Update_Karyawan',$data);
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
            'Nama' => $data1,
            'NIP' => $data3,
            'Jenis_Kelamin'=> $data7,
            'Alamat' => $data4,
            'No_telp' => $data5,
            'Divisi' => $data2
            );
 
         $where = array(
        'ID' => $data6
         );
 
        $this->pfnmodel->update_data($where,$data,'data_karyawan');
        redirect('karyawan');
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