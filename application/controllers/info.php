<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {

	public function __construct(){
        
        parent::__construct();
        $this->load->model('model_info');
        
    }

	public function updateInfo(){

		$user = strtolower($this->input->post('u_name'));
		$bio  = strtolower($this->input->post('bio'));
		$loc  = strtolower($this->input->post('loc'));
		$web  = strtolower($this->input->post('web'));
		$fb   = strtolower($this->input->post('fb'));
		$go   = strtolower($this->input->post('go'));
		$twit = strtolower($this->input->post('twit'));

		$this->model_info->addInfo($user,$bio,$loc,$web,$fb,$go,$twit);

	}

	public function account(){

		$user    = strtolower($this->input->post('user'));
		$email   = strtolower($this->input->post('email'));
		$lang    = strtolower($this->input->post('lang'));
		$country = strtolower($this->input->post('country'));
		$video   = strtolower($this->input->post('video'));

		$this->model_info->upAccount($user,$email,$lang,$country,$video);
	}


	public function privacy(){

		$wp     = strtolower($this->input->post('wp'));
		$wf     = strtolower($this->input->post('wf'));
		$wc     = strtolower($this->input->post('wc'));
		$wph    = strtolower($this->input->post('wph'));
		$wv     = strtolower($this->input->post('wv'));
		$wm     = strtolower($this->input->post('wm'));
		$wbd    = strtolower($this->input->post('wbd'));
		$wt     = strtolower($this->input->post('wt'));
		$off    = strtolower($this->input->post('off'));

		$this->model_info->upPrivacy($wp,$wf,$wc,$wph,$wv,$wm,$wbd,$wt,$off);

	}

	public function emailn(){

		$fol     = strtolower($this->input->post('fol'));
		$men     = strtolower($this->input->post('men'));
		$sms     = strtolower($this->input->post('sms'));
		$com     = strtolower($this->input->post('com'));
		$like    = strtolower($this->input->post('like'));

		$this->model_info->upEmail($fol,$men,$sms,$com,$like);
	}
	
	public function webn(){

		$fol     = strtolower($this->input->post('fol'));
		$men     = strtolower($this->input->post('men'));
		$sms     = strtolower($this->input->post('sms'));
		$com     = strtolower($this->input->post('com'));
		$like    = strtolower($this->input->post('like'));
		$share    = strtolower($this->input->post('share'));

		$this->model_info->upWeb($fol,$men,$sms,$com,$like,$share);
	}
	
}