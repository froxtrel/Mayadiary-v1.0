<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_follow extends CI_Model {
   

 public function __construct(){
        
        parent::__construct();
    }

  public function follow($to,$from){
     
      $date = date('Y/m/d H:i:s');

      $this->db->set('from_who',$from);
      $this->db->set('type','follow');
      $this->db->set('owner',$to);
      $this->db->set('date_added',$date);
      $this->db->insert('notification');


      $this->db->query("UPDATE user SET follower_array=CONCAT(follower_array,',$from') WHERE username ='$to'");
      $this->db->query("UPDATE user SET following_array=CONCAT(following_array,',$to') WHERE username ='$from'");

  }

  public function unfollow($target){

     
      $user = $this->session->userdata('username');
      $this->db->select('following_array');
      $quer = $this->db->get_where('user',array('username' => $user ));
      $arra = $quer->result_array();
      foreach ($arra as $key ){
        $data = $key['following_array'];
        $friend =  (explode(',', $data));
        for ($i = 0; $i < count($friend); ++$i) {
          $arr[$i] =  $friend[$i];
        }

      }

      
      if (in_array($target, $arr)){
        
      if (($key = array_search($target, $arr)) !== false) {
          unset($arr[$key]);
        }

        $n_friend =  implode(",",$arr);
        $data = array('following_array' => $n_friend);
        $this->db->where('username', $user);
        $this->db->update('user', $data);

        echo $n_target =  ucfirst($target);

      } else {
        echo "Match not found";
      }

      $this->db->select('follower_array');
      $remove = $this->db->get_where('user',array('username' => $target ));
      $r_array = $remove->result_array();
      foreach ($r_array as $key ){
        $data = $key['follower_array'];
        $r_friend =  (explode(',', $data));
        for ($i = 0; $i < count($r_friend); ++$i) {
          $r_arr[$i] =  $r_friend[$i];
        }

      }

      
      if (in_array($user,$r_arr)){
        
        if (($key = array_search($user, $r_arr)) !== false) {
          unset($r_arr[$key]);
        }

        $re_friend =  implode(",",$r_arr);
        $data = array('follower_array' => $re_friend);
        $this->db->where('username', $target);
        $this->db->update('user', $data);
        return true;
      } else {
        echo "Match not found";
      }

  }
      
}