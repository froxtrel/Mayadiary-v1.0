<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {


	public function __construct(){
        
        parent::__construct();
        $this->load->model('model_register');
    }

	
	public function SignUp(){


		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');

		$this->form_validation->set_rules('r_user','username','trim|min_length[5]|max_length[15]|is_unique[user.username]');
		$this->form_validation->set_rules('r_email','email','trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('r_pass','password', 'trim|min_length[8]');
		$this->form_validation->set_rules('r_date','date');

		if ($this->form_validation->run() == FALSE){

			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('footer');

		}else{


			$data['success'] = '<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Registration Success</div>';

			$this->model_register->insertUser();
			$this->load->view('header');
			$this->load->view('index',$data);
			$this->load->view('footer');

		    
		}

	}
}