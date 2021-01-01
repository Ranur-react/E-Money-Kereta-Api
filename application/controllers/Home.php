<?php

class Home extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

	public function index()
	{
		$data = array(
            'content' => $this->load->view('_partials/content','',true)
        );
		$this->load->view('home_admin',$data);
	}
}