<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } elseif ($this->session->userdata('role_id') == 2) {
                redirect('user');
            }
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username cannot be empty !'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password cannot be empty !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth_templates/auth_header');
            $this->load->view('auth/login');
            $this->load->view('auth_templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password
        );
        $user =  $this->model_auth->check_login(['username' => $username], 'user')->row_array();
        // $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {

                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    $role = $this->session->userdata('role_id');
                    if ($role == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Wrong password</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    '
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username has not been activited</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                '
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username is not registerd</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            '
            );
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } elseif ($this->session->userdata('role_id') == 2) {
                redirect('user');
            }
        }
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
            $this->load->view('auth_templates/auth_header');
            $this->load->view('auth/registration');
            $this->load->view('auth_templates/auth_footer');
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
            $this->model_auth->insert_user($data, 'user');
            // $this->db->insert('user', $data);
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
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata(
            'message',
            '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>you have been logged out !</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        '
        );
        redirect('auth');
    }
}
