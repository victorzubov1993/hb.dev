<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function create()
	{
		$data = array(
		'firstname' =>htmlspecialchars($_REQUEST['firstname']),
		'lastname' => htmlspecialchars($_REQUEST['lastname']),
		'phone' => htmlspecialchars($_REQUEST['phone']),
		'email' => htmlspecialchars($_REQUEST['email'])
		);

		$result = $this->db->insert('users',$data);
		if ($result){
			echo json_encode(array(
							'id' => mysql_insert_id(),
							'firstname' => $data['firstname'],
							'lastname' => $data['lastname'],
							'phone' => $data['phone'],
							'email' => $data['email']
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
	        $this->db->select(array('date','sum','title_categor','title'));
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
	                'title_categor'=>$data->title_categor,
	                'title'=>$data->title
	            );
	        }
        $result=array_merge($result,array('rows'=>$row));
        // var_dump($result);

        return json_encode($result,JSON_UNESCAPED_UNICODE);
	}
}