<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_rfid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rfid','rfid');
        $this->load->library('form_validation');
    }

    public function index()
    {
		$d['data'] = $this->rfid->get_data();
		$data = array(
            'content' => $this->load->view('rfid',$d,true)
        );
		$this->load->view('home_admin',$data);
	}

public function newindex()
    {
        $d['data'] = $this->rfid->get_datanew();
        $data = array(
            'content' => $this->load->view('rfid',$d,true)
        );
        $this->load->view('home_admin',$data);
    }
    public function CekSaldo()
    {
        $data = $this->rfid->get_SaldoData('F9B2A5A3');
        foreach ($data->result_array() as $d) {
        echo $d['value'];

        }
    }
    public function add()
    {
        $this->rfid->save();
        $this->session->set_flashdata('msg',sukses('Data berhasil disimpan.'));
        redirect('C_rfid');
    }

    public function edit()
    {
            $this->rfid->update();
            $this->session->set_flashdata('msg',sukses('Data berhasil Diupdate.'));
            redirect('C_rfid');
        
    }

    public function delete()
    {
		$id = $this->input->post('id');
        if (! $this->rfid->delete($id)) {
        	$this->session->set_flashdata('msg',danger('Data gagal dihapus.'));
        } else {
        	$this->session->set_flashdata('msg',info('Data berhasil dihapus.'));
        }
        redirect('C_rfid');
	}

}