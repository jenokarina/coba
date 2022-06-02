<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_home');
        $this->load->helper('form', 'url');

        if ($this->session->userdata('akses') == 'penjual') {
            redirect('Penjual');
        }
    }

    public function index()
    {
        $data['title'] = "FIKEA";
        $data['produk'] = $this->M_home->dataproduk();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('home');
        $this->load->view('templates/footer');
    }
    public function search()
    {
        $data['title'] = "FIKEA";
        $keyword = $this->input->post('keyword');
        $data['keyword'] = $keyword;
        $data['produk'] = $this->M_home->search($keyword);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('search');
    }
}
