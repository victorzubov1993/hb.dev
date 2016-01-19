<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Template
	{		
		public function main()
		{
			$CI =& get_instance();
			$CI->load->view('dashboard');
		}
	}
?>