<?php
class Model_device extends CI_Model
{
    public function show_device()
    {
        return $this->db->get('device');
    }

    public function create_device($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_device($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_device($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_device($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
