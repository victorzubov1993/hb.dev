<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('main_model');
        $this->load->model('report_model');
	}

	public function index()
	{
        
     }
     
    /
}