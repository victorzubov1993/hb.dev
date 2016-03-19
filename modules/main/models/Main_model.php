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
    	$title_name = array('-Выберите счет-');

    	for ($i=0; $i < count($result); $i++) { 
    		array_push($account_id, $result[$i]->id);
    		array_push($title_name, $result[$i]->title);
    	}

    	return $account_result = array_combine($account_id, $title_name);

    }

    function get_expense_category() 
    {
    	$this->db->select('category.id,title_categor',FALSE);
    	$this->db->from('category');
        $this->db->from('operation_type');
        $this->db->where('operation_type.operation_title', '"Расход"',FALSE);
        $this->db->where('category.category_type','operation_type.id',FALSE);
    	$query = $this->db->get();
    	$result = $query->result();

    	$category_id = array('-Выберите категорию-');
    	$category_name = array('-Выберите категорию-');

    	for ($i=0; $i < count($result); $i++) { 
    		array_push($category_id, $result[$i]->id);
    		array_push($category_name, $result[$i]->title_categor);
    	}

    	return $category_result = array_combine($category_id, $category_name);

    }

    function get_income_category() 
    {
        $this->db->select('category.id,title_categor',FALSE);        
        $this->db->from('category');
        $this->db->from('operation_type');
        $this->db->where('operation_type.operation_title', '"Доход"',FALSE);
        $this->db->where('category.category_type','operation_type.id',FALSE);
        $query = $this->db->get();
        $result = $query->result();

        $category_id = array('-Выберите категорию-');
        $category_name = array('-Выберите категорию-');

        for ($i=0; $i < count($result); $i++) { 
            array_push($category_id, $result[$i]->id);
            array_push($category_name, $result[$i]->title_categor);
        }

        return $category_result = array_combine($category_id, $category_name);

    }	    

    function get_all_operation($date,$operation_type)
    {
        $query = $this->db->query('select title_categor,sum from category,expense,account where expense.category_id=category.id and expense.account_id=account.id and expense.date= "'.$date.'" and expense.operation_type= "'.$operation_type.'"');
        return $result = $query->result();
    }

    function get_sum_of_current_day($date,$operation_type)
    {
        $query = $this->db->query('select SUM(sum) from expense,category,account where expense.category_id=category.id and expense.account_id=account.id and expense.date = "'.$date.'" and expense.operation_type = "'.$operation_type.'"');
        return $result = $query->result_array();
    }

    function get_budget_info()
    {
        $this->db->select(array('id','title','balance'));
        $this->db->from('account');        
        return $result = $this->db->get()->result();
    }

    function get_balance($id,$user_id)
    {
        $this->db->select('balance');
        $this->db->from('account');
        $this->db->where('id',$id);
        $this->db->where('user_id',$user_id);
        $result = $this->db->get()->result_array();
        
        return $result;
    }

    function get_category_title()
    {
        $this->db->select('title_categor');
        $this->db->from('category');
        $result = $this->db->get()->result();
        return $result;
    }
    function get_account_title()
    {
        $this->db->select('title');
        $this->db->from('account');
        $result = $this->db->get()->result();
        return $result;
    }
}
?>