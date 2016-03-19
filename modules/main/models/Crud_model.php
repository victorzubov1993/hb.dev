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
	
	public function getUsers()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$offset = ($page-1)*$rows;		
		$result['rows'] = $this->db->limit($rows,$offset)->get('users')->result();
		$result['total'] = $this->db->count_all('users');
		
    	$this->firephp->log($rows);
		echo json_encode($result);
	}
}