<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarakun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_daftar','daftar');
        $this->load->library('form_validation');
    }

    public function index()
    {
		$this->load->view('daftarakun');
	}

    public function add()
    {
        $this->daftar->save();
        $this->session->set_flashdata('msg',sukses('Berhasil Daftar!! Silahkan Login!!!'));
        redirect('login');
    }


}