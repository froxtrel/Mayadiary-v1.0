<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

 public function loginUser(){

        $email    = $this->input->post('l_email');
        $password = md5($this->input->post('l_pass'));
        
        $query = $this->db->get_where('user',array('email' => $email,'password' => $password ))->num_rows();

        if($query > 0 ) {

        $this->db->select('username');   
        $this->db->where('email',$email); 
        $user = $this->db->get('user')->result();

        foreach($user as $username){

        }

        $newdata = array(
                   'username'  => $username->username,
                   'email'     => $email,
                   'logged_in' => TRUE,
                   'limit'     =>  '10',
                   'photo'     =>  'A',
                   'post'      =>  'A',
                   'p_post'    =>  'A',
                   'com_id'    =>  ''

               );

        $this->session->set_userdata($newdata);

        $this->db->set('online',1);
        $this->db->where('email',$email);
        $this->db->update('user');
                
        return true;

        }

   }
    
   
}