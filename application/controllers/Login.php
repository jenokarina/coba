<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation', 'session');
        $this->load->model('M_login');
        $this->load->helper('url', 'form');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'Username harus diisi!']);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Password harus diisi!']);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/v_login');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $passsword = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($passsword, $user['password'])) {
                $this->session->userdata('username', $user);
                $data = [
                    'username' => $user['username'],
                    'id_user' => $user['id_user'],
                    'akses' => $user['akses'],
                    'status' => 'login'
                ];
                $this->session->set_userdata($data);
                if ($user['akses'] == 'user') {
                    redirect('');
                } else {
                    redirect('Penjual');
                }
            } else {
                $this->session->set_flashdata('message', '<small class="message-danger alert" role="alert">Password salah!</small>');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('message', '<small class="message-danger alert" role="alert">Akun tidak terdaftar</small>');
            redirect('Login');
        }
    }
    public function daftar_akun()
    {

        if ($this->session->userdata('username')) {
            redirect('');
        }

        //generate simple random code
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($set), 0, 12);

        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required|trim', [
            'required' => 'Nama harus diisi!',
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Username harus diisi!',
            'is_unique' => 'Username sudah digunakan!',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email harus diisi!',
            'is_unique' => 'Email sudah digunakan!',
            'valid_email' => 'Email tidak valid!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password harus diisi!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/v_regist');
        } else {
            $data = [
                'username' => $username = htmlspecialchars($this->input->post('username', true)),
                'nama_lengkap' => $nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap', true)),
                'email' => $email = htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'akses' => 'user',
                'saldo' => 100000000
            ];
            $id = $this->M_login->insertid($data);
            $this->session->set_flashdata('message', '<small class="message-success alert" role="alert">Berhasil, silahkan login</small>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }
}
