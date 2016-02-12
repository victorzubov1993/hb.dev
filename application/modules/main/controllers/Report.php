<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MX_Controller
{
	function __counstruct()
	{

	}

	public function index()
		{
			$data['main_content'] = 'report-block';
			$this->load->view('includes/template', $data);
		}
}