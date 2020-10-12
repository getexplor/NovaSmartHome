<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class ActionAPI extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_api', 'action');
    }
    // bagian get
    public function index_get()
    {
        $ActionName = $this->get('action_name');

        if ($ActionName == "") {
            $Action = $this->action->ShowActionAPI();
        } else {
            $Action = $this->action->ShowActionAPI($ActionName);
        }

        if ($Action) {
            $this->response([
                'status' => true,
                'data' => $Action
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'Data not found !'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
