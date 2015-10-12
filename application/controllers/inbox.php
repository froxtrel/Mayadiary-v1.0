<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inbox extends CI_Controller {


public function __construct(){
        
        parent::__construct();
        $this->load->model('model_inbox');
    }

public function addInbox(){

    $to   = $this->input->post('to');
    $from = $this->input->post('from');
    $body = $this->input->post('body');

    $this->model_inbox->insertInbox($to,$from,$body);

  }


}