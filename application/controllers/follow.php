<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	// -- Class Name : Follow
	// -- Purpose : 
	// -- Created On : 
	class Follow extends CI_Controller {
		public

		// -- Function Name : __construct
		// -- Params : 
		// -- Purpose : 
		function __construct(){
			parent::__construct();
			$this->load->model('model_follow');
		}

		public

		// -- Function Name : addLink
		// -- Params : 
		// -- Purpose : 
		function addLink(){

		$to   = $this->input->post('to');
        $from = $this->input->post('from');

        $this->model_follow->follow($to,$from);
			
		}

		public

		// -- Function Name : remove
		// -- Params : 
		// -- Purpose : 
		function remove(){

		 $target = strtolower($this->input->post('target'));
		 $this->model_follow->unfollow($target);	

		}

	}