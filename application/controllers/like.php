<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Like extends CI_Controller {


public function __construct(){
        
        parent::__construct();
        $this->load->model('model_like');
    }


 public function insertLike(){

 	$id = $this->input->post('id');
 	$this->model_like->insertLike($id);

 }
	
}