<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('crud_model');
        $this->load->model('main_model');
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
		
		if (!empty($_POST["filter"])) {
		$where = "";		
		if ($_POST["vendors"]) {
			$ids=$_POST["vendors"];
			$inQuery = implode(',', $ids);
			$where = Main::addFilterCondition($where, 'expense.category_id IN ('. $inQuery .')');
		}		

		$sql = 'SELECT expense.id,expense.date,expense.sum,title_categor,title,expense.operation_type
				FROM category,expense,account
		';
		$second='expense.category_id = category.id AND expense.account_id = account.id 
				AND operation_type = 5';	
		if ($where) $sql .= " WHERE $where AND ".$second;
		else $sql .= " WHERE ".$second;
		
		$query = $this->db->query($sql);
		$result = $query->result();
		foreach ($result as $data) {
			$row[] = array(
			'id'=>$data->id,
			'date'=>$data->date,
			'sum'=>$data->sum,
			'title_categor'=>$data->title_categor,
			'title'=>$data->title,
			'operation_type'=>$data->operation_type
			);
		}
		echo "<pre>";
		var_export($row);
		echo "</pre>";
		
		return json_encode($row);
	}
	}

    public function expense(){
        if(isset($_GET['grid'])&& isset($_GET['oper']))         
            echo $this->crud_model->getExpense($_GET['oper']);
        else
            $this->load->view('main/expense-crud');

    }

    public function income(){
     if(isset($_GET['grid'])&& isset($_GET['oper']))         
            echo $this->crud_model->getExpense($_GET['oper']);
        else
            $this->load->view('main/income-crud');
    }

	public function index()	{
		$this->load->view('main');
	}

    public function get_operation(){
        echo $this->main_model->getOperationType();
    }

    public function get_category(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            echo $this->main_model->getCategoryById($id);
        }
    }
    public function get_account(){
        echo $this->main_model->getAccount();
    }	 
	
	public function create() {
		if(!isset($_POST))	
			show_404();		
		if($this->crud_model->create())
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Не удалось ввести данные'));
	}
	
	public function update() {
		if(!isset($_POST))	
			show_404();		
        $id = $_GET['id'];
		if($this->crud_model->update($id))
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Не удалось обновить данные'));
	}
	
	public function delete() {
		if(!isset($_POST))	
			show_404();		
		$id = intval(addslashes($_GET['id']));
		if($this->crud_model->delete($id))
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Не удалось удалить данные'));
	}
}
