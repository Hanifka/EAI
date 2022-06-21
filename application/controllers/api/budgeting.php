<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';



class Budgeting extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Costeng_model','costeng');
    }

    public function index_get()
    {
         
        $id = $this->get('ID');
        if($id === null){
            $data = $this->costeng->getCosteng('budgeting');
        }else{

            $data = $this->costeng->getCosteng('budgeting',$id,'ID');
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
            if( $this->costeng->deleteCosteng('budgeting',$id,'ID') > 0){
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
            'Nama_issues'=> $this->post('Nama_issues'),
            'Divisi'=> $this->post('Divisi'),
            'Biaya'=> $this->post('Biaya'),
            'Status'=> $this->post('Status'),
            'keterangan'=> $this->post('keterangan')
           


        ];
        if ($this->costeng->createCosteng('budgeting',$isi)> 0){
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
            'Nama_issues'=> $this->put('Nama_issues'),
            'Divisi'=> $this->put('Divisi'),
            'Biaya'=> $this->put('Biaya'),
            'Status'=> $this->put('Status'),
            'keterangan'=> $this->put('keterangan')
        ];
        if ($this->costeng->updateCosteng('budgeting',$isi,$id,'ID')> 0){
            $this->set_response([
                'status' => true,
                'message' => 'new data updated'
            ], REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (404) being the HTTP response code
        }else{
            $this->set_response([
                'status' => false,
                'message' => 'gagal update'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
        }

    }


}
