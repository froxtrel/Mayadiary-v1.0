<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Limit extends CI_Controller {

	public function __construct(){
        
        parent::__construct();
        
    }

	public function increaseLimit(){

		$lim = $this->input->post('lim');
		$this->session->set_userdata('limit', $lim);
		echo  $this->session->userdata('limit');
	}

	public function resetLimit(){

		$this->session->set_userdata('limit', 10);
		echo  $this->session->userdata('limit');
	}
	
}