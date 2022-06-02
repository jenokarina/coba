<?php

class M_login extends CI_Model
{
    public function insertid($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
}
