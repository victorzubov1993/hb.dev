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
		// $data['month_expense'] = $this->report_model->get_all_sum_month(2016,2,6);
		$array2 = array();
		$array2 = $this->report_model->get_months_count();
		
		echo '<pre>';
		print_r($array2);
		echo '</pre>';

		
		if (isset($array2))
		{
			$farr = array();
			foreach ($array2 as $k) {
				$farr[date("F",mktime(0,0,0,$k['date']))] = $k['date'];
			}
			foreach ($farr as $k => $value) {
				$data['month_expense'] = $this->report_model->get_all_sum_month(2016,$value,6);
				$data['month_income'] = $this->report_model->get_all_sum_month(2016,$value,5);
				$array[$k] = array(
						'month'		  => $value,
						'expense_sum' => $data['month_expense'][0]['summa'],
						'income_sum'  => $data['month_income'][0]['summa']);
			}
			if(isset($array))
			{
				$data['array'] = $array;
			}
		}				

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
		$data['month'] =$this->calendar->get_month_name($iMonth);

		$data['sum_m_exp'] = $this->report_model->sum_month($iYear,$iMonth,5);
		$data['m_report_exp'] = $this->report_model->get_report_by_month($iYear,$iMonth,5);
		$data['m_report_inc'] = $this->report_model->get_report_by_month($iYear,$iMonth,6);
		$data['sum_m_inc'] = $this->report_model->sum_month($iYear,$iMonth,6);
		
		$this->load->view('includes/template', $data);
		// $this->output->enable_profiler(TRUE);
	}

	

	

}