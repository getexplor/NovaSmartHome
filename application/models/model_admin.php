<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function graph()
    {
        $sql = "SELECT * FROM (SELECT * FROM history ORDER BY id DESC LIMIT 5) Var1 ORDER BY id ASC";
        $data = $this->db->query($sql);
        return $data->result();
    }

    public function weathercard()
    {
        $this->db->from('history');
        $this->db->order_by("id", "asc");
        $data = $this->db->get();

        return $data->result();
    }

    public function edit_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_profile($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function update_password($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
