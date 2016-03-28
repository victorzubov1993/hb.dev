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
