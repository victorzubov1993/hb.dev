<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('fb');
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
							));
		} else {
			echo json_encode(array('errorMsg'=>'Some errors occured.'));

		}
	}
	
	public function update($id)
	{
		
	}
	
	public function delete($id)
	{
		
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
	        $this->db->select(array('date','sum','title_categor','title','operation_type'));
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
	                'date'=>$data->date,
	                'sum'=>$data->sum,
	                'category'=>$data->title_categor,
	                'account'=>$data->title,
	                'operation'=>$data->operation_type
	            );
	        }
        $result=array_merge($result,array('rows'=>$row));
        // var_dump($result);

        return json_encode($result,JSON_UNESCAPED_UNICODE);
	}
}