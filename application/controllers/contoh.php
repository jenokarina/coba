<?php

class contoh extends CI_Controller
{
    public function __construct()
    {
        parent::__consturct();
        $this->load->model('M_produk');
    }

    public function index()
    {
        $data['siswa'] = $this->M_produk->data_produk();
        $this->load->view('index');
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');

        $data = array(
            'nama' => $nama,
            'kelas' => $kelas,
        );

        $sql = $this->M_produk->input_produk('produk', $data);
        redirect('index');

        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');
        $id_kelas = $this->input->post('id_kelas');

        $where = array(
            'id_kelas' => $id_kelas
        );

        $data = array(
            'nama' => $nama,
            'kelas' => $kelas,
        );

        $sql = $this->m_checkout->input_siswa($where, $data, 'kelas');
        redirect('index');
    }
    public function tambah($data, $table, $where)
    {
        $query = $this->db->query('SELECT * FROM kelas');
        return $query->result();

        $query = $this->db->insert($data, $table);
        return $this->db->insert_id();

        $this->db->where($where);
        $this->db->update($table, $data);

        $this->db->where($where);
        $this->db->delete($table);
    }
}
