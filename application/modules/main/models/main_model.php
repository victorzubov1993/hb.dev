<?php
/* 
 * File Name: employee_model.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_account() 
    {
    	$this->db->select('id');
    	$this->db->select('title');
    	$this->db->from('account');
    	$query = $this->db->get();
    	$result = $query->result();

    	$account_id = array('-Выберите счет-');
    	$title_name = array('-Выберите счету-');

    	for ($i=0; $i < count($result); $i++) { 
    		array_push($account_id, $result[$i]->id);
    		array_push($title_name, $result[$i]->title);
    	}

    	return $account_result = array_combine($account_id, $title_name);

    }

    function get_category() 
    {
    	$this->db->select('id');
    	$this->db->select('title_categor');
    	$this->db->from('category');
    	$query = $this->db->get();
    	$result = $query->result();

    	$category_id = array('-Выберите категоруиювуу-');
    	$category_name = array('-Выберите категорию-');

    	for ($i=0; $i < count($result); $i++) { 
    		array_push($category_id, $result[$i]->id);
    		array_push($category_name, $result[$i]->title_categor);
    	}

    	return $category_result = array_combine($category_id, $category_name);

    }
	
	function get_expense()
	{
		$query = $this->db->query('select expense.id,date,sum,description,category.title_categor,account.title from expense,category,account where expense.account_id=account.id and expense.category_id=category.id order by expense.id desc');
		return $result = $query->result();
		
	}
}