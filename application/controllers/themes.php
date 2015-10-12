<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	// -- Class Name : Profile
	// -- Purpose : 
	// -- Created On : 
	class Themes extends CI_Controller {
		public

		// -- Function Name : __construct
		// -- Params : 
		// -- Purpose : 
		function __construct(){
			parent::__construct();
		}

		public

		// -- Function Name : profile
		// -- Params : $user="no user"
		// -- Purpose : 
		function changeThemes(){

			$themes = $this->input->post('bg');

			$this->db->set('theme_path',$themes);
			$this->db->where('username',$this->session->userdata('username'));
			$result = $this->db->update('user');

			if($result){

				echo 'success';

			}else{

				echo 'Failed';
			}

		}

		public function changeCustom(){

			$bg_c = $this->input->post('bg_color');
			$bg_p = $this->input->post('bg_position');
			$bg_a = $this->input->post('bg_attach');
			$bg_r = $this->input->post('bg_repeat');
			$l_c = $this->input->post('link_color');
			$f_c = $this->input->post('page_color');



			$this->db->set('bg_color',$bg_c);
			$this->db->set('bg_position',$bg_p);
			$this->db->set('bg_attach',$bg_a);
			$this->db->set('bg_repeat',$bg_r);
			$this->db->set('link_color',$l_c);
			$this->db->set('page_color',$f_c);

			$this->db->where('username',$this->session->userdata('username'));
			$result = $this->db->update('user');

			if($result){

				echo 'success';

			}else{

				echo 'Failed';
			}
		}

	}