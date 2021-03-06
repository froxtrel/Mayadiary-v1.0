<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

public function __construct(){
        
        parent::__construct();
        $this->clear_cache();
        $this->load->model('model_profile');
    }
	
public function goHome(){

		$user = $this->session->userdata('username');
		$data['user'] =  $this->model_profile->getData($user);
		
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}

public function clear_cache(){
 	
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */