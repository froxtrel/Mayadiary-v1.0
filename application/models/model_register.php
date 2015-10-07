<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_register extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

 public function insertUser(){

        $email    = $this->input->post('r_email');
        $password = md5($this->input->post('r_pass'));
        $username = $this->input->post('r_user');
        $birthday = $this->input->post('r_date');
        $date     = date('Y-m-d H:i:s');

        $data = array(

        'email'        => strtolower($email) ,
        'username'     => strtolower($username) ,
        'password'     => strtolower($password) ,
        'birthday'     => strtolower($birthday) ,
        'registerdate' => strtolower($date)

        );

        $this->db->insert('user', $data); 

   }
    
   
}