<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_post extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

 public function insertPost($body,$from,$to,$mood,$feel,$music,$video){

 		  $date = date('Y-m-d H:i:s'); 

          $this->db->set('music',$music);
          $this->db->set('video',$video);
          $this->db->set('mood',$mood);
          $this->db->set('feel',$feel);
          $this->db->set('body',$body);
          $this->db->set('added_by',$from);
          $this->db->set('user_posted_to',$to);
          $this->db->set('date_added',$date);
          $this->db->insert('post');       
    } 

  public function getAllPost(){

  		 $post =  $this->db->get('post')->result();
  		 return $post;

   }

   public function delPost($id){

      $this->db->where('id',$id);
      $this->db->delete('post');

   }

   public function upPost($id,$body){

      $date = date('Y-m-d H:i:s'); 

          $this->db->set('body',$body);
          $this->db->set('date_added',$date);
          $this->db->where('id',$id);
          $this->db->update('post');   

   }

   public function insertShare($id,$body){

          $date = date('Y-m-d H:i:s'); 
          $from = $this->session->userdata('username');

          $this->db->set('body',$body);
          $this->db->set('added_by',$from);
          $this->db->set('shared_id',$id);
          $this->db->set('date_added',$date);
          $this->db->insert('post');  


   }
      
}