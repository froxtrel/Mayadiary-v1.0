<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_like extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

  public function insertLike($id){

  		$check = $this->db->get_where('likes',array('post_id' => $id,'likers' => $this->session->userdata('username'),'value' => '1'))->num_rows();

  		if($check > 0){

  		$this->db->where('post_id', $id);
  		$this->db->where('likers', $this->session->userdata('username'));
        $this->db->delete('likes'); 	


  		}else{

  		$this->db->set('value','1');
  		$this->db->set('post_id',$id);
  		$this->db->set('likers',$this->session->userdata('username'));
  		$this->db->insert('likes');

        $get = $this->db->get_where('post',array('id' => $id ))->result();
        foreach($get as $owner){
          
        $this->db->set('owner',$owner->added_by);
        $this->db->set('post_id',$id);
        $this->db->set('type','likes');

        if($this->session->userdata('username') == $owner->added_by){

        $this->db->set('noti_to','none');

        }else{

        $this->db->set('noti_to',$owner->added_by);  

        }

        $this->db->set('from_who',$this->session->userdata('username'));
        $this->db->insert('notification');

        }

  		} 		

  }
      
}