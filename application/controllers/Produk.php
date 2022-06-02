<?php

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk');
    }
    public function index()
    {
        if ($this->session->userdata('akses') != 'penjual') {
            redirect('');
        }
        $data['title'] = 'Produk';
        $data['produk'] = $this->M_produk->data_produk();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('penjual/templates/header', $data);
        $this->load->view('penjual/produk', $data);
        $this->load->view('penjual/templates/footer');
    }
    public function tambah_produk()
    {
        if ($this->session->userdata('akses') != 'penjual') {
            redirect('');
        }
        $data['title'] = 'Produk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('penjual/templates/header', $data);
        $this->load->view('penjual/tambah_produk');
        $this->load->view('penjual/templates/footer');
    }
    public function input_produk()
    {
        $nama_produk =  $this->input->post('nama_produk');
        $harga       =  $this->input->post('harga');
        $stok        =  $this->input->post('stok');
        $deskripsi   =  $this->input->post('deskripsi');
        $foto        = $_FILES['foto']['name'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/img/upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Image Upload Failed!";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_produk' => $nama_produk,
            'harga'       => $harga,
            'stok'        => $stok,
            'foto'        => $foto,
            'deskripsi'   => $deskripsi
        );
        $query = $this->M_produk->input_produk('produk', $data);
        $this->session->set_flashdata('message', '<small class="message-success alert" role="alert">Data produk berhasil ditambah</small>');
        redirect('Produk');
    }
    public function edit_produk($id)
    {
        if ($this->session->userdata('akses') != 'penjual') {
            redirect('');
        }
        $data['dproduk'] = $this->M_produk->detail_produk($id);
        $data['title'] = 'Produk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('penjual/templates/header', $data);
        $this->load->view('penjual/edit_produk');
        $this->load->view('penjual/templates/footer');
    }
    public function update_produk()
    {
        $id_produk        = $this->input->post('id_produk');
        $nama_produk      = $this->input->post('nama_produk');
        $harga            = $this->input->post('harga');
        $stok             = $this->input->post('stok');
        $deskripsi        = $this->input->post('deskripsi');
        $old_image         = $this->input->post('old_image');

        //jika ada gambar
        $upload_image = $_FILES['foto']['name'];

        if ($upload_image) {
            $config['allowed_types']        = 'gif|jpg|png';
            $config['upload_path']          = './assets/img/upload/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $old_image = $old_image;
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/upload/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $where = array(
            'id_produk' => $id_produk,
        );

        $data = array(
            'nama_produk'   => $nama_produk,
            'harga'         => $harga,
            'stok'          => $stok,
            'deskripsi'     => $deskripsi
        );
        $this->M_produk->update_produk($where, $data, 'produk');
        $this->session->set_flashdata('message', '<small class="message-success alert" role="alert">Data produk berhasil diubah</small>');
        redirect('Produk');
    }
    public function hapus_produk($id)
    {
        $where = [
            'id_produk' => $id
        ];
        $this->M_produk->hapus_produk($where, 'produk');
        $this->session->set_flashdata('message', '<small class="message-success alert" role="alert">Data produk berhasil dihapus</small>');
        redirect('Produk');
    }
    public function detail_produk($id)
    {
        if ($this->session->userdata('akses') != 'penjual') {
            redirect('');
        }
        $data['dproduk'] = $this->M_produk->detail_produk($id);
        $data['title'] = 'Produk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('penjual/templates/header', $data);
        $this->load->view('penjual/detail_produk');
        $this->load->view('penjual/templates/footer');
    }
    public function detailproduk($id)
    {
        if ($this->session->userdata('akses') == 'penjual') {
            redirect('Penjual');
        }
        $data['dproduk'] = $this->M_produk->detail_produk($id);
        $data['title'] = 'Produk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('detailproduk');
        $this->load->view('templates/footer');
    }
    public function find($id)
    {
        $result = $this->db->where('id_produk', $id)
            ->limit(1)
            ->get('produk');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
