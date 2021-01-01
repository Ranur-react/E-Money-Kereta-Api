<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class mlogin extends CI_Model{ 
		 
		function in($user,$pass)
		{return $this->db->query("select * from user where username='$user' and password=MD5('$pass')");}
			
	}
	
?>