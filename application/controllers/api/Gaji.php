<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';



class Gaji extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Costeng_model','costeng');
    }

    public function index_get()
    {
         
        $id = $this->get('ID');
        if($id === null){
            $data = $this->costeng->getCosteng('gaji');
        }else{

            $data = $this->costeng->getCosteng('gaji',$id,'ID');
        }
       
        if ($data){
            $this->set_response([
                'ID' => $id,
                'status' => true,
                'data' => $data
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }else{
            $this->set_response([
                'status' => false,
                'message' => 'id tidak ada'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        
        
    }

    public function index_delete(){
        // $data = $this->costeng->getCosteng('budgeting');
        $id = $this->delete('ID');
        if( $id === null){
            $this->set_response([
                'ID' => $id,
                'status' => false,
                'message' => 'ISI ID !!'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
        }else{
            // $data = $this->costeng->deleteCosteng('budgeting');
            if( $this->costeng->deleteCosteng('gaji',$id,'ID') > 0){
                $this->set_response([
                    'status' => true,
                    'data' => $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (404) being the HTTP response code
            }else{
                $this->set_response([
                    'status' => false,
                    'message' => 'id tidak ada'
                ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
            }
        } 
    }

    public function index_post(){
        $isi = [


            'Nama' => $this->post('Nama'),
            'Divisi' => $this->post('Divisi'),
            'Jabatan'=> $this->post('Jabatan'),
            'Total_kehadiran' =>$this->post('Total_kehadiran'),
            'Gapok' => $this->post('Gapok'),
            'Bonus' => $this->post('Bonus')


            // 'Nama' =>$this->post('Nama'),
            // 'NIP' => $this->post('NIP'),
            // 'Jenis_Kelamin'=> $this->post('Jenis_Kelamin'),
            // 'Alamat' => $this->post('Alamat'),
            // 'No_telp' => $this->post('No_telp'),
            // 'Divisi' => $this->post('Divisi')
            
            // 'Nama_karyawan' => $this->post('Nama_karyawan'),
            // 'Divisi' => $this->post('Divisi'),
            // 'Waktu' =>$this->post('Waktu')

            // 'Nama_issues'=> $this->post('Nama_issues'),
            // 'Divisi'=> $this->post('Divisi'),
            // 'Biaya_Reparasi'=> $this->post('Biaya_Reparasi'),
            // 'Status'=> $this->post('Status'),
            // 'keterangan'=> $this->post('keterangan')
           


        ];
        if ($this->costeng->createCosteng('gaji',$isi)> 0){
            $this->set_response([
                'status' => true,
                'message' => 'new data created'
            ], REST_Controller::HTTP_CREATED); // NOT_FOUND (404) being the HTTP response code
        }else{
            $this->set_response([
                'status' => false,
                'message' => 'id tidak ada'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
        }

        
    }

    public function index_put(){
        $id = $this->put('ID');
        $isi = [

            'Nama' => $this->put('Nama'),
            'Divisi' => $this->put('Divisi'),
            'Jabatan'=> $this->put('Jabatan'),
            'Total_kehadiran' =>$this->put('Total_kehadiran'),
            'Gapok' => $this->put('Gapok'),
            'Bonus' => $this->put('Bonus')


            // 'Nama' =>$this->put('Nama'),
            // 'NIP' => $this->put('NIP'),
            // 'Jenis_Kelamin'=> $this->put('Jenis_Kelamin'),
            // 'Alamat' => $this->put('Alamat'),
            // 'No_telp' => $this->put('No_telp'),
            // 'Divisi' => $this->put('Divisi')

            // 'Nama_issues'=> $this->put('Nama_issues'),
            // 'Divisi'=> $this->put('Divisi'),
            // 'Biaya_Reparasi'=> $this->put('Biaya_Reparasi'),
            // 'Status'=> $this->put('Status'),
            // 'keterangan'=> $this->put('keterangan')
        ];
        if ($this->costeng->updateCosteng('gaji',$isi,$id,'ID')> 0){
            $this->set_response([
                'status21' => $id,
                'status' => true,
                'message' => 'new data updated'
            ], REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (404) being the HTTP response code
        }else{
            $this->set_response([
                'status21' => $id,
                'status' => false,
                'message' => 'gagal update'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
        }

    }


}
