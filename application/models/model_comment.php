<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_comment extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

public function insertCom($id,$body){

        $date = date('Y/m/d H:i:s');

        $this->db->set('post_id',$id);
        $this->db->set('added_by', $this->session->userdata('username'));
        $this->db->set('date_added',$date);
        $this->db->set('body',$body);
        $this->db->insert('comment');

        $get = $this->db->get_where('post',array('id' => $id ))->result();
        foreach($get as $owner){
          
        $this->db->set('owner',$owner->added_by);
        $this->db->set('post_id',$id);
        $this->db->set('type','comment');
        $this->db->set('from_who',$this->session->userdata('username'));
        $this->db->insert('notification');

        }

       

  }

 public function updateCom($id,$body){

        $date = date('Y-m-d H:i:s'); 

        $this->db->where('id',$id);
        $this->db->set('added_by', $this->session->userdata('username'));
        $this->db->set('date_added',$date);
        $this->db->set('body',$body);
        $this->db->update('comment');

  }


  public function deleteCom($id){

  		 $this->db->where('id',$id);
  		 $this->db->delete('comment');

  }



}