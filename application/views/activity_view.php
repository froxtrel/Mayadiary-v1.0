
<?php 
    
    if($this->session->userdata('logged_in') != 1 ){

       redirect('welcome/index');
    }
?>

<?php foreach($user as $row){

    }

    $path = trim($row->theme_path, '"');
;?>

<style type="text/css">
  
body {

    background-image:url('<?php echo $path;?>');  
    background-attachment: <?php echo $row->bg_attach;?>;
    background-color: <?php echo $row->bg_color;?>;
    background-repeat: <?php echo $row->bg_repeat;?>;
    background-position: <?php echo $row->bg_position;?>;
    color:<?php echo $row->page_color;?>;
    background-size: cover;

}

a{
  color: <?php echo $row->link_color;?>;
}

#nav_bar{

    background-color:#2980b9;

}

</style>

<body>

<div id="wrapper">
  <div class="overlay"></div>
  
  <!-- Sidebar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
      <li class="sidebar-brand"> <a href="#"><img src="<?php echo base_url();?>public/img/logo.png" width="40" height="40" class="img-circle" style="border:2px solid #fff;"> <span class="maya">MayaDiary</span></a> </li>
      <li> <a href="<?php echo base_url();?>home/goHome" class="style"><i class="fa fa-fw fa-home">     </i> Home  </a> </li>
      <li> <a href="<?php echo base_url();?>profile/userProfile/<?php echo $this->session->userdata('username');?>" class="style"><i class="fa fa-fw fa-user"></i> Profile </a> </li>
      <li> <a href="<?php echo base_url();?>profile/photoshow/<?php echo $this->session->userdata('username');?>" class="style"><i class="fa fa-fw fa-picture-o">     </i> Photos  </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-video-camera">   </i> Video   </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-music">        </i> Music   </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-pencil-square-o">  </i> Blogs   </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-bullhorn">     </i> Forums  </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-users">      </i> Groups  </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-gamepad">      </i> Games   </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-calendar">     </i> Events  </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-wrench">         </i> Settings  </a> </li>
      <li> <a href="<?php echo base_url();?>login/logout" class="style"><i class="fa fa-fw fa-sign-out"></i> Logout</a> </li>
    </ul>
  </nav>
  <!-- /#sidebar-wrapper --> 
  
  <!-- Page Content -->
  <div id="page-content-wrapper">

  <span style="position:fixed;color:#fff;margin-left:15px;font-size:20px;">

  <button id="noti_b"><i class="fa fa-fw fa-bell"><span class="badge">0</span></i></button>

  </span>

  <span style="position:fixed;color:#fff;margin-left:15px;font-size:20px;margin-top:50px;">

  <button id="chat_b"><i class="fa fa-fw fa-comment"><span class="badge">0</span></i></button>

  </span>

   <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas"><span class="hamb-top"></span> <span class="hamb-middle"></span> <span class="hamb-bottom"></span></button>
    <div class="container" style="margin-top:-30px;">
      <div class="row">
      <div class="col-md-3">
        
         <?php 

          $this->db->select('photo');
          $this->db->where('username',$this->session->userdata('username'));
          $you_p = $this->db->get('user')->result();
          foreach($you_p as $youp){}

          ?>
          <div class="jumbotron" id="part_2">

                <div class="jumbotron" id="profile_cover">
                    <img src="<?php echo base_url();?>cover/<?php echo $row->cover;?>" width="100%" height="110" id="main_cover">
                </div>

                <div class="jumbotron" id="profile_view">
                    <img src="<?php echo base_url();?>profile_photo/<?php echo $youp->photo;?>" id="set_photo" width="74" height="74" class="img-rounded">
                    <center class="style"><?php echo ucfirst($row->username);?></center>
                </div>

            </div>    

            <div class="jumbotron" id="on_off">
              <div class="jumbotron" id="zoom_head"><center><small class="style">Zoom Effect</small></center></div>
              <div class="jumbotron" id="zoom_body">
                <div class="row">
                  <div class="col-md-6">
                    <button class="btn btn-success btn-sm" id="zoom" style="width:100%;">Active</button>
                  </div>
                  <div class="col-md-6">
                     <button class="btn btn-primary btn-sm toggle" data-active="true" style="width:100%;">Switch off</button>
                  </div>
                </div>
              </div>             
            </div>

            <div class="jumbotron" id="double">
              <div class="jumbotron" id="split_head"><center><small class="style">Split Image</small></center></div>
                 <div class="jumbotron" id="split_body">

                    <button class="btn btn-success btn-sm" id="split" style="width:100%;">Active</button>                          
                
              </div>             
            </div>

             <div class="jumbotron" id="normal_p">
              <div class="jumbotron" id="normal_head"><center><small class="style">Reset All</small></center></div>
                 <div class="jumbotron" id="normal_body">

                    <button class="btn btn-success btn-sm" id="default" style="width:100%;">Default</button>                          
                
              </div>             
            </div>
          
      </div>


       <div class="col-md-7">

                
              <?php

              function humanTiming ($time){

              $time = time() - $time; // to get the time since that moment
              $time = ($time<1)? 1 : $time;
              $tokens = array (
              31536000 => 'year',
              2592000 => 'month',
              604800 => 'week',
              86400 => 'day',
              3600 => 'hour',
              60 => 'minute',
              1 => 'second'
              );

              foreach ($tokens as $unit => $text) {
              if ($time < $unit) continue;
              $numberOfUnits = floor($time / $unit);
              return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
              }

              }

              ?>

         
               <div class="jumbotron" id="post_feed">
           
                <!-- post -->
                <?php

                foreach ($post as $feed){ 

                $like = $this->db->get_where('likes',array('post_id' => $feed->id,'value' => '1' ))->result_array();
               
                ?>

                <div id="<?php echo $feed->id;?>">

                <div class="jumbotron" id="feed_head">       

                <table width="100%" border="0">
                  <tr>
                    <td rowspan="2" width="15%">

                    <?php

                      $this->db->select('photo');
                      $this->db->where('username',$feed->added_by);
                      $add_p = $this->db->get('user')->result();
                      foreach($add_p as $addp){}  

                    ?>
                     <img src="<?php echo base_url();?>profile_photo/<?php echo $addp->photo;?>" width="48px" height="48px" class="img-circle" id="mini_photo"> 
                     </td>

                     <?php if (!empty($feed->shared_id)){ ?>

                     <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($feed->added_by);?>"><?php echo ucfirst($feed->added_by);?></a></b> ↫ <small>Shared a post</small> 


                     <?php } else if (!empty($feed->profile_picture)){ ?>


                    <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($feed->added_by);?>"><?php echo ucfirst($feed->added_by);?></a> </b> ↫ <small>Change profile photo</small> 


                     <?php } else if (!empty($feed->cover_photo)){ ?>


                     <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($feed->added_by);?>"><?php echo ucfirst($feed->added_by);?> </a></b> ↫ <small>Change cover photo</small>  


                     <?php } else if (!empty($feed->user_posted_to AND $feed->user_posted_to!= $this->session->userdata('username'))){ ?>


                     <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($feed->added_by);?>"><?php echo ucfirst($feed->added_by);?></a> </b> ↪ <small>
                     <b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($feed->user_posted_to);?>"><?php echo $feed->user_posted_to;?></a></b></small>  


                     <?php }else{ ?>

                    <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($feed->added_by);?>"><?php echo ucfirst($feed->added_by);?></a></b> 

                      <?php

                      if($feed->type =='onlyme'){ ?>

                        ↪<small> <span class="glyphicon glyphicon-lock"></span> Only me </small>

                      <?php }else if($feed->type =='public'){ ?>

                        ↪<small> <span class="glyphicon glyphicon-globe"></span> Public </small>

                      <?php }else if($feed->type =='friends'){ ?>

                        ↪<small> <span class="glyphicon glyphicon-user"></span> Friends </small>

                      <?php }else{ ?>
                        
                        ↪<small> <span class="glyphicon glyphicon-cog"></span> Custom </small>

                          <?php } };?>

                    <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
                    <button style="float:right;" id="option"><span class="glyphicon glyphicon-menu-down"></span></button>

                    <div class="extra_m" id="extra_m<?php echo $feed->id;?>">
                    <table width="100%" border="0">
                      <tr>
                        <td height="10px;"></td>
                      </tr>
                      <tr>
                        <td><button style="width:100%;border:none;border-radius:0px;" class="btn btn-default btn-xs">Report post</button></td>
                      </tr>
                      <tr>
                        <td height="10px;"></td>
                      </tr>
                      <tr>
                        <td><button style="width:100%;border:none;border-radius:0px;" class="btn btn-default btn-xs"> View post</button></td>
                      </tr>
                      <tr>
                        <td height="10px;"></td>
                      </tr>
                      <tr>
                        <td>
                        <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" > 
                        <button style="width:100%;border:none;border-radius:0px;" class="btn btn-default btn-xs" id="edit_post_button"> Edit post</button>
                        </td>
                      </tr>
                      <tr>
                        <td height="10px;"></td>
                      </tr>
                      <tr>
                        <td>
                        <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
                        <button style="width:100%;border:none;border-radius:0px;" class="btn btn-default btn-xs" id="del_p"> Remove post</button></td>
                      </tr>
                      <tr>
                        <td height="10px;"></td>
                      </tr>
                      <tr>
                        <td><button style="width:100%;border:none;border-radius:0px;" class="btn btn-default btn-xs"> Boost this post</button></td>
                      </tr>
                      <tr>
                        <td height="10px;"></td>
                      </tr>
                      <tr>
                        <td> <button style="width:100%;border:none;border-radius:0px;" class="btn btn-default btn-xs">Off Notification</button></td>
                      </tr>
                      <tr>
                        <td height="15px;"></td>
                      </tr>
                    </table>
                    <!-- <hr> -->

                    </div>


                    </td>
                  </tr>
                  <tr>
                    <td><small><?php echo humanTiming(strtotime($feed->date_added));?> ago</small></td>
                  </tr>
                </table>
                </div>

                <div class="jumbotron" id="feed_body">

                 <?php echo $feed->body;?>

                 <?php if(!empty($feed->mood) && !empty($feed->feel)){ ?>

                 </p>
                ↪ <img src="<?php echo $feed->mood;?>" width="25" height="25" id="img44"> <small> Feeling <?php echo $feed->feel;?></small>

                 <?php } ?>

                  <?php

               if(!empty($feed->cover_photo)){ ?>
      
               <img class="img-responsive" src="<?php echo base_url();?>cover/<?php echo $feed->cover_photo;?>" width="100%" height="auto">
             
               <?php } ?>


                 <?php

               if(!empty($feed->profile_picture)){ ?>
      
               <img class="img-responsive" src="<?php echo base_url();?>profile_photo/<?php echo $feed->profile_picture;?>" width="80%" height="auto">
             
               <?php } ?> 


                 <?php

               if(!empty($feed->photo)){ ?>
      
               <img class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $feed->photo;?>" width="100%" height="300px;" id="normal">
             
               <?php } ?>          

                 <?php if(!empty($feed->link)){?>

               <br>

               <center><a href="http://<?php echo $feed->link;?>"><h5><?php echo $feed->link;?></h5></a></center>

               <?php } ?>

                  <?php

                if(!empty($feed->map)){ ?>

                <img class="img-responsive" src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $feed->map;?>&amp;zoom=15&amp;size=700x300&amp;
                maptype=roadmap&amp;markers=color:red%7C<?php echo $feed->map;?>&amp;sensor=true&amp;scale=2&amp;visual_refresh=true" width="100%" height="300"
                >
                <?php } ?>

                   <?php

                       if(!empty($feed->video)){ ?>

                       <iframe class="embed-responsive-item" width="100%" height="auto" src="https://www.youtube.com/embed/<?php echo $feed->video;?>" frameborder="1" allowfullscreen></iframe> 

                       <?php } ?>

                     <?php if(!empty($feed->music)){ ?>

                     <iframe class="embed-responsive-item" width="100%" height="auto" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $feed->music;?>"></iframe>

                     <?php } ?>


                  <div id="editpost<?php echo $feed->id;?>" style="display:none;">
                  <textarea style="width:100%;" id="edit_post"><?php echo $feed->body;?></textarea>

                  <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id">
                  <button class="btn btn-success btn-xs" id="post_e">Done editing</button>

                  <button class="btn btn-danger btn-xs" id="cancel_pe">Cancel</button>
                  </div>
                  </p>
                  <?php if (!empty($feed->shared_id)){

                  $shared = $this->db->get_where('post',array('id' => $feed->shared_id))->result();
                  foreach($shared as $share){
                    }?>

                  <div class="jumbotron" id="shared_post">
                    <table width="100%" border="0">
                      <tr>
                        <td width="10%">

                        <?php

                          $this->db->select('photo');
                          $this->db->where('username',$share->added_by);
                          $p_photo = $this->db->get('user')->result();
                          foreach($p_photo as $p_photo){

                          }
                        ?>

                        <img src="<?php echo base_url();?>profile_photo/<?php echo $p_photo->photo;?>" width="35px" height="35px" class="img-circle">

                        </td>
                        <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($share->added_by);?>"><?php echo ucfirst($share->added_by);?></a></b>
                        <small> Originally posted this</small></td>
                      </tr>
                      <tr>
                        <td width="10%"></td>
                        <td>

                        <?php echo $share->body;?>

                        <?php

                      if(!empty($share->cover_photo)){ ?>

                   ↪  <small>Change cover photo</small>

                      <img class="img-responsive" src="<?php echo base_url();?>cover/<?php echo $share->cover_photo;?>" width="80%" height="auto">
                     
                      <?php } ?>  

                        <?php

                      if(!empty($share->profile_picture)){ ?>

                   ↪  <small>Change profile photo</small>

                      <img class="img-responsive" src="<?php echo base_url();?>profile_photo/<?php echo $share->profile_picture;?>" width="80%" height="auto">
                     
                      <?php } ?>  

                        <?php if(!empty($share->mood) && !empty($share->feel)){ ?>

                        </p>
                        ↪ <img class="img-responsive" src="<?php echo $share->mood;?>" width="25" height="25" id="img44"> <small> Feeling <?php echo $share->feel;?></small>

                        <?php } ?>

                        <?php

                      if(!empty($share->photo)){ ?>
              
                      <img class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $share->photo;?>" width="90%" height="300px;">
                     
                      <?php } ?>  

                        <?php if(!empty($share->link)){?>

                      <br>

                      <center><a href="http://<?php echo $share->link;?>"><h5><?php echo $share->link;?></h5></a></center>

                      <?php } ?>

                        <?php

                        if(!empty($share->map)){ ?>

                        <img class="img-responsive" src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $share->map;?>&amp;zoom=15&amp;size=700x300&amp;
                       maptype=roadmap&amp;markers=color:red%7C<?php echo $share->map;?>&amp;sensor=true&amp;scale=2&amp;visual_refresh=true" width="90%" height="300"
                        >
                        <?php } ?>


                        <?php

                                    if(!empty($share->video)){ ?>

                                    <iframe class="embed-responsive-item" width="100%" height="auto" src="https://www.youtube.com/embed/<?php echo $share->video;?>" frameborder="1" allowfullscreen></iframe> 

                                    <?php } ?>

                        <?php if(!empty($share->music)){ ?>

                                  <iframe class="embed-responsive-item" width="100%" height="auto" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $share->music;?>"></iframe>

                                  <?php } ?>

                        </td>
                      </tr>
                    </table>

                  </div>
                    

                  <?php } ?>

                </div>

                <div class="jumbotron" id="feed_like">
                <table width="100%" border="0">
                  <tr>
                    <td width="10%">
                    <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
                    <button id="sharez"><span class="glyphicon glyphicon-retweet"></span> Share</button>
                    </td>
                    <td width="10%">
                    <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
                    <button id="like"><span class="glyphicon glyphicon-heart"></span> Like</button>
                    </td>
                    <td>
                    <!-- <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
                    <button id="noti">off notification</button></td> -->
                    <td width="30%"></td>
                    <td width="10%">
                    <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id">
                    <button id="whol">↯ Like <?php echo count($like) ;?></button>
                    </td>
                    <td width="10%">

                    <?php

                      $cshare = $this->db->get_where('post',array('shared_id' => $feed->id ))->result();

                    ?>

                    <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
                    <button id="whos">↫ Share <?php echo count($cshare);?></button>
                    </td>
                  </tr>
             
                </table>
                  
                </div>

                 <div class="jumbotron" id="feed_comment">
              
                 <table width="100%" border="0">

                 <?php

                  $this->db->order_by('id','asc');
                  $com =  $this->db->get_where('comment',array('post_id' => $feed->id))->result();

                
                  foreach ($com as $comment){  ?>

                  <tr>
                  <td rowspan="2" width="6%">

                  <?php

                      $this->db->select('photo');
                      $this->db->where('username',$comment->added_by);
                      $com_p = $this->db->get('user')->result();
                      foreach($com_p as $comp){}  

                  ?>

                  <img src="<?php echo base_url();?>profile_photo/<?php echo $comp->photo;?>" width="30px" height="30px" class="img-circle">

                  </td>
                  <td>
                  <b id="mini_name"><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($comment->added_by);?>"><?php echo ucfirst($comment->added_by);?></a></b>

                  <input type="hidden" value="<?php echo $comment->id;?>" id="comm_id">
                  <button id="delete_com">X </button>

                  </td>
                  </tr>
                  <tr>
                  <td>

                  <span id="origin<?php echo $comment->id;?>" class="origin"><?php echo $comment->body;?></span>  

                  <div id="edit_area<?php echo $comment->id;?>" style="display:none;">
                  <textarea style="width:100%;" id="edit_comment"><?php echo $comment->body;?></textarea>

                  <input type="hidden" value="<?php echo $comment->id;?>" id="comm_id">
                  <button class="btn btn-success btn-xs" id="done_e">Done editing</button>

                  <button class="btn btn-danger btn-xs" id="cancel_e">Cancel</button>
                  </div>
             
                 
                  </td>
                  </tr>
                    <tr>
                    <td width="6%"></td>
                  <td>
                  <span class="glyphicon glyphicon-time" style="font-size:10px;"></span><small id="com_mini"> About <?php echo humanTiming(strtotime($comment->date_added));?> ago</small>

                  <?php

                    $com_like  =  $this->db->get_where('comment_likes',array('comm_id' => $comment->id))->result();
                
                  ?>

                  <input type="hidden" value="<?php echo $comment->id;?>" id="comm_id">
                  <button id="like_c"><span class="glyphicon glyphicon-thumbs-up" ></span> Like <?php echo count($com_like) ;?></button>

                  <input type="hidden" value="<?php echo $comment->id;?>" id="comm_id">
                  <button id="edit_c"><span class="glyphicon glyphicon-pencil" ></span> edit </button>

                  </td>
                 </tr>             

                <?php }


                 ?>
                  
                    
                 </table>
                 </p>
                 <textarea rows="1" style="width:100%;" id="comment"></textarea>

                 <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
                 <button id="submit" class="btn btn-success">Reply</button>
                 <button id="cancel" class="btn btn-danger">Cancel</button>
                </div>
                <br>
                </div>
               
                <?php } ?>

                <!-- end -->
              
                </div>
          
        </div>
      </div>
    </div>
  </body>
</html>

    
<!-- CHAT PANEL -->

<section id="open_chat"><center>CHAT BOX</center></section>

<!-- END -->