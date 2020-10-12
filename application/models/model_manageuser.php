<?php
class Model_manageuser extends CI_Model
{
    public function show_user()
    {
        return $this->db->get('user');
    }

    public function create_user($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_user($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_user($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
