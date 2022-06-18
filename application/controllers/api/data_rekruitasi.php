<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';



class Data_rekruitasi extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Costeng_model','costeng');
    }

    public function index_get()
    {
        
        $id = $this->get('id');
        if($id === null){
            $data = $this->costeng->getCosteng('data_rekruitasi');
        }else{
            $data = $this->costeng->getCosteng('data_rekruitasi',$id,'Id');
        }
       
        if ($data){
            $this->set_response([
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
        // $data = $this->costeng->getCosteng('data_rekruitasi');
        $id = $this->delete('id');
        if( $id === null){
            $this->set_response([
                'status' => false,
                'message' => 'ISI ID !!'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
        }else{
            // $data = $this->costeng->deleteCosteng('data_rekruitasi');
            if( $this->costeng->deleteCosteng('data_rekruitasi',$id,'Id') > 0){
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
            'Nama_Calon'=> $this->post('Nama_Calon'),
            'Email'=> $this->post('Email'),
            'Link_berkas'=> $this->post('Link_berkas')
           
          
           


        ];
        if ($this->costeng->createCosteng('data_rekruitasi',$isi)> 0){
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
        $id = $this->put('id');
        $isi = [
            'Nama_Calon'=> $this->put('Nama_Calon'),
            'Email'=> $this->put('Email'),
            'Link_berkas'=> $this->put('Link_berkas')
           
        ];
        if ($this->costeng->updateCosteng('data_rekruitasi',$isi,$id,'Id')> 0){
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
