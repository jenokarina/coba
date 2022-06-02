<?php

class Dalampengiriman extends CI_Controller
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
        $data['title'] = 'Dalam Pengiriman';
        $data['pengiriman'] = $this->M_status->pengiriman();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('penjual/templates/header', $data);
        $this->load->view('penjual/dalampengiriman');
        $this->load->view('penjual/templates/footer');
    }
}
