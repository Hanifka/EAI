<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';



class Data_reparasi_mesin extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Costeng_model','costeng');
    }

    public function index_get()
    {
 
        $id = $this->get('id');
        if($id === null){
            $data = $this->costeng->getCosteng('data_reparasi_mesin');
        }else{
            $data = $this->costeng->getCosteng('data_reparasi_mesin',$id,'ID');
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
        // $data = $this->costeng->getCosteng('data_reparasi_mesin');
        $id = $this->delete('id');
        if( $id === null){
            $this->set_response([
                'status' => false,
                'message' => 'ISI ID !!'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
        }else{
            // $data = $this->costeng->deleteCosteng('data_reparasi_mesin');
            if( $this->costeng->deleteCosteng('data_reparasi_mesin',$id,'ID') > 0){
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
            'Mesin'=> $this->post('Mesin'),
            'Report_type'=> $this->post('Report_type'),
            'Risk'=> $this->post('Risk'),
            'PJ'=> $this->post('PJ'),
            'indikasi'=> $this->post('indikasi')
           
          
           


        ];
        if ($this->costeng->createCosteng('data_reparasi_mesin',$isi)> 0){
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
            'Mesin'=> $this->put('Mesin'),
            'Report_type'=> $this->put('Report_type'),
            'Risk'=> $this->put('Risk'),
            'PJ'=> $this->put('PJ'),
            'indikasi'=> $this->put('indikasi')
           
        ];
        if ($this->costeng->updateCosteng('data_reparasi_mesin',$isi,$id,'ID')> 0){
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
