<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Changestate extends CI_Controller {


public function __construct(){
        
        parent::__construct();
        $this->clear_cache();
        $this->load->model('model_comment');
    }


public function myPhoto(){

    $this->session->set_userdata('photo','M');

}

public function allPhoto(){

    $this->session->set_userdata('photo','A');

}

public function allPost(){

    $this->session->set_userdata('post','A');

}

public function folPost(){

    $this->session->set_userdata('post','F');

}

public function musicPost(){

    $this->session->set_userdata('post','M');

}

public function photoPost(){

    $this->session->set_userdata('post','P');

}

public function videoPost(){

    $this->session->set_userdata('post','V');

}

public function normalPost(){

    $this->session->set_userdata('p_post','A');

}

public function likePost(){

    $this->session->set_userdata('p_post','L');

}

public function comId(){

    $id = $this->input->post('id');
    $this->session->set_userdata('com_id',$id);

}


	
public function clearNoti(){

    $this->db->where('noti_to',$this->session->userdata('username'));
    $this->db->set('open','yes');
    $this->db->update('notification');

}

public function clearSms(){

    $this->db->where('user_to',$this->session->userdata('username'));
    $this->db->set('status','yes');
    $this->db->update('inbox');

}
  

  public function clear_cache(){
  
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

}