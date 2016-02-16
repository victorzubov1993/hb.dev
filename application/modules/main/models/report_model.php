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

	function get_report_by_month($month,$year)
	{
		$query = $this->db->query('select date,sum,title_categor,title FROM expense,account,category where YEAR( DATE ) = "'.$year.'" and MONTH( date ) ="'.$month.'" and expense.account_id=account.id and expense.category_id=category.id');

		return $result = $query->result();

	}
}
?>