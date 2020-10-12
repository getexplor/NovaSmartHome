<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['title'] = 'dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['device'] = $this->model_device->show_device()->result();
        $data['weather'] = $this->model_admin->weathercard();
        $data['graph'] = $this->model_user->graph();

        $this->load->view('user_templates/header');
        $this->load->view('user_templates/sidebar', $data);
        $this->load->view('user/user_dashboard', $data);
        $this->load->view('user_templates/footer');
    }

    public function editprofile()
    {
        $data['title'] = 'dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('user_templates/header');
        $this->load->view('user_templates/sidebar', $data);
        $this->load->view('user/user_editprofile', $data);
        $this->load->view('user_templates/footer');
    }
    public function update_profile()
    {
        $user['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim', [
            'required' => 'This fullname cannot be empty !'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'This Username cannot be empty !'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $user['title'] = 'dashboard';
            $this->load->view('user_templates/header');
            $this->load->view('user_templates/sidebar', $user);
            $this->load->view('user/user_editprofile', $user);
            $this->load->view('user_templates/footer');
        } else {
            //cek image
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $user['user']['image'];

                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $id = $this->input->post('id');
            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $username = $this->input->post('username');

            $data = array(
                'fullname' => $fullname,
                'email' => $email,
                'username' => $username
            );

            $where = array(
                'id' => $id
            );

            $this->model_user->update_profile($where, $data, 'user');
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
            redirect('user/editprofile');
        }
    }
    public function update_password()
    {
        $user['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('currentpassword', 'Currentpassword', 'required|trim|min_length[8]', [
            'required' => 'Current Password cannot be empty !',
            'min_length' => 'Password too short !'
        ]);
        $this->form_validation->set_rules('new_password1', 'New password', 'required|trim|min_length[8]|matches[new_password2]', [
            'required' => 'New Password cannot be empty !',
            'matches' => 'Password dont matches!',
            'min_length' => 'Password too short !'
        ]);
        $this->form_validation->set_rules('new_password2', 'Confrim new password', 'required|trim|matches[new_password1]', [
            'required' => 'Confrim password cannot be empty !'
        ]);

        if ($this->form_validation->run() == false) {
            $user['title'] = 'dashboard';
            $this->load->view('user_templates/header');
            $this->load->view('user_templates/sidebar', $user);
            $this->load->view('user/admin_editprofile', $user);
            $this->load->view('user_templates/footer');
        } else {
            $id = $this->input->post('id');
            $current_password = $this->input->post('currentpassword');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $user['user']['password'])) {
                $this->session->set_flashdata(
                    'message_update',
                    '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Wrong current password !</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    '
                );
                redirect('admin/editprofile');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message_update',
                        '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>New password cannot be same as current password !</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        '
                    );
                    redirect('admin/editprofile');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $data = array(
                        'password' => $password_hash
                    );

                    $where = array(
                        'id' => $id
                    );

                    $this->model_admin->update_password($where, $data, 'user');
                    $this->session->set_flashdata(
                        'message_update',
                        '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success update Password</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        '
                    );
                    redirect('user/editprofile');
                }
            }
        }
    }
}
