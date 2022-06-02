<?php

class Siapdikirim extends CI_Controller
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
        $data['title'] = 'Siap dikirim';
        $data['siapkirim'] = $this->M_status->siap_dikirim();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('penjual/templates/header', $data);
        $this->load->view('penjual/siapdikirim');
        $this->load->view('penjual/templates/footer');
    }
    public function format_pengiriman($id)
    {
        $data['title'] = "Status Pesanan";
        $data['riwayat'] = $this->M_status->get_status1($id);
        $data['detail'] = $this->M_status->detail_status1($id);
        $data['produk'] = $this->M_status->pesanan_produk1($id);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('penjual/templates/header', $data);
        $this->load->view('format_pemesanan');
    }
    public function update_status($id)
    {
        $where = array(
            'id_transaksi' => $id,
        );
        $data = array(
            'status'   => 'C'
        );
        $this->M_status->update_status($where, $data, 'transaksi');
        $this->session->set_flashdata('message', '<small class="message-success alert" role="alert">Pesanan berhasil dikonfirmasi</small>');
        redirect('Pesananbaru');
    }
    public function update_status_kirim($id)
    {
        $where = array(
            'id_transaksi' => $id,
        );
        $data = array(
            'status'   => 'K'
        );
        $this->M_status->update_status($where, $data, 'transaksi');
        $this->session->set_flashdata('message', '<small class="message-success alert" role="alert">Pesanan sudah dikirim</small>');
        redirect('Siapdikirim');
    }
}
