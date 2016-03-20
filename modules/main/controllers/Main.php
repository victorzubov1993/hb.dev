<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('crud_model');
	}

	public function index()
	{
		if(isset($_GET['grid'])&& isset($_GET['oper']))
			
			echo $this->crud_model->getExpense($_GET['oper']);
		else
			$this->load->view('main/crud');
	}

    public function expense(){

    }
	 
	
	public function create()
	{
		if(!isset($_POST))	
			show_404();
		
		if($this->crud_model->create())
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal memasukkan data'));
	}
	
	public function update($id=null)
	{
		if(!isset($_POST))	
			show_404();
		
		if($this->crud_model->update($id))
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal mengubah data'));
	}
	
	public function delete()
	{
		if(!isset($_POST))	
			show_404();
		
		$id = intval(addslashes($_POST['id']));
		if($this->crud_model->delete($id))
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal menghapus data'));
	}
}
