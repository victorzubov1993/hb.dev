<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
        $this->load->model('main_model');
        $this->load->model('report_model');
	}

    public function income()
    {   
        $data['account']         = $this->main_model->get_account();        
        $data['income_category'] = $this->main_model->get_income_category(); 
        $data['income']          = $this->report_model->get_report_by_month(2016,3,6);
        $data['main_content']    = 'income-block';
        $this->load->view('includes/template',$data);
    }

    public function expense()
        {   
        $data['account']          = $this->main_model->get_account();
        $data['expense_category'] = $this->main_model->get_expense_category();        
        $data['expense']          = $this->report_model->get_report_by_month(2016,3,5);
        $data['main_content']     = 'expense-block';
        $this->load->view('includes/template',$data);
    }

	public function index()
	{
        $date = date("Y-m-d");
        $data['account']          = $this->main_model->get_account();
        $data['expense_category'] = $this->main_model->get_expense_category();
        $data['income_category']  = $this->main_model->get_income_category();        
        $data['last_op_exp']      = $this->main_model->get_all_operation($date,5);
        $data['last_op_inc']      = $this->main_model->get_all_operation($date,6);
        $data['sum_exp']          = $this->main_model->get_sum_of_current_day($date,5);
        $data['sum_inc']          = $this->main_model->get_sum_of_current_day($date,6);
        $data['main_content']     = 'main-block';
        $this->load->view('includes/template', $data);  			
	    // $this->output->enable_profiler(TRUE);	
     }
     
    public function add_expense(){      
        $this->form_validation->set_rules('name','Наименование');
        $this->form_validation->set_rules('sum','Сумма', 'numeric');
        $this->form_validation->set_rules('date','Дата', 'required');
        $this->form_validation->set_rules('sel2','Категория');
        $this->form_validation->set_rules('sel1','Счет');

        if ($this->form_validation->run() == FALSE)
        {
            redirect('main/expense');
        }
        else
        {
            $data = array(
                'description'    => $this->input->post('name'),
                'sum'            => $this->input->post('sum'),
                'date'           => date('Y-m-d',strtotime($this->input->post('date'))),
                'category_id'    => $this->input->post('sel2'),
                'account_id'     => $this->input->post('sel1'),
                'user_id'        =>'3',
                'operation_type' =>'5'
                 );
            $field           = (int)$this->input->post('sum');
            $balance['data'] = $this->main_model->get_balance(3,3);
            $bal = array(
                'balance' => $balance['data'][0]['balance'] - $field
                );
            $this->db->insert('expense',$data);
            $this->db->update('account',$bal,"id=3");                                
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Данные успешно добавлены</div>');
            $this->output->enable_profiler(TRUE);   
            redirect('main/expense');                           
        }
    }

    public function add_income(){      
        $this->form_validation->set_rules('name','Наименование');
        $this->form_validation->set_rules('sum','Сумма', 'numeric');
        $this->form_validation->set_rules('date','Дата', 'required');
        $this->form_validation->set_rules('sel2','Категория');
        $this->form_validation->set_rules('sel1','Счет');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('main/income');
        }
        else
        {
            $data = array(
                'description'    => $this->input->post('name'),
                'sum'            => $this->input->post('sum'),
                'date'           => date('Y-m-d',strtotime($this->input->post('date'))),
                'category_id'    => $this->input->post('sel2'),
                'account_id'     => $this->input->post('sel1'),
                'user_id'        =>'3',
                'operation_type' =>'6'
                 );
            $field           = (int)$this->input->post('sum');
            $balance['data'] = $this->main_model->get_balance(3,$data['user_id']);
            $bal = array(
                'balance' => $balance['data'][0]['balance'] + $field
                );
            $this->db->insert('expense',$data);
            $this->db->update('account',$bal,"id=3");                                            
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Данные успешно добавлены</div>');
            
            redirect('main/income');                           
        }
    }	
}