<?php

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_status');
        $this->load->helper('form', 'url');

        if ($this->session->userdata('akses') != 'user') {
            redirect('Login');
        }
    }
    public function index()
    {
        $data['title'] = "Riwayat";
        $data['riwayat'] = $this->M_status->get_riwayat();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('Riwayat');
    }
}
