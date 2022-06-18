<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';



class Data_pengiklanan extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Costeng_model','costeng');
    }

    public function index_get()
    {   

        $id = $this->get('id');
        if($id === null){
            $data = $this->costeng->getCosteng('data_pengiklanan');
        }else{
            $data = $this->costeng->getCosteng('data_pengiklanan',$id,'id');
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
        // $data = $this->costeng->getCosteng('data_pengiklanan');
        $id = $this->delete('id');
        if( $id === null){
            $this->set_response([
                'status' => false,
                'message' => 'ISI ID !!'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
        }else{
            // $data = $this->costeng->deleteCosteng('data_pengiklanan');
            if( $this->costeng->deleteCosteng('data_pengiklanan',$id,'id') > 0){
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
            'Purpose'=> $this->post('Purpose'),
            'Platform'=> $this->post('Platform'),
            'Periode'=> $this->post('Periode'),
            'Biaya'=> $this->post('Biaya'),
            'PJ'=> $this->post('PJ'),
            'Hasil'=> $this->post('Hasil')
           


        ];
        if ($this->costeng->createCosteng('data_pengiklanan',$isi)> 0){
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
            'Purpose'=> $this->put('Purpose'),
            'Platform'=> $this->put('Platform'),
            'Periode'=> $this->put('Periode'),
            'Biaya'=> $this->put('Biaya'),
            'PJ'=> $this->put('PJ'),
            'Hasil'=> $this->put('Hasil')
           
        ];
        if ($this->costeng->updateCosteng('data_pengiklanan',$isi,$id,'id')> 0){
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
