<?php

class M_home extends CI_Model
{
    function dataproduk()
    {
        $query = $this->db->query('SELECT * FROM produk');
        return $query->result();
    }
    function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('harga', $keyword);
        return $this->db->get()->result();
    }
}
