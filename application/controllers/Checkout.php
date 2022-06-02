<?php

class Checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_checkout');
        $this->load->helper('form', 'url');

        if ($this->session->userdata('akses') == 'penjual') {
            redirect('Penjual');
        }
    }
    public function index()
    {
        $data['title'] = "Checkout";
        $data['ongkir'] = $this->M_checkout->ongkir();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('checkout');
    }
    public function pembayaran()
    {
        $id_user            = $this->input->post('id_user');
        $nama_penerima      = $this->input->post('nama_penerima');
        $saldo              = $this->input->post('saldo');
        $no_tlp             = $this->input->post('no_tlp');
        $kota               = $this->input->post('kota');
        $kode_pos           = $this->input->post('kode_pos');
        $alamat             = $this->input->post('alamat');
        $id_ongkir          = $this->input->post('id_ongkir');
        $grand_total        = $this->input->post('grand_total');
        $query              = $this->db->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
        $ongkir             = $query->row_array();
        $total_harga        = $grand_total + $ongkir['harga_ongkos'];

        if ($saldo <= $total_harga) {
            $this->session->set_flashdata('message', '<small class="message-danger alert" role="alert">Pembayaran gagal, saldo kamu tidak mencukupi!</small>');
            redirect('');
        } else {
            $data = array(
                'id_user'       => $id_user,
                'nama_penerima' => $nama_penerima,
                'no_tlp'        => $no_tlp,
                'kota'          => $kota,
                'kode_pos'      => $kode_pos,
                'alamat'        => $alamat,
            );

            $id_alamat = $this->M_checkout->pembayaran('alamat', $data);
            $data = array(
                'id_user'       => $id_user,
                'id_alamat'     => $id_alamat,
                'id_ongkir'     => $id_ongkir,
                'tanggal'       => date('Y-m-d'),
                'sub_total'     => $grand_total,
                'total_harga'   => $total_harga,
                'status'        => 'M'
            );
            $id_transaksi = $this->M_checkout->pembayaran('transaksi', $data);

            foreach ($this->cart->contents() as $item) {
                $data = array(
                    'id_transaksi'  => $id_transaksi,
                    'id_produk'  => $item['id'],
                    'jumlah'  => $item['qty'],
                    'sub_total'  => $item['price'] * $item['qty']
                );
                $this->M_checkout->pembayaran('penjualan_produk', $data);
            }
            $this->cart->destroy();
            $this->session->set_flashdata('message', '<small class="message-success alert" role="alert">Pembayaran berhasil, pesanan anda akan segera di proses!</small>');
            redirect('Status');
        }
    }
}
