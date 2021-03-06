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
					$uid  = rand(0,100000000);

					$this->db->set('uid',$uid);
					$this->db->set('date_added',$date_added);
					$this->db->set('body',$_POST['title']);
					$this->db->set('mood',$_POST['mood']);
					$this->db->set('feel',$_POST['feel']);
					$this->db->set('user_posted_to',$_POST['receiver']);
					$this->db->set('added_by',$this->session->userdata('username'));
					$this->db->set('photo',$image_path);

					function gethashtags($text){
		            //Match the hashtags
		            preg_match_all('/(^|[^a-z0-9_])#([a-z0-9_]+)/i', $text, $matchedHashtags);
		            $hashtag = '';
		            // For each hashtag, strip all characters but alpha numeric
		            if(!empty($matchedHashtags[0])) {
		                 foreach($matchedHashtags[0] as $match) {
		                     $hashtag .= preg_replace("/[^a-z0-9]+/i", "", $match).',';
		                 }
		             }
		                //to remove last comma in a string
		             return rtrim($hashtag, ',');
		             }

         			$this->db->set('tag', gethashtags($_POST['title']));

         			 function getmention($text){
		              //Match the hashtags
		             preg_match_all('/(^|[^a-z0-9_])@([a-z0-9_]+)/i', $text, $matchedHashtags);
		             $hashtag = '';
		             // For each hashtag, strip all characters but alpha numeric
		             if(!empty($matchedHashtags[0])) {
		                  foreach($matchedHashtags[0] as $match) {
		                      $hashtag .= preg_replace("/[^a-z0-9]+/i", "", $match).',';
		                }
		            }
		                //to remove last comma in a string
		            return rtrim($hashtag, ',');
		            }

          			$this->db->set('mention', getmention($_POST['title'])); 

					$this->db->insert('post');

					$this->db->set('owner',$this->session->userdata('username'));
		            $this->db->set('post_id',$uid);
		            $this->db->set('type','photo');
		            $this->db->set('from_who',$this->session->userdata('username'));
		            $this->db->insert('notification');

		            $this->pushMention($uid);

					
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


	  public function pushMention($uid){

      $this->db->select('mention');
      $this->db->where('uid',$uid);
      $mention = $this->db->get('post')->result();

      foreach($mention as $men){

      $list = explode(",",$men->mention); 

      }

      foreach($list as $user){

        $this->db->where('username',$user);
        $result = $this->db->get('user')->num_rows();

        if($result > 0 ){

         $this->db->select('added_by');
         $this->db->where('uid',$uid);
         $owner = $this->db->get('post')->result(); 
         foreach($owner as $sender){

         }

         $this->db->set('owner',$user);
         $this->db->set('post_id',$uid);
         $this->db->set('type','mention');

         if($this->session->userdata('username') == $user){

         $this->db->set('noti_to','none');

         }else{

         $this->db->set('noti_to',$user);  

         }

         $this->db->set('from_who',$sender->added_by);
         $this->db->insert('notification');

        }else{

          // do nothing

        }

      }

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
					$uid  = rand(0,100000000);

					$this->db->set('change_photo',$date_added);
					$this->db->set('photo',$image_path);
					$this->db->where('username',$this->session->userdata('username'));
					$this->db->update('user');

					$this->db->set('uid',$uid);
					$this->db->set('date_added',$date_added);
					$this->db->set('noti_body','Change profile picture');
					$this->db->set('added_by',$this->session->userdata('username'));
					$this->db->set('profile_picture',$image_path);
					$this->db->set('noti_type','profile_photo');
					$this->db->insert('post');

					$this->db->set('owner',$this->session->userdata('username'));
		            $this->db->set('post_id',$uid);
		            $this->db->set('type','profile_photo');
		            $this->db->set('from_who',$this->session->userdata('username'));
		            $this->db->insert('notification');

					
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
					$uid  = rand(0,100000000);

					$this->db->set('change_cover',$date_added);
					$this->db->set('cover',$image_path);
					$this->db->where('username',$this->session->userdata('username'));
					$this->db->update('user');

					$this->db->set('uid',$uid);
					$this->db->set('date_added',$date_added);
					$this->db->set('noti_body','Change cover photo');
					$this->db->set('added_by',$this->session->userdata('username'));
					$this->db->set('cover_photo',$image_path);
					$this->db->set('noti_type','cover_photo');
					$this->db->insert('post');

					$this->db->set('owner',$this->session->userdata('username'));
		            $this->db->set('post_id',$uid);
		            $this->db->set('type','change_cover');
		            $this->db->set('from_who',$this->session->userdata('username'));
		            $this->db->insert('notification');

					
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


	public function upload_bg(){
			$status = "";
			$msg = "";
			$file_element_name = 'userfile';
			
			if ($status != "error"){

				$config['upload_path'] = './themes/';
				$config['allowed_types'] = 'gif|jpg|png|';
				$config['max_size'] = 20480;
				$config['encrypt_name'] = FALSE;
				$this->load->library('upload', $config);

				
				if (!$this->upload->do_upload($file_element_name))  {

					echo  $status = 'error';
					

				 }  else   {

					$data = $this->upload->data();
					$image= $data['file_name'];
					$image_path = base_url().'themes/'.$image;

					$this->db->set('theme_path',$image_path);
					$this->db->where('username',$this->session->userdata('username'));
					$this->db->update('user');

					echo $image_path;

					

				}

				
			}

			
		}

		public function upload_com(){
			$status = "";
			$msg = "";
			$file_element_name = 'userfile';
			
			if ($status != "error"){

				$config['upload_path'] = './com_photo/';
				$config['allowed_types'] = 'gif|jpg|png|';
				$config['max_size'] = 20480;
				$config['encrypt_name'] = FALSE;
				$this->load->library('upload', $config);

				
				if (!$this->upload->do_upload($file_element_name))  {

					echo  $status = 'error';
					

				 }  else   {

					$data = $this->upload->data();
					$image= $data['file_name'];
					$image_path = base_url().'com_photo/'.$image;

					// $this->db->set('theme_path',$image_path);
					// $this->db->where('username',$this->session->userdata('username'));
					// $this->db->update('user');

					echo $image_path;

					

				}

				
			}

			
		}

}