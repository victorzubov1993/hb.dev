<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Main extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        //load the main model
        $this->load->model('main_model');
	}

	public function index()
	{
        $date = date("Y-m-d");
        $data['account'] = $this->main_model->get_account();
        $data['category'] = $this->main_model->get_category();

        $data['last_op'] = $this->main_model->get_all_operation($date);
        $data['sum'] = $this->main_model->get_sum_of_current_day($date);
		$data['main_content'] = 'main-block';
        $this->load->view('includes/template', $data);  			
		//	$this->output->enable_profiler(TRUE);	
     }
     		
	

    public function add_operation(){
        //$this->output->enable_profiler(TRUE);
        // $data['account'] = $this->main_model->get_account();
        // $data['category'] = $this->main_model->get_category();
        
        //$data['operation_data'] = $this->main_model->get_expense();
        
        
        $this->form_validation->set_rules('name','Наименование');
        $this->form_validation->set_rules('sum','Сумма', 'numeric');
        $this->form_validation->set_rules('date','Дата', 'required');
        $this->form_validation->set_rules('sel2','Категория');
        $this->form_validation->set_rules('sel1','Счет');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('main/index');
        }
        else
        {
            $data = array(
                'description' => $this->input->post('name'),
                'sum' => $this->input->post('sum'),
                'date' => date('Y-m-d',strtotime($this->input->post('date'))),
                'category_id' => $this->input->post('sel2'),
                'account_id' => $this->input->post('sel1'),
                'user_id' =>'3'
                 );


            $this->db->insert('expense',$data);
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Данные успешно добавлены</div>');
            
            redirect('main/index'); 
            var_dump($_POST);               
        }
    }

    public function reports()
    {
        
    }	
}