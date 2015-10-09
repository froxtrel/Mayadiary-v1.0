<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {


	public function __construct(){
        
        parent::__construct();
         $this->clear_cache();
        $this->load->model('model_post');
    }

	
	public function insertPost(){

		 $type  = $this->input->post('type');
		 $map   = $this->input->post('map');
		 $link  = $this->input->post('link'); 
		 $video = $this->input->post('video');
		 $music = $this->input->post('music');
		 $body  = $this->input->post('body');
		 $from  = $this->input->post('from');
		 $to    = $this->input->post('to');
		 $mood  = $this->input->post('mood');
		 $feel  = $this->input->post('feel');

		 $this->model_post->insertPost($body,$from,$to,$mood,$feel,$music,$video,$map,$link,$type);


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

	public function clear_cache(){
 	
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

}