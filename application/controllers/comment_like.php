<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_like extends CI_Controller {


public function __construct(){
        
        parent::__construct();
        $this->load->model('model_comment_like');
    }


 public function insertCommentLike(){

 	   $id   = $this->input->post('id');
 	   $this->model_comment_like->insertLike($id);

 }
	
}