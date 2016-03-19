<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
    var $details;    

     function validate_user($username,$password){
     	$this->db->from('user');
     	$this->db->where('user_name',$username);
     	$this->db->where('password', md5($password));
     	$login = $this->db->get()->result();

     	if(is_array($login) && count($login) == 1 ) {
     		$this->details = $login[0];
     		$this->set_session();
     		return true;
     	}
     	return false;
     }

     function set_session() {
     	$this->session->set_userdata( array(
     		'id' => $this->details->id,
     		'isLoggedIn'=>true
     		 )
     	);
     }


}?>
