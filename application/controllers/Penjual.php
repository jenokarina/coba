<?php

class Penjual extends CI_Controller
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
        $data['title'] = 'Dashboard';
        $data['pbaru'] = $this->M_status->pbaru();
        $data['skirim'] = $this->M_status->skirim();
        $data['selesai'] = $this->M_status->selesai();
        $data['transaksi'] = $this->M_status->get_transaksi();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('penjual/templates/header', $data);
        $this->load->view('penjual/home');
        $this->load->view('penjual/templates/footer');
    }
}
