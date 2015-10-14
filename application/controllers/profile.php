<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {


	public function __construct(){
        
        parent::__construct();
        $this->clear_cache();
        $this->load->model('model_profile');
    }

	
	public function userProfile($user){

			$data['user'] =  $this->model_profile->getData($user);

		 	if($data['user'] == '404'){

		 		$this->load->view('header');
				$this->load->view('404');
				$this->load->view('footer');	

		 	}else{

			 	$this->load->view('header');
				$this->load->view('profile',$data);
				$this->load->view('footer');	

		 	}


	}

	public function profileDesign($user){

		 $data['user'] =  $this->model_profile->getData($user);	

		 $this->load->view('header');
		 $this->load->view('profile_design',$data);
		 $this->load->view('footer');	

	}

	public function photoShow($user){

		 $data['user'] =  $this->model_profile->getData($user);	

		 $this->load->view('header');
		 $this->load->view('photo',$data);
		 $this->load->view('footer');	

	}

	public function peopleShow($user){

		 $data['user'] =  $this->model_profile->getData($user);	

		 $this->load->view('header');
		 $this->load->view('people',$data);
		 $this->load->view('footer');	

	}


	public function postview($user,$id){

		 $data['user'] =  $this->model_profile->getData($user);	
		 $data['post'] =  $this->model_profile->getPost($id);	

		 $this->load->view('header');
		 $this->load->view('postview',$data);
		 $this->load->view('footer');	

	}

	public function activityView($user,$id){

		 $data['user'] =  $this->model_profile->getData($user);	
		 $data['post'] =  $this->model_profile->getPost($id);	

		 $this->load->view('header');
		 $this->load->view('activity_view',$data);
		 $this->load->view('footer');	

	}

	public function statusView($user,$id){

		 $data['user'] =  $this->model_profile->getData($user);	
		 $data['post'] =  $this->model_profile->getPosts($id);	

		 $this->load->view('header');
		 $this->load->view('activity_view',$data);
		 $this->load->view('footer');	

	}




	public function clear_cache(){
 	
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

}