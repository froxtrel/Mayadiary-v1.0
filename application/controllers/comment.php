<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {


public function __construct(){
        
        parent::__construct();
        $this->clear_cache();
        $this->load->model('model_comment');
    }


 public function insertComment(){

 	   $id   = $this->input->post('id');
 	   $body = $this->input->post('body');

 	   $this->model_comment->insertCom($id,$body);

    }


  public function updateComment(){

  	   $id   = $this->input->post('id');
 	   $body = $this->input->post('body');

 	   $this->model_comment->updateCom($id,$body);
  }


  public function deleteComment(){

  	   $id   = $this->input->post('id');

 	   $this->model_comment->deleteCom($id);
  }
	
  

  public function clear_cache(){
  
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

}