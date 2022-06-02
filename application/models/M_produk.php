<?php

class M_produk extends  CI_Model
{

    function data_produk()
    {
        $query = $this->db->query('SELECT * FROM produk');
        return $query->result();
    }
    function detail_produk($id)
    {
        $query = $this->db->query("SELECT * FROM produk WHERE id_produk=$id");
        return $query->result();
    }
    function update_produk($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function hapus_produk($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function input_produk($data, $table)
    {
        $query = $this->db->insert($data, $table);
        return $this->db->insert_id();
    }
    //untuk keranjang
    public function find($id)
    {
        $result = $this->db->where('id_produk', $id)
            ->limit(1)
            ->get('produk');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
