<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin','mlogin');	 
	}

	function index()
	{
		$this->load->view('login');
	}

	function masuk()
	{
		$user	=strip_tags(str_replace("'","",$this->input->post('un',true)));
		$pass	=strip_tags(str_replace("'","",$this->input->post('ps',true)));
		$cekakun=$this->mlogin->in($user,$pass);
		if(strlen($user)=='' || strlen($pass)=='')
		{
			$this->session->set_flashdata('msg',danger('Username Atau Password anda Tidak Boleh kosong!!'));
			$url=base_url();
			redirect($url);
		}
		else{
			if($cekakun->num_rows()>0){ 
				$rcekuser=$cekakun->row_array();
				$this->session->set_userdata('masuk',true);
				$this->session->set_userdata('status_login','oke');
				$this->session->set_userdata('user',$rcekuser['username']);
				$this->session->set_userdata('password',$rcekuser['password']);
			}
			else{
				$this->session->set_userdata('masuk',false);

			}
			if ($this->session->userdata('masuk')==true){
				$user=$this->session->userdata('user');
				redirect('Home');
			}
			else{
				$this->session->set_flashdata('msg',Danger('Username Atau Password Salah!!!'));
				$url=base_url();
				redirect($url);
			}
		}
	}
	

	function logout()
	{
		$this->session->sess_destroy();
		$url=base_url();
		redirect($url);

	}
}
?>