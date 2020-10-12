<?php
class Model_history extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function DataTabel()
    {
        $this->db->from('history');
        $this->db->order_by("id", "desc");
        return $this->db->get();
    }
}
