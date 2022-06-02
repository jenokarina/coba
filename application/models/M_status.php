<?php

class M_status extends  CI_Model
{
    public function get_status()
    {
        $id = $this->session->userdata['id_user'];
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat
        WHERE transaksi.id_user=$id");
        return $query->result();
    }
    public function get_riwayat()
    {
        $id = $this->session->userdata['id_user'];
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat
        WHERE transaksi.id_user=$id AND transaksi.status='S'");
        return $query->result();
    }
    public function get_transaksi()
    {
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat");
        return $query->result();
    }
    public function pesanan_baru()
    {
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat WHERE transaksi.status='M'");
        return $query->result();
    }
    public function siap_dikirim()
    {
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat WHERE transaksi.status='C'");
        return $query->result();
    }
    public function pengiriman()
    {
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat WHERE transaksi.status='K'");
        return $query->result();
    }
    public function pesanan_selesai()
    {
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat WHERE transaksi.status='S'");
        return $query->result();
    }
    function update_status($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function detail_status($id)
    {
        $id_user = $this->session->userdata['id_user'];
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN ongkir ON transaksi.id_ongkir=ongkir.id_ongkir LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat
        WHERE transaksi.id_user=$id_user AND transaksi.id_transaksi=$id");
        return $query->result();
    }
    public function riwayat($id)
    {
        $id_user = $this->session->userdata['id_user'];
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN ongkir ON transaksi.id_ongkir=ongkir.id_ongkir LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat
        WHERE transaksi.id_user=$id_user AND transaksi.id_transaksi=$id AND status='S'");
        return $query->result();
    }
    public function pesanan_produk($id)
    {
        $query = $this->db->query("SELECT * FROM penjualan_produk LEFT JOIN produk ON penjualan_produk.id_produk=produk.id_produk
        WHERE penjualan_produk.id_transaksi=$id");
        return $query->result();
    }

    public function get_status1($id)
    {
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat LEFT JOIN ongkir ON transaksi.id_ongkir = ongkir.id_ongkir WHERE id_transaksi='$id'");
        return $query->result();
    }
    public function detail_status1($id)
    {
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN ongkir ON transaksi.id_ongkir = ongkir.id_ongkir LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat
        WHERE transaksi.id_transaksi=$id");
        return $query->result();
    }
    public function pesanan_produk1($id)
    {
        $query = $this->db->query("SELECT * FROM penjualan_produk LEFT JOIN produk ON penjualan_produk.id_produk=produk.id_produk
        WHERE penjualan_produk.id_transaksi=$id");
        return $query->result();
    }
    public function pbaru()
    {
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat WHERE transaksi.status='M'");
        return $query->num_rows();
    }
    public function skirim()
    {
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat WHERE transaksi.status='C'");
        return $query->num_rows();
    }
    public function selesai()
    {
        $query = $this->db->query("SELECT * FROM transaksi LEFT JOIN alamat ON transaksi.id_alamat = alamat.id_alamat WHERE transaksi.status='S'");
        return $query->num_rows();
    }
}
