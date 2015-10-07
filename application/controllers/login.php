<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


public function __construct(){
        
        parent::__construct();
        $this->load->model('model_login');
    }
	
public function LoginUser(){


		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');

		$this->form_validation->set_rules('l_pass','password','trim|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('l_email','email','trim|valid_email');

		if ($this->form_validation->run() == FALSE){

			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('footer');

		}else{

			$result = $this->model_login->loginUser();

			if($result){

			redirect('profile/userProfile', 'refresh');

			}
			
		}

	}
}