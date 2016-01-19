<?php

class MY_Controller extends MX_Controller {
	public function __construct() { 
        parent::MX_Controller();
        $CI->clear();
    }

   function clear(){
      header("Cache-Control: no-store, no-cache, must-revalidate"); 
  }
}