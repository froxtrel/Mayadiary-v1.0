<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_profile extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

 public function getData($user){

          $result = $this->db->get_where('user',array('username' => $user ))->result();

          if(!empty($result)){

          return $result;

          }else{

          return '404';

    	  }

    } 

  public function getPost($id){

  		$this->db->where('id',$id);
  		return $this->db->get('post')->result();

  }

   public function getPosts($id){

      $this->db->where('uid',$id);
      return $this->db->get('post')->result();

  }
      
}