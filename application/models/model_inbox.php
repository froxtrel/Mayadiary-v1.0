<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_inbox extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

 public function insertInbox($to,$from,$body){

      $date = date('Y-m-d H:i:s'); 

      $this->db->set('user_to',$to);
      $this->db->set('user_from',$from);
      $this->db->set('body',$body);
      $this->db->set("date_added",$date);

      $this->db->insert('inbox');

 }
      
}