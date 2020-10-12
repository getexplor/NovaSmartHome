<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class ResponseAPI extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_api', 'DataResponse');
    }
    // bagian get
    public function index_get()
    {
        $DataResponse = $this->get('response');

        if ($DataResponse == "") {
            $Response = $this->DataResponse->ShowResponseAPI();
        } else {
            $Response = $this->DataResponse->ShowResponseAPI($DataResponse);
        }

        if ($Response) {
            $this->response([
                'status' => true,
                'data' => $Response
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'Data not found !'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
