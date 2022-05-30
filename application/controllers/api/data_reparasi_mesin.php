<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';



class data_reparasi_mesin extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Costeng_model','costeng');
    }

    public function index_get()
    {
        $data = $this->costeng->getCosteng('data_reparasi_mesin');

        if ($data){
            $this->set_response([
                'status' => true,
                'data' => $data
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

        }
        
    }
}
