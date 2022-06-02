<?php

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_produk');
        $this->load->helper('form', 'url');

        if ($this->session->userdata('akses') != 'user') {
            redirect('Login');
        }
    }
    public function index()
    {
        $data['title'] = "Keranjang";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('keranjang');
    }
    public function tambah_keranjang()
    {
        $id = $this->input->post('id_produk');
        $produk = $this->M_produk->find($id);
        $jumlah = $this->input->post('jumlah');

        $data = array(
            'id'      => $produk->id_produk,
            'qty'     => $jumlah,
            'price'   => $produk->harga,
            'name'    => $produk->nama_produk
        );
        $this->cart->insert($data);
        $this->session->set_flashdata('message', '<small class="message-success alert" role="alert">Berhasil menambahkan ke keranjang!</small>');
        redirect('Keranjang');
    }
    public function hapus_keranjang($id)
    {
        $data = array(
            'rowid'   => $id,
            'qty'     => 0
        );

        $this->cart->update($data);
        redirect('Keranjang');
    }
}
