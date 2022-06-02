<?php

class M_checkout extends  CI_Model
{
    function ongkir()
    {
        $query = $this->db->query("SELECT * FROM ongkir");
        return $query->result();
    }
    function pembayaran($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id(); // return last insert id
    }
}
