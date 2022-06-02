<?php

class Pesananbaru extends CI_Controller
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
        $data['title'] = 'Pesanan Baru';
        $data['pesananbaru'] = $this->M_status->pesanan_baru();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('penjual/templates/header', $data);
        $this->load->view('penjual/pesananbaru');
        $this->load->view('penjual/templates/footer');
    }
}
