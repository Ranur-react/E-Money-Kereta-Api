<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_daftar extends CI_Model
{
	    private $_table = "user";
	    public $id_user;
	    public $username;
		public $password;

	

	public function save()
    {  	
        $post = $this->input->post();
        $username = $post["un"];
        $password= $post["ps"];
        $this->db->query("INSERT INTO user(username,password) VALUES('$username',md5('$password'))");
    
    }

}

