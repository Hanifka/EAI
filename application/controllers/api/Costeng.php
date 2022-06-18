<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';



class costeng extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Costeng_model','costeng');
    }

    public function index_get()
    {   
        $id = $this->get('no');
        if($id === null ){
            $data = $this->costeng->getCosteng('biaya_reparasi');
        }else{
            $data = $this->costeng->getCosteng('biaya_reparasi',$id,'no');
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
        // $data = $this->costeng->getCosteng('biaya_reparasi');
        $id = $this->delete('no');
        if( $id === null){
            $this->set_response([
                'status' => false,
                'message' => 'ISI ID !!'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
        }else{
            // $data = $this->costeng->deleteCosteng('biaya_reparasi');
            if( $this->costeng->deleteCosteng('biaya_reparasi',$id,'no') > 0){
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
            'mesin'=> $this->post('mesin'),
            'biaya'=> $this->post('biaya'),
            'Engineer'=> $this->post('Engineer'),
            'status'=> $this->post('status'),
            'keterangan'=> $this->post('keterangan'),
            'ID_budgeting'=> $this->post('ID_budgeting')


        ];
        if ($this->costeng->createCosteng('biaya_reparasi',$isi)> 0){
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
        $id = $this->put('no');
        $isi = [
            'mesin'=> $this->put('mesin'),
            'biaya'=> $this->put('biaya'),
            'Engineer'=> $this->put('Engineer'),
            'status'=> $this->put('status'),
            'keterangan'=> $this->put('keterangan'),
            'ID_budgeting'=> $this->post('ID_budgeting')
        ];
        if ($this->costeng->updateCosteng('biaya_reparasi',$isi,$id,'no')> 0){
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
