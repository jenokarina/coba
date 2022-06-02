<?php

class Home extends CI_Controller
{
    public function index()
    {
         $data['title'] = "AGRIDATION";
        $this->load->view('templates/header', $data);
        $this->load->view('index');
        $this->load->view('templates/footer');
    }
}