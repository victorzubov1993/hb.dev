<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Report_model extends CI_Model
{
	
	function __construct()
	{
		// Call the Model constructor
        parent::__construct();
	}

	function get_report_by_month($year,$month,$operation_type)
	{
		$query = $this->db->query('select date,sum,title_categor,title FROM expense,account,category where YEAR(date) = "'.$year.'" and MONTH(date) ="'.$month.'" and expense.account_id=account.id and expense.category_id=category.id and expense.operation_type= "'.$operation_type.'"');

		return $result = $query->result();

	}
	function sum_month($year,$month,$operation_type)
	{
		$query = $this->db->query('select SUM(sum) FROM expense,account,category where YEAR(date) = "'.$year.'" and MONTH(date) ="'.$month.'" and expense.account_id=account.id and expense.category_id=category.id and expense.operation_type= "'.$operation_type.'"');
		return $result = $query->result_array();
	}
}
