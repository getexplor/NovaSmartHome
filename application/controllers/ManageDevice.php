<?php
class ManageDevice extends CI_Controller
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
        $data['title'] = 'managedevice';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['device'] = $this->model_device->show_device()->result();
        $this->load->view('admin_templates/header');
        $this->load->view('admin_templates/sidebar', $data);
        $this->load->view('admin/admin_managedevice', $data);
        $this->load->view('admin_templates/footer');
    }

    public function create_device()
    {
        $data['title'] = 'managedevice';
        $this->form_validation->set_rules('devicecategory', 'Devicecategory', 'required|trim', [
            'required' => 'Device Name cannot be empty !'
        ]);
        $this->form_validation->set_rules('devicenumber', 'Devicenumber', 'required|trim', [
            'required' => 'Variable cannot be empty !'
        ]);
        $user['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $iduser = $user['user'];

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata(
                'message',
                '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>unsuccess create new device</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            '
            );
            $this->index();
        } else {
            $data = array(
                'iduser' => $iduser['id'],
                'device_category' => htmlspecialchars($this->input->post('devicecategory', true)),
                'number' => htmlspecialchars($this->input->post('devicenumber', true)),
                'status' => 0
            );
            $this->model_device->create_device($data, 'device');

            $this->session->set_flashdata(
                'message',
                '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success create a new device</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                '
            );
            $this->index();
        }
    }

    public function edit_device($id)
    {
        $data['title'] = 'managedevice';
        if ($this->session->userdata('role_id') == 2) {
            redirect('user');
        }
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $where = array('id' => $id);
        $data['device'] = $this->model_device->edit_device($where, 'device')->result();
        $this->load->view('admin_templates/header');
        $this->load->view('admin_templates/sidebar', $data);
        $this->load->view('admin/admin_updatedevice', $data);
        $this->load->view('admin_templates/footer');
    }

    public function update_device()
    {
        $data['title'] = 'managedevice';
        $id = $this->input->post('id');
        $iduser = $this->input->post('iduser');
        $devicecategory = $this->input->post('devicecategory');
        $devicenumber = $this->input->post('devicenumber');
        $status = $this->input->post('status');

        $data = array(
            'iduser' => $iduser,
            'device_category' => $devicecategory,
            'number' => $devicenumber,
            'status' => $status
        );

        $where = array(
            'id' => $id
        );

        $this->model_device->update_device($where, $data, 'device');
        $this->session->set_flashdata(
            'message_update',
            '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success update device</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        '
        );
        $this->edit_device($id);
    }

    public function delete_device($id)
    {
        $data['title'] = 'managedevice';
        $where = array('id' => $id);
        $this->model_device->delete_device($where, 'device');
        redirect('managedevice');
    }
}
