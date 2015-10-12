<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_info extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

  public function addInfo($user,$bio,$loc,$web,$fb,$go,$twit){

      $this->db->set('username',$user);
      $this->db->set('bio',$bio);
      $this->db->set('location',$loc);
      $this->db->set('websites',$web);
      $this->db->set('facebook',$fb);
      $this->db->set('google',$go);
      $this->db->set('twitter',$twit);
      $this->db->where('username',$this->session->userdata('username'));
      $this->db->update('user');
  	

  }

   public function upAccount($user,$email,$lang,$country,$video){

      $this->db->set('username',$user);
      $this->db->set('email',$email);
      $this->db->set('country',$country);
      $this->db->set('lang',$lang);
      $this->db->set('video_set',$video);
      $this->db->where('username',$this->session->userdata('username'));
      $this->db->update('user');
    

  }

  public function upPrivacy($wp,$wf,$wc,$wph,$wv,$wm,$wbd,$wt,$off){

      $this->db->set('w_profile',$wp);
      $this->db->set('w_follow',$wf);
      $this->db->set('w_contact',$wc);
      $this->db->set('w_photos',$wph);
      $this->db->set('w_video',$wv);
      $this->db->set('w_music',$wm);
      $this->db->set('w_birthday',$wbd);
      $this->db->set('w_timeline',$wt);
      $this->db->set('off_follow',$off);

      $this->db->where('username',$this->session->userdata('username'));
      $this->db->update('user');

  }

  public function upEmail($fol,$men,$sms,$com,$like){

      $this->db->set('follow_y',$fol);
      $this->db->set('mention_y',$men);
      $this->db->set('sms_n',$sms);
      $this->db->set('comment_y',$com);
      $this->db->set('like_y',$like);
         

      $this->db->where('username',$this->session->userdata('username'));
      $this->db->update('user');


  }

  public function upWeb($fol,$men,$sms,$com,$like,$share){

      $this->db->set('follow_s',$fol);
      $this->db->set('mention_s',$men);
      $this->db->set('sms_s',$sms);
      $this->db->set('comment_s',$com);
      $this->db->set('like_s',$like);
      $this->db->set('share_s',$share);    

      $this->db->where('username',$this->session->userdata('username'));
      $this->db->update('user');


  }
      
}