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


		function upload_photo(){
			$status = "";
			$msg = "";
			$file_element_name = 'userfile';
			
			if ($status != "error"){
				$config['upload_path'] = './profile_photo/';
				$config['allowed_types'] = 'gif|jpg|png|';
				$config['max_size'] = 20480;
				$config['encrypt_name'] = FALSE;
				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload($file_element_name))  {
					$status = 'error';
					$msg = $this->upload->display_errors('', '');

				} else  {

					$data = $this->upload->data();
					$image_path = $data['file_name'];
					$date_added = date('Y/m/d H:i:s');

					$this->db->set('change_photo',$date_added);
					$this->db->set('photo',$image_path);
					$this->db->where('username',$this->session->userdata('username'));
					$this->db->update('user');


					$this->db->set('date_added',$date_added);
					$this->db->set('noti_body','Change profile picture');
					$this->db->set('added_by',$this->session->userdata('username'));
					$this->db->set('profile_picture',$image_path);
					$this->db->set('noti_type','profile_photo');
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


		function upload_cover(){
			$status = "";
			$msg = "";
			$file_element_name = 'userfile';
			
			if ($status != "error"){
				$config['upload_path'] = './cover/';
				$config['allowed_types'] = 'gif|jpg|png|';
				$config['max_size'] = 20480;
				$config['encrypt_name'] = FALSE;
				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload($file_element_name))  {
					$status = 'error';
					$msg = $this->upload->display_errors('', '');

				} else  {

					$data = $this->upload->data();
					$image_path = $data['file_name'];
					$date_added = date('Y/m/d H:i:s');

					$this->db->set('change_cover',$date_added);
					$this->db->set('cover',$image_path);
					$this->db->where('username',$this->session->userdata('username'));
					$this->db->update('user');


					$this->db->set('date_added',$date_added);
					$this->db->set('noti_body','Change cover photo');
					$this->db->set('added_by',$this->session->userdata('username'));
					$this->db->set('cover_photo',$image_path);
					$this->db->set('noti_type','cover_photo');
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