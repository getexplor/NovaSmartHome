<?php

class Model_api extends CI_Model
{
    // bagian get
    public function ShowTempHumiAPI()
    {
        return $this->db->get('history')->result_array();
    }

    public function ShowDeviceAPI($DeviceCategory = "", $DeviceNumber = "")
    {
        if ($DeviceCategory == "") {
            return $this->db->get('device')->result_array();
        } else {
            return $this->db->get_where('device', ['device_category' => $DeviceCategory, 'number' => $DeviceNumber])->result_array();
        }
    }

    public function ShowActionAPI($ActionName = "")
    {
        if ($ActionName == null) {
            return $this->db->get('action')->result_array();
        } else {
            return $this->db->get_where('action', ['action_name' => $ActionName])->result_array();
        }
    }
    public function ShowResponseAPI($DataResponse = "")
    {
        if ($DataResponse == null) {
            return $this->db->get('response_success')->result_array();
        } else {
            return $this->db->get_where('response_success', ['response' => $DataResponse])->result_array();
        }
    }

    // bagian post
    public function PostTempHumiAPI($data)
    {
        return $this->db->insert('history', $data);
    }
    // bagian update
    public function PutDeviceAPI($data, $id)
    {
        $this->db->update('device', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
