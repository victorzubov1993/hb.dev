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
		$array1 = array('january','february','march','april');
		for($i=0;$i<5;++$i){
			for ($j=0; $j <count($array1) ; ++$j) { 
				$array[$array1[$j]] = array(
					
						'expense_sum' =>1000+$j,
						'income_sum'  =>4000);
			}			
		}
		echo "<pre>";
		print_r($array);
		echo "</pre>";
		
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
		$this->output->enable_profiler(TRUE);
	}

	

	

}