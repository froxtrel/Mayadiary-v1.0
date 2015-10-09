<?php 
    
    if($this->session->userdata('logged_in') != 1 ){

       redirect('welcome/index');
    }
?>




<a href="<?php echo base_url();?>profile/userProfile/<?php echo $this->session->userdata('username');?>">Profile</a>