<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class absensi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pfnmodel');
        }
    public function Index()
    {
        $data['datanya'] = $this->pfnmodel->tampil_data('data_absensi')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('absensi',$data);
        $this->load->view('template/footer');
    } 

    public function Create_Data_Absensi(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Create_absensi');
        $this->load->view('template/footer');
    }
 
    public function tambah_aksi(){
        $data1 = $this->input->post('data1');
        $data2 = $this->input->post('data2');
        $data3 = $this->input->post('data3');
        $data4 = $this->input->post('data4');
        $data5 = $this->input->post('data5');
        $data = array(
            'Nama_karyawan' => $data1,
            'Divisi' => $data2,
            'Waktu' =>date('H:i:s')
            // 'Status' => $data4,
            // 'Keterangan' => $data5
            );
        $this->pfnmodel->input_data($data,'data_absensi');
  redirect('absensi');

}

    public function hapus($id){
            $where = array('ID' => $id);
            $this->pfnmodel->hapus_data($where,'data_absensi');
            redirect('absensi');
}

    public function Tampil_update($id){
        $where = array('ID' => $id);
        $data['user'] = $this->pfnmodel->edit_data($where,'data_absensi')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Update_absensi',$data);
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
            'Waktu' =>date('H:i:s')
  
            );
 
         $where = array(
        'ID' => $data6
         );
 
        $this->pfnmodel->update_data($where,$data,'data_absensi');
        redirect('absensi');
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