<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Budget_Widget extends MX_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
	}

	public function widget()
	{
		$budget['widget'] = $this->main_model->get_budget_info();
		// echo '<pre>';
		// echo var_dump($budget);
		// echo '</pre>';
		$this->load->view('budget-widget-view',$budget);
	}
}