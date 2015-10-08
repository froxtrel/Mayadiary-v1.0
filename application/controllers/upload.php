<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// -- Class Name : Register
	// -- Purpose : 
	// -- Created On : 
	class Upload extends CI_Controller {
		public

		// -- Function Name : upload_file
		// -- Params : 
		// -- Purpose : 
		function upload_file(){
			$status = "";
			$msg = "";
			$file_element_name = 'userfile';
			
			if ($status != "error"){
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|';
				$config['max_size'] = 20480;
				$config['encrypt_name'] = FALSE;
				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload($file_element_name))  {
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
				} else   {
					$data = $this->upload->data();
					$image_path = $data['file_name'];
					$date_added = date('Y/m/d H:i:s');

					$this->db->set('date_added',$date_added);
					$this->db->set('body',$_POST['title']);
					$this->db->set('mood',$_POST['mood']);
					$this->db->set('feel',$_POST['feel']);
					$this->db->set('user_posted_to',$_POST['receiver']);
					$this->db->set('added_by',$this->session->userdata('username'));
					$this->db->set('photo',$image_path);
					$this->db->insert('post');
					
					if(file_exists($image_path))   {
						$status = "success";
						$msg = "File successfully uploaded";
					} else {
						$status = "error";
						$msg = "Something went wrong when saving the file, please try again.";
					}

				}

				@unlink($_FILES[$file_element_name]);
			}

			//echo json_encode(array('status' => $status, 'msg' => $msg));
		}

}