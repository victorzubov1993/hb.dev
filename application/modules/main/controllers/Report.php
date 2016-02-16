<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('report_model');
		$this->load->database();
		
	}

	public function index()
	{
		$data['main_content'] = 'report-block';
		$this->load->view('includes/template',$data);
	}

	public function month()
	{
		$this->load->library('calendar');
		if (isset($_GET['year']) && isset($_GET['month'])) {
			
	    list($iMonth, $iYear) = array($_GET['month'], $_GET['year']);
		    $iMonth = (int)$iMonth;
		    $iYear = (int)$iYear;
		} else {
			$iMonth = date("n");
			$iYear = date("Y");
		    list($iMonth, $iYear) = array($iMonth,$iYear);
		}
		$iPrevYear = $iYear;
		$iPrevMonth = $iMonth - 1;
			if ($iPrevMonth <= 0) {
    			$iPrevYear--;
    			$iPrevMonth = 12; // set to December
			}
		$data['iPrevMonth'] = $iPrevMonth;
		$data['iPrevYear'] = $iPrevYear;
		$data['iMonth'] = $iMonth;
		$data['iYear'] = $iYear;
		$iNextYear = $iYear;
		$iNextMonth = $iMonth + 1;
			if ($iNextMonth > 12) {
		    	$iNextYear++;
		    	$iNextMonth = 1;
			}
		$data['iNextMonth'] = $iNextMonth;
		$data['iNextYear'] = $iNextYear;
		$data['main_content'] = 'month-report-block';	
		//$data['month'] =$this->calendar->get_month_name($iMonth);


		
		$data['m_report'] = $this->report_model->get_report_by_month($iYear,$iMonth);
		$data['sum_m'] = $this->report_model->sum_month($iYear,$iMonth);
		
		$this->load->view('includes/template', $data);
	}

	

	

}