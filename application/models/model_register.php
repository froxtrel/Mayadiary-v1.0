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

        $this->db->set('body',"Hi everyone im new here..how are you?");
        $this->db->set('added_by',$username);
        $this->db->set('user_posted_to',$username);
        $this->db->set('date_added',$date);
        $this->db->insert('post');      

        $data = array(

        'email'        => strtolower($email) ,
        'username'     => strtolower($username) ,
        'password'     => strtolower($password) ,
        'birthday'     => strtolower($birthday) ,
        'registerdate' => strtolower($date),
        'photo'        => 'default.png',
        'cover'        => 'default.png',
        'cover'        => 'default.png',
        'bg_position'  => 'center center',
        'bg_attach'    =>  'fixed',
        'bg_repeat'    => 'no-repeat',
        'theme_path'   => 'http://localhost/Mayadiary-v1.0/themes/default.png',
        'websites'     =>  'www.yousite.com',
        'bio'          =>  'Say something about you here'
 
        );

        $this->db->insert('user', $data); 

   }
    
   
}