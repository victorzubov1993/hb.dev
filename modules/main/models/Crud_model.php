<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('fb');
	}
	
	function addFilterCondition($where, $add, $and = true){
		if ($where) {
			if ($and) $where .= " AND $add";
			else $where .= " OR $add";
		}
		else $where = $add;
		return $where;
	}
	
	function filter(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'expense.id';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;
        $result = array();
        $result['total'] = $this->db->get('expense')->num_rows();
        $row = array();
		
		if (!empty($_POST["filter"])) {
		$where = "";		
		if (isset($_POST["vendors"])) {
			$ids=$_POST["vendors"];
			$inQuery = implode(',', $ids);
			$where = Crud_model::addFilterCondition($where, 'expense.category_id IN ('. $inQuery .')');
		}	

		$sql = 'SELECT expense.id,expense.date,expense.sum,title_categor,title,expense.operation_type
				FROM category,expense,account
		';
		$second='expense.category_id = category.id AND expense.account_id = account.id 
				AND operation_type = 5';	
		if ($where) $sql .= " WHERE $where AND ".$second;
		else $sql .= " WHERE ".$second;
		
		$query = $this->db->query($sql);
		$resultat = $query->result();
		foreach ($resultat as $data) {
			$row[] = array(
			'id'=>$data->id,
			'date'=>$data->date,
			'sum'=>$data->sum,
			'title_categor'=>$data->title_categor,
			'title'=>$data->title,
			'operation_type'=>$data->operation_type
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		// echo "<pre>";
		// var_export($result);
		// echo "</pre>";
        return json_encode($result);
	}
	}
	
	public function create()
	{
		$data = array(
		'operation_type' =>htmlspecialchars($_REQUEST['operation']),
		'date' => htmlspecialchars($_REQUEST['date']),
		'sum' => htmlspecialchars($_REQUEST['sum']),
		'category_id' => htmlspecialchars($_REQUEST['category']),
		'account_id' => htmlspecialchars($_REQUEST['account']),
		'user_id'=>3
		);
		fb($_REQUEST,'data',FirePHP::DUMP);
		$result = $this->db->insert('expense',$data);
		if ($result){
			echo json_encode(array(							
							'operation' => $data['operation'],
							'date' => $data['date'],
							'sum' => $data['sum'],
							'category' => $data['category'],
							'account'  => $data['account'],							
							'message'=>'Данные успешно добавлены'));
		} else {
			echo json_encode(array('errorMsg'=>'Some errors occured.'));

		}
	}
	
	public function update($id)
	{
		$data = array(
			'id'=>$id,
			'date'=>$this->input->post('date',true),
            'sum'=>$this->input->post('sum',true),
            'account_id'=>$this->input->post('account',true),
            'category_id'=>$this->input->post('category',true),            
            'user_id'=>3,
            'operation_type'=>$this->input->post('operation',true)
            );
		$this->db->where('id', $id);
        $result = $this->db->update('expense',$data);
        if($result){
        	echo json_encode(array(
        		'id'=>$data['id'],
        		'date'=>$data['date'],
        		'sum'=>$data['sum'],
        		'account_id'=>$data['account_id'],
        		'category_id'=>$data['category_id'],
        		'user_id'=>3,
        		'operation_type'=>$data['operation_type']));
        } else {
        	echo json_encode(array('errorMsg'=>'Some errors occured.'));
        }
	}
	
	public function delete($id)
	{
		$result = $this->db->delete('expense', array('id' => $id));
		if ($result){
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}
	}	

	public function getExpense($operation_type)
	{
		
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'expense.id';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;
        $result = array();
        $result['total'] = $this->db->get('expense')->num_rows();
        $row = array();
	        $this->db->select(array('expense.id','date','sum','title_categor','title','operation_type'),FALSE);
	        $this->db->from('category');
	        $this->db->from('expense');
	        $this->db->from('account');
	        $this->db->where('expense.category_id','category.id',FALSE);
	        $this->db->where('expense.account_id','account.id',FALSE);
	        $this->db->where('operation_type',$operation_type,FALSE);
	        $this->db->limit($rows,$offset);
	        $this->db->order_by($sort,$order);
	    $query = $this->db->get();
       	$criteria = $query->result();
	        foreach($criteria as $data)
	        {   
	            $row[] = array(
	            	'id'=>$data->id,
	                'date'=>$data->date,
	                'sum'=>$data->sum,
	                'category'=>$data->title_categor,
	                'account'=>$data->title,
	                'operation'=>$data->operation_type
	            );
	        }
        $result=array_merge($result,array('rows'=>$row));
		// echo "<pre>";
		// var_export($result);
		// echo "</pre>";
        return json_encode($result);
	}
}