<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MX_Controller
{
	function __counstruct()
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
		if (isset($_GET['r'])) {
	    list($iMonth, $iYear) = explode('-', $_GET['r']);
		    $iMonth = (int)$iMonth;
		    $iYear = (int)$iYear;
		} else {
		    list($iMonth, $iYear) = explode('-', date('n-Y'));
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
		$data['month'] =$this->calendar->get_month_name($iMonth);

		$year = $_GET['year'];
		$month = $_GET['month'];
		$data['m_report'] = $this->report_model->get_report_by_month($year,$month);
		
		$this->load->view('includes/template', $data);
	}

	

	

}