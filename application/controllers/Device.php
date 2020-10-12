<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Device extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 2) {
            redirect('user');
        }
        $data['title'] = 'device';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['device'] = $this->model_device->show_device()->result();
        $this->load->view('admin_templates/header');
        $this->load->view('admin_templates/sidebar', $data);
        $this->load->view('admin/admin_device', $data);
        $this->load->view('admin_templates/footer');
    }

    public function togglepost()
    {
        $id = $this->input->get('id');
        $CurrentStatus = $this->input->get('checkBoxValue', true);

        if ($CurrentStatus == "true") {
            $status = 1;
        } else {
            $status = 0;
        }

        $data = array(
            'status' => $status,
        );
        $where = array('id' => $id);

        $this->model_device->update_device($where, $data, 'device');
    }
}
