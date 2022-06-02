<?php

class Pesananselesai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_status');
        $this->load->helper('url', 'form');

        if ($this->session->userdata('akses') != 'penjual') {
            redirect('');
        }
    }
    public function index()
    {
        $data['title'] = 'Pesanan Selesai';
        $data['pesananselesai'] = $this->M_status->pesanan_selesai();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('penjual/templates/header', $data);
        $this->load->view('penjual/pesananselesai');
        $this->load->view('penjual/templates/footer');
    }
    public function nota($id)
    {
        $data['title'] = "Nota";
        $data['riwayat'] = $this->M_status->get_status1($id);
        $data['detail'] = $this->M_status->detail_status1($id);
        $data['produk'] = $this->M_status->pesanan_produk1($id);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('penjual/templates/header', $data);
        $this->load->view('penjual/nota');
    }
}
