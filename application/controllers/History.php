<?php

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = 'history';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['dataTable'] = $this->model_history->DataTabel()->result();
        if ($this->session->userdata('role_id') == 2) {
            redirect('user');
        }

        $this->load->view('admin_templates/header');
        $this->load->view('admin_templates/sidebar', $data);
        $this->load->view('admin/admin_history', $data);
        $this->load->view('admin_templates/footer');
    }

    public function DataTable()
    {
        return $this->model_history->DataTabel()->result();
    }
}
