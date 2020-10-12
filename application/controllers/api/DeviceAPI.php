<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class DeviceAPI extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_api', 'device');
        $this->load->model('model_api', 'history');
    }
    // bagian get
    public function index_get()
    {
        $DeviceCategory = $this->get('device_category');
        $DeviceNumber = $this->get('number');

        if ($DeviceCategory == "") {
            $Devices = $this->device->ShowDeviceAPI();
        } else {
            $Devices = $this->device->ShowDeviceAPI($DeviceCategory, $DeviceNumber);
        }

        if ($Devices) {
            $this->response([
                'status' => true,
                'data' => $Devices
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'Data not found !'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
    // bagian post
    public function index_post()
    {
        if ($this->post('device_category') && $this->post('number') && $this->post('temp') && $this->post('hum') && $this->post('time')) {
            $message = [
                'device_category' => $this->post('device_category'),
                'number' => $this->post('number'),
                'temperature' => $this->post('temp'),
                'humidity' => $this->post('hum'),
                'time' => $this->post('time')
            ];
            $data = $this->history->PostTempHumiAPI($message);

            $this->set_response([
                'status' => TRUE,
                'data' => $data,
                'messege' => 'data added'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No entry data'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
    // bagian put
    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'device_category' => $this->put('device_category'),
            'number' => $this->put('number'),
            'status' => $this->put('status')
        ];

        if ($this->device->PutDeviceAPI($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Device has been update'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed update device'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
