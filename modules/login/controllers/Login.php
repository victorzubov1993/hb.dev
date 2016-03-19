<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends MX_Controller
{

     public function __construct()
     {
           parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
         // $this->load->database();
          $this->load->library('form_validation');
          $this->form_validation->CI =& $this;
          //load the login model
          $this->load->model('login_model');
          

     }

     public function login_user(){
          $username = $this->input->post('txt_username');
          $password = $this->input->post('txt_password');

          if ($username && $password && $this->login_model->validate_user($username,$password)) {
               redirect('main');
          } else {
               // $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
               // redirect('login');
               $this->show_login(true);
          }

     }

    public function show_login( $show_error = false ) {

    
        if( $this->session->userdata('isLoggedIn') ) {
            
            redirect('main');
        }

        $data['error'] = $show_error;       
        $this->load->helper('form');         
        $this->load->view('login_view',$data);

    }

     public function index() {          
          if( $this->session->userdata('isLoggedIn') ) {
            
            redirect('main');
        } else {

            $this->show_login(false);

        }
     }

     // public function index()

     // {
     //      //get the posted values
     //      $username = $this->input->post("txt_username");
     //      $password = $this->input->post("txt_password");
         
     //      //set validations
     //      $this->form_validation->set_rules("txt_username", "Username", "trim|required");
     //      $this->form_validation->set_rules("txt_password", "Password", "trim|required");

     //      if ($this->form_validation->run() == FALSE)
     //      {
     //           //validation fails
     //           $this->load->view('login_view');
     //      }
     //      else
     //      {
     //           //validation succeeds
     //           if ($this->input->post('btn_login') == "Login")
     //           {
     //                //check if username and password is correct
     //                $usr_result = $this->login_model->get_user($username, $password);
     //                if ($usr_result > 0) //active user record is present
     //                {
     //                     //set the session variables
     //                     $sessiondata = array(
     //                          'username' => $username,
     //                          'loginuser' => TRUE
     //                     );
     //                     $this->session->set_userdata($sessiondata);
                                             
     //                }
     //                else
     //                {
     //                     $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
     //                         redirect('login/index');
     //                }
     //           }
     //           else
     //           {
     //                redirect('login/index');
     //           }
     //      }
     // }    

     public function logout()
     {
          $this->session->sess_destroy();
          redirect('login/show_login');
     } 

     public function is_login()
     {
          $session = $this->session->userdata('username');
          echo var_dump($session);
     }
}
?>
