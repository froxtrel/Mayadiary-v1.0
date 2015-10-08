<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {


	public function __construct(){
        
        parent::__construct();
        $this->load->model('model_post');
    }

	
	public function insertPost(){

		 $video = $this->input->post('video');
		 $music = $this->input->post('music');
		 $body  = $this->input->post('body');
		 $from  = $this->input->post('from');
		 $to    = $this->input->post('to');
		 $mood  = $this->input->post('mood');
		 $feel  = $this->input->post('feel');

		 $this->model_post->insertPost($body,$from,$to,$mood,$feel,$music,$video);


	}

	public function deletePost(){

		$id = $this->input->post('id');
		$this->model_post->delPost($id);

	}

	public function updatePost(){

		$id = $this->input->post('id');
		$body = $this->input->post('body');
		$this->model_post->upPost($id,$body);


	}

	public function insertShared(){

		$id = $this->input->post('id');
		$body = ' ';
		$this->model_post->insertShare($id,$body);


	}
}