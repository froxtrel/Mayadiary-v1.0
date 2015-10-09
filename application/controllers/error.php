<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {
 
	function error_404(){
		
		$this->output->set_status_header('404');
		echo "404 - not found";
	}
}