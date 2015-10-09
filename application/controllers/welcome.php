<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

public function __construct(){
        
        parent::__construct();
         $this->clear_cache();
        
    }
	
public function index(){
		
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}

public function clear_cache(){
 	
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */