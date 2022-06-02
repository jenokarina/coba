<?php

class Status extends CI_Controller
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
        $data['title'] = "Status Pesanan";
        $data['status'] = $this->M_status->get_status();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('Status');
    }
    public function detail_status($id)
    {
        $data['title'] = "Detail Pemesanan";
        $data['status'] = $this->M_status->get_status();
        $data['detail'] = $this->M_status->detail_status($id);
        $data['produk'] = $this->M_status->pesanan_produk($id);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('detail_pemesanan');
    }
    public function nota($id)
    {
        $data['title'] = "Nota";
        $data['riwayat'] = $this->M_status->get_status();
        $data['detail'] = $this->M_status->detail_status($id);
        $data['produk'] = $this->M_status->pesanan_produk($id);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('nota');
    }
    public function update_status_selesai($id)
    {
        $where = array(
            'id_transaksi' => $id,
        );
        $data = array(
            'status'   => 'S'
        );
        $this->M_status->update_status($where, $data, 'transaksi');
        $this->session->set_flashdata('message', '<small class="message-success alert" role="alert">Pesanan anda sudah selesai, Terimakasih :)</small>');
        redirect('Riwayat');
    }
}
