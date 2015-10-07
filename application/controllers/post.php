<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {


	public function __construct(){
        
        parent::__construct();
        $this->load->model('model_post');
    }

	
	public function insertPost(){

		 $body = $this->input->post('body');
		 $from = $this->input->post('from');
		 $to = $this->input->post('to');

		 $this->model_post->insertPost($body,$from,$to);


	}
}