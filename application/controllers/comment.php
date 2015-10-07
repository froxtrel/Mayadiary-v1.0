<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {


public function __construct(){
        
        parent::__construct();
        $this->load->model('model_comment');
    }


 public function insertComment(){

 	   $id   = $this->input->post('id');
 	   $body = $this->input->post('body');

 	   $this->model_comment->insertCom($id,$body);

 }
	
}