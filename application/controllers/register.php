<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	
public function SignUp(){


		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE){

			echo "Error";

		}else{

			echo "Success";
		}

	}
}