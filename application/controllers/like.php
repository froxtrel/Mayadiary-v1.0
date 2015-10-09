<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Like extends CI_Controller {


public function __construct(){
        
        parent::__construct();
        $this->clear_cache();
        $this->load->model('model_like');
    }


public function insertLike(){

 	$id = $this->input->post('id');
 	$this->model_like->insertLike($id);

  }

public function clear_cache(){
 	
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

}