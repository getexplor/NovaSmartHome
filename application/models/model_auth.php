<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_auth extends CI_Model
{

    public function check_login($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function insert_user($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
