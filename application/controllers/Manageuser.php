<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manageuser extends CI_Controller
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
        $user['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user['title'] = 'manageuser';
        $data['user'] = $this->model_manageuser->show_user()->result();
        $this->load->view('admin_templates/header');
        $this->load->view('admin_templates/sidebar', $user);
        $this->load->view('admin/admin_manageuser', $data);
        $this->load->view('admin_templates/footer');
    }

    public function create_user()
    {
        $user['title'] = 'manageuser';
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registerd !'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password dont matches!',
            'min_length' => 'Password too short !'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata(
                'message',
                '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>unsuccess register new account</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            '
            );
            $this->index();
        } else {
            $data = array(
                'fullname' => htmlspecialchars($this->input->post('fullname', true)),
                'image' => 'default.jpg',
                'email' => htmlspecialchars($this->input->post('email', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1
            );
            $this->model_manageuser->create_user($data, 'user');

            $this->session->set_flashdata(
                'message',
                '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success registerd a new account</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            '
            );
            redirect('manageuser');
        }
    }

    public function edit_user($id)
    {
        $user['title'] = 'manageuser';
        if ($this->session->userdata('role_id') == 2) {
            redirect('user');
        }
        $user['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $where = array('id' => $id);
        $data['user'] = $this->model_manageuser->edit_user($where, 'user')->result();
        $this->load->view('admin_templates/header');
        $this->load->view('admin_templates/sidebar', $user);
        $this->load->view('admin/admin_updateuser', $data);
        $this->load->view('admin_templates/footer');
    }

    public function update_user()
    {
        $user['title'] = 'manageuser';
        $id = $this->input->post('id');
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        // $password = $this->input->post('password1');
        $role = $this->input->post('role');
        $active = $this->input->post('active');

        $data = array(
            'fullname' => $fullname,
            'email' => $email,
            'username' => $username
        );

        $where = array(
            'id' => $id
        );

        $this->model_manageuser->update_user($where, $data, 'user');
        $this->session->set_flashdata(
            'message_update',
            '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success update account</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        '
        );
        $this->edit_user($id);
    }

    public function delete_user($id)
    {
        $user['title'] = 'manageuser';
        $where = array('id' => $id);
        $this->model_manageuser->delete_user($where, 'user');
        redirect('manageuser');
    }
}
