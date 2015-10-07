<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {


	public function __construct(){
        
        parent::__construct();
        $this->load->model('model_profile');
    }

	
	public function userProfile($user){

			$data['user'] =  $this->model_profile->getData($user);

			$this->load->view('header');
			$this->load->view('profile',$data);
			$this->load->view('footer');	

	}
}