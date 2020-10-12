<?php

class UserHistory extends CI_Controller
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


        $this->load->view('user_templates/header');
        $this->load->view('user_templates/sidebar', $data);
        $this->load->view('user/user_history', $data);
        $this->load->view('user_templates/footer');
    }

    public function DataTable()
    {
        return $this->model_history->DataTabel()->result();
    }
}
