<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_comment_like extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

 public function insertLike($id){

        $check = $this->db->get_where('comment_likes',array('comm_id' => $id,'likers' => $this->session->userdata('username'),'value' => '1'))->num_rows();

  		if($check > 0){

  		$this->db->where('comm_id', $id);
  		$this->db->where('likers', $this->session->userdata('username'));
        $this->db->delete('comment_likes'); 	


  		}else{

  		$this->db->set('value','1');
  		$this->db->set('comm_id',$id);
  		$this->db->set('likers',$this->session->userdata('username'));
  		$this->db->insert('comment_likes');

  		} 		

    } 
      
}