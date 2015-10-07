<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_post extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

 public function insertPost($body,$from,$to){

 		  $date = date('Y-m-d H:i:s'); 

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
      
}