<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_profile extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

 public function getData($user){

          $result = $this->db->get_where('user',array('username' => $user ))->result();
          return $result;

    } 
      
}