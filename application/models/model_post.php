<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_post extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

 public function insertPost($body,$from,$to,$mood,$feel,$music,$video,$map,$link,$type){

 		      $date = date('Y/m/d H:i:s'); 
          $uid  = rand(0,100000000);

          $this->db->set('uid',$uid);
          $this->db->set('type',$type);
          $this->db->set('map',$map);
          $this->db->set('link',$link);
          $this->db->set('music',$music);
          $this->db->set('video',$video);
          $this->db->set('mood',$mood);
          $this->db->set('feel',$feel);
          $this->db->set('body',$body);
          $this->db->set('added_by',$from);
          $this->db->set('user_posted_to',$to);
          $this->db->set('date_added',$date);
          $this->db->insert('post');  

          if(!empty($music)){

          $post_type = 'music';

          }else if(!empty($video)){
         
          $post_type = 'video';

          }else if(!empty($link)){

          $post_type = 'link'; 

          }else{

          $post_type = 'post';

          }
           
          $this->db->set('owner',$to);
          $this->db->set('post_id',$uid);
          $this->db->set('type',$post_type);
          $this->db->set('from_who',$from);
          $this->db->insert('notification');
          
    } 

  public function getAllPost(){

  		 $post =  $this->db->get('post')->result();
  		 return $post;

   }

   public function delPost($id){

      $this->db->set('status','off');
      $this->db->where('id',$id);
      $this->db->update('post');

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

          $get = $this->db->get_where('post',array('id' => $id ))->result();
          foreach($get as $owner){
            
          $this->db->set('owner',$owner->added_by);
          $this->db->set('post_id',$id);
          $this->db->set('type','share');
          $this->db->set('from_who',$this->session->userdata('username'));
          $this->db->insert('notification');

          }


   }
      
}