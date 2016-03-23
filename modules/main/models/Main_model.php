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

    function getOperationType(){
        $this->db->select(array('id','operation_title'));
        $this->db->from('operation_type');
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $data) {
            $row[] = array(
                'id'=>$data->id,
                'text'=>$data->operation_title
                );
        }

        return json_encode($row,JSON_UNESCAPED_UNICODE);
    }

    function getCategoryById($id){
        $this->db->select(array('id','title_categor'));
        $this->db->from('category');
        $this->db->where('category_type',$id);
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $data) {
            $row[] = array(
                'id'=>$data->id,
                'text'=>$data->title_categor
                );
        }
        return json_encode($row,JSON_UNESCAPED_UNICODE);
    }

    function getAccount() 
    {
    	$this->db->select('id');
    	$this->db->select('title');
    	$this->db->from('account');
    	$query = $this->db->get();
    	$result = $query->result();
        foreach ($result as $data) {
            $row[] = array(
                'id'=>$data->id,
                'text'=>$data->title
                );
        }
        return  json_encode($row,JSON_UNESCAPED_UNICODE);
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