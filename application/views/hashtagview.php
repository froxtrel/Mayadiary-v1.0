
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

    background-image:url('<?php echo base_url();?>themes/default.jpg');  
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

<div id="wrapper">
  <div class="overlay"></div>
  
  <!-- Sidebar -->
   <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
      <li class="sidebar-brand"> <a href="#"><img src="<?php echo base_url();?>public/img/logo.png" width="40" height="40" class="img-circle" style="border:2px solid #fff;"> <span class="maya">MayaDiary</span></a> </li>
      <li> <a href="<?php echo base_url();?>home/goHome" class="style"><i class="fa fa-fw fa-home">     </i> Home  </a> </li>
      <li> <a href="<?php echo base_url();?>profile/userProfile/<?php echo $this->session->userdata('username');?>" class="style"><i class="fa fa-fw fa-user"></i> <?php echo ucfirst($this->session->userdata('username'));?> </a> </li>
      <li> <a href="<?php echo base_url();?>profile/peopleshow/<?php echo $this->session->userdata('username');?>" class="style"><i class="fa fa-fw fa-users">        </i> People   </a> </li>
      <li> <a href="<?php echo base_url();?>profile/photoshow/<?php echo $this->session->userdata('username');?>" class="style"><i class="fa fa-fw fa-picture-o">     </i> Photos  </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-video-camera">   </i> Video   </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-music">        </i> Music   </a> </li>
      <li> <a href="<?php echo base_url();?>profile/profileDesign/<?php echo $this->session->userdata('username');?>" class="style"><i class="fa fa-fw fa-wrench">        </i> Settings  </a> </li>
      <li> <a href="<?php echo base_url();?>login/logout" class="style"><i class="fa fa-fw fa-sign-out"></i> Logout</a> </li>
    </ul>
  </nav>
  <!-- /#sidebar-wrapper --> 
  <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:rgba(255,255,255,0.3);border:none;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#"></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

         <li><a href=""  style="color:#1dcaff;" id="notis_v">

          <?php

            $this->db->where('open','no');
            $this->db->where('noti_to',$this->session->userdata('username'));
            $n_noti = $this->db->get('notification')->result();

           ?>

           <?php 

           if(!empty($n_noti)){ ?>

           <span class="badge" style="background-color:red;"><?php echo count($n_noti); ?></span>

           <?php }

           ?>

           Notifications <span class="glyphicon glyphicon glyphicon-bell"></span> </a></li>

            <li><a href=""  style="color:#1dcaff;" id="misij_v">

           <?php

            $this->db->where('status','on');
            $this->db->where('user_to',$this->session->userdata('username'));
            $n_msg = $this->db->get('inbox')->result();

           ?>
           <?php 

           if(!empty($n_msg)){ ?>

           <span class="badge" style="background-color:red;"><?php echo count($n_msg); ?></span>

           <?php }

           ?>
           Messages <span class="glyphicon glyphicon glyphicon-comment"></span> </a></li>

      </ul>
    </div>
  </div>
</nav>

<script type="text/javascript">

setInterval(function() {
      
$("#myNavbar").load(location.href + " #myNavbar");  

}, 5000);
  
</script>
  
  <!-- Page Content -->
  <div id="page-content-wrapper" style="margin-top:3px;">
   <button  style="margin-top:30px;" type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas"><span class="hamb-top"></span> <span class="hamb-middle"></span> <span class="hamb-bottom"></span></button>
    <div class="container" style="margin-top:0px;">
    <div class="row">
    <div class="jumbotron col-md-10" id="hashtag_banner"><center><h3 class="style">#<?php echo $tagged;?></h3></center></div>
    </div>
    <div class="row">
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
                        <img src="<?php echo base_url();?>cover/<?php echo $row->cover;?>" width="100%" height="110" id="#">
                    </div>

                    <div class="jumbotron" id="profile_view">
                        <img src="<?php echo base_url();?>profile_photo/<?php echo $youp->photo;?>" id="set_photo" width="74" height="74" class="img-circle">
                        <center style="color:#1dcaff" id="namev"><?php echo ucfirst($row->username);?> <small style="color:#fff;">@<?php echo ucfirst($row->username);?></small></center>

                        <table width="100%" border="0">
                          <tr>
                            <td style="font-weight:bold" width="33%"><center>POST</center></td>
                            <td style="font-weight:bold" width="33%"><center>FOLLOWING</center></td>
                            <td style="font-weight:bold" width="33%"><center>FOLLOWERS</center></td>
                          </tr>
                          <tr>
                            <td style="color:#1dcaff">
                            <?php

                              $this->db->where('added_by',$this->session->userdata('username'));
                              $c_post = $this->db->get('post')->result();

                            ?>
                            <center><?php echo count($c_post);?></center>
                            </td>

                            <td style="color:#1dcaff">
                            <?php               

                          $this->db->select('following_array');
                          $follow   =  $this->db->get_where('user',array('username' => $this->session->userdata('username')));
                          $g_follow =  $follow->result_array();

                          foreach($g_follow as $fol){

                          $old = $fol['following_array'];

                          }

                          $new = explode(',', $old);

                          for ($i = 0; $i < count($new ); ++$i) {

                          $arr[$i] =  $new[$i];

                          }                  
                          ?>
                            <center><?php echo count($arr)-1;?></center>
                            </td>


                            <td style="color:#1dcaff">
                            <?php               

                          $this->db->select('follower_array');
                          $follow   =  $this->db->get_where('user',array('username' => $this->session->userdata('username')));
                          $g_follow =  $follow->result_array();

                          foreach($g_follow as $fol){

                          $old = $fol['follower_array'];

                          }

                          $new = explode(',', $old);

                          for ($i = 0; $i < count($new ); ++$i) {

                          $arrx[$i] =  $new[$i];

                          }                  
                          ?>
                            <center><?php echo count($arrx)-1;?></center>
                            </td>
                          </tr>
                        </table>
                    </div>

               </div>    

            <div class="jumbotron" id="double">
                 <div class="jumbotron" id="split_body">
                    <button class="btn btn-success btn-sm style" id="f_photo" style="width:100%;">Photo</button>                          
              </div>             
            </div>
      

            <div class="jumbotron" id="double">
                 <div class="jumbotron" id="split_body">
                    <button class="btn btn-success btn-sm style" id="f_video" style="width:100%;">Video</button>                                          
              </div>             
            </div>

             <div class="jumbotron" id="double">
                 <div class="jumbotron" id="normal_body">
                    <button class="btn btn-success btn-sm style" id="f_music" style="width:100%;">Music</button>                                        
              </div>             
            </div>

             <div class="jumbotron" id="double">
                 <div class="jumbotron" id="normal_body">
                    <button class="btn btn-success btn-sm style" id="f_music" style="width:100%;">Status</button>                                        
              </div>             
            </div>

             <div class="jumbotron" id="double">
                 <div class="jumbotron" id="normal_body">
                    <button class="btn btn-success btn-sm style" id="f_music" style="width:100%;">Other</button>                                        
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

              <?php

               foreach($post as $gpost){}

              ?>

              <?php

              $this->db->select('photo');
              $this->db->where('id',$gpost->id);
              $z = $this->db->get('post')->result();
              foreach($z as $zoom){}

              ?>

              <?php

                function hashtag($string){
                $htag = "#";
                $arr =  explode(" ", $string);
                $arrc = count($arr);
                $i = 0;

                while($i < $arrc){

                if(substr($arr[$i],0,1) === $htag){

                $link = ltrim($arr[$i],$htag);
                $arr[$i] = "<a href='".base_url()."profile/hashtagView/".$link."'>".$arr[$i]."</a>";

                  }
                  $i++;
                }

                $string = implode(" ", $arr);
                return '<span style="font-size: 14px;line-height: 18px;">'.$string.'</span>';

                }

                ?>

                <?php

                function mention($string){
                $htag = "@";
                $arr =  explode(" ", $string);
                $arrc = count($arr);
                $i = 0;

                while($i < $arrc){

                if(substr($arr[$i],0,1) === $htag){

                $link = ltrim($arr[$i],$htag);
                $arr[$i] = "<a href='".base_url()."profile/userProfile/".$link."'>".$arr[$i]."</a>";

                  }
                  $i++;
                }

                $string = implode(" ", $arr);
                return $string;

                }

                      ?>



               <div class="jumbotron" id="post_feed">

                <!-- post -->
                
              <?php

               foreach ($post as $feed){ 

               $like = $this->db->get_where('likes',array('post_id' => $feed->id,'value' => '1' ))->result_array();
               
               ?>


                <div id="<?php echo $feed->id;?>" style="margin-top:-10px;">

                <div class="jumbotron" id="feed_head" style="border-bottom:none;">       

                <table width="100%" border="0">
                  <tr>
                    <td rowspan="2" width="15%">

                    <?php

                      $this->db->select('photo');
                      $this->db->where('username',$feed->added_by);
                      $add_p = $this->db->get('user')->result();
                      foreach($add_p as $addp){}  

                    ?>
                     <img src="<?php echo base_url();?>profile_photo/<?php echo $addp->photo;?>" width="55px" height="55px" class="#" id="mini_photo">  
                     </td>

                     <?php if (!empty($feed->shared_id)){ ?>

                     <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo strtoupper($feed->added_by);?>" style="color:#1dcaff;"><?php echo strtoupper($feed->added_by);?></a></b> ↫ <small>Shared a post</small> 


                     <?php } else if (!empty($feed->profile_picture)){ ?>


                    <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo strtoupper($feed->added_by);?>" style="color:#1dcaff;" ><?php echo strtoupper($feed->added_by);?></a> </b> ↫ <small>Change profile photo</small> 


                     <?php } else if (!empty($feed->cover_photo)){ ?>


                     <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo strtoupper($feed->added_by);?>" style="color:#1dcaff;"><?php echo strtoupper($feed->added_by);?> </a></b> ↫ <small>Change cover photo</small>   


                     <?php } else if (!empty($feed->user_posted_to AND $feed->user_posted_to!= $this->session->userdata('username'))){ ?>


                     <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo strtoupper($feed->added_by);?>" style="color:#1dcaff;"><?php echo strtoupper($feed->added_by);?></a> </b> ↪ <small>
                     <b><a href="<?php echo base_url();?>profile/userProfile/<?php echo strtoupper($feed->user_posted_to);?>" style="color:#1dcaff;"><?php echo $feed->user_posted_to;?></a></b></small>  


                     <?php }else{ ?>

                    <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo strtoupper($feed->added_by);?>" style="color:#1dcaff;"><?php echo strtoupper($feed->added_by);?></a></b> 
                      <small style="color:rgb(204,214,221);">@<?php echo strtoupper($feed->added_by);?></small>

                      <?php

                      if($feed->type =='onlyme'){ ?>

                        . <small> <span class="glyphicon glyphicon-lock"></span> Only me </small>

                      <?php }else if($feed->type =='public'){ ?>

                        . <small> <span class="glyphicon glyphicon-globe"></span> Public </small>

                      <?php }else if($feed->type =='friends'){ ?>

                        . <small> <span class="glyphicon glyphicon-user"></span> Friends </small>

                      <?php }else{ ?>
                        
                        . <small> <span class="glyphicon glyphicon-cog"></span> Custom </small>

                          <?php } };?>

                    </td>
                  </tr>
                  <tr>
                    <td><small><?php echo humanTiming(strtotime($feed->date_added));?> ago</small></td>
                  </tr>
                </table>
                </div>

                <div class="jumbotron" id="feed_body">

                 <?php 

                 $hashed  = hashtag($feed->body);

                 echo mention($hashed);

                 ?>

                 <?php if(!empty($feed->mood) && !empty($feed->feel)){ ?>

                 </p>
                  <center><img src="<?php echo $feed->mood;?>" width="35" height="35" id="img44"> <small> Feeling <?php echo $feed->feel;?></small></center>

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
      
               <img class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $feed->photo;?>" width="100%" height="300px;">
             
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

                       <iframe class="embed-responsive-item" width="100%" height="300px;" src="https://www.youtube.com/embed/<?php echo $feed->video;?>" frameborder="1" allowfullscreen></iframe> 

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

                <div class="jumbotron" id="feed_like" style="border-top:none;">
                <table width="100%" border="0">
                  <tr>
                    <td width="10%">
                    <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
                    <button id="sharez"><span class="glyphicon glyphicon-retweet" style="font-size:16px;color:rgb(204,214,221);" ></span> </button>
                    </td>
                    <td width="10%">

                    <?php

                    $this->db->where('likers',$this->session->userdata('username'));
                    $this->db->where('post_id',$feed->id);
                    $check_like = $this->db->get('likes')->num_rows();
                    if($check_like > 0 ){ 

                    $color = "#F64747";
                    $class = "glyphicon glyphicon-download";

                    }else{ 

                    $color="rgb(204,214,221)";
                    $class = "glyphicon glyphicon-upload";

                    } ?>

                    <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
                    <button id="like"><span class="<?php echo $class;?>" style="font-size:18px;color:<?php echo $color;?>;"></span> </button>
                    </td>
                    <td>
                    <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >

                    <button id="reply"><span class="glyphicon glyphicon-comment" style="font-size:18px;color:rgb(204,214,221);"></span> </button>


                    <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
                    <button style="float:right;" id="option"><span class="glyphicon glyphicon-option-horizontal"></span></button>

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
                        <td><button style="width:100%;border:none;border-radius:0px;" class="btn btn-default btn-xs"> Details</button></td>
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
                        <td height="15px;"></td>
                      </tr>
                    </table>
                    <!-- <hr> -->

                    </div>

                    </td>
                    <td width="30%"></td>
                    <td width="10%">
                    <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id">
                    <button id="whol" style="color:#1dcaff;"> <?php echo count($like) ;?> POINTS </button>
                    </td>
                    <td width="10%">

                    <?php

                      $cshare = $this->db->get_where('post',array('shared_id' => $feed->id ))->result();

                    ?>

                    <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
                    <button id="whos" style="color:#1dcaff;" > SHARE <?php echo count($cshare);?></button>
                    </td>
                  </tr>
             
                </table>

                <style type="text/css">

                 #likers<?php echo $feed->id;?>{

            border-top:1px solid #DDDDDD;
            margin:0px;
            margin-top: 5px;
            display:none;
            
            }

                 </style>
  
                  <div class="row" id="likers<?php echo $feed->id;?>">
                    <div class="col-md-4" style="border-right:1px solid #DDDDDD;">
                      <table width="100%" border="0">
                        <tr>
                          <td style="color:#1dcaff;">POINTS</td>
                          <td style="color:#1dcaff;">COMMENTS</td>
                        </tr>
                        <tr>
                          <td><a href=""><?php echo count($like) ;?></a></td>
                          <td>

                          <?php

                            $com_count = $this->db->get_where('comment',array('post_id' => $feed->id))->result();

                          ?>
                          <a href=""><?php echo count($com_count);?></a>

                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-8">
                      
                    <?php 

                        $gname = $this->db->get_where('likes',array('post_id' => $feed->id))->result();
                        foreach($gname as $name){

                          $this->db->select('photo');
                          $this->db->where('username',$name->likers);
                          $sphoto = $this->db->get('user')->result();
                          foreach($sphoto as $s){ ?>

                        <img style="margin-top:8px;" src="<?php echo base_url();?>profile_photo/<?php echo $s->photo;?>" width="24px" height="24px" class="img-rounded">

                    <?php   }
                        }

                      ?>
                    </div>
                  </div>
                 </div>

                 <style type="text/css">

                 #feed_comment<?php echo $feed->id;?>{

            border-radius: 0px;
            background-color: #FAFAFA;
            margin: 0px;
            border: solid 1px #DDDDDD;
            padding: 0px;
            
            }

                 </style>

               <div class="jumbotron" id="feed_comment<?php echo $feed->id;?>" style="display:none;">


            <div id="comment_div<?php echo $feed->id;?>"> 
                 <table width="100%" border="0">

                 <?php

                  $this->db->order_by('id','asc');
                  $com =  $this->db->get_where('comment',array('post_id' => $feed->id))->result();

                
                  foreach ($com as $comment){  ?>

                  <tr>
                  <td rowspan="2" width="10%" class="comment_list<?php echo $comment->id;?>">

                  <?php

                      $this->db->select('photo');
                      $this->db->where('username',$comment->added_by);
                      $com_p = $this->db->get('user')->result();
                      foreach($com_p as $comp){}  

                  ?>

                  <center><img src="<?php echo base_url();?>profile_photo/<?php echo $comp->photo;?>" width="30px" height="30px" class="img-rounded"></center>

                  </td>
                  <td class="comment_list<?php echo $comment->id;?>">
                  <b id="mini_name"><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($comment->added_by);?>"><?php echo ucfirst($comment->added_by);?></a></b>
                  <small style="color:rgb(204,214,221)">@<?php echo ucfirst($comment->added_by);?></small> 
                   <small id="com_mini"><?php echo humanTiming(strtotime($comment->date_added));?></small>

                  <input type="hidden" value="<?php echo $comment->id;?>" id="comm_id">
                  <button id="delete_com"><span class="glyphicon glyphicon-remove"></span></button>

                  </td>
                  </tr>
                  <tr>
                  <td class="comment_list<?php echo $comment->id;?>">

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
                  <td class="comment_list<?php echo $comment->id;?>">
                  </td>
                  <tr>
                    <td height="5px;"></td>
                  </tr>
                  <tr>
                  <td width="6%"></td>
                    <td class="comment_list<?php echo $comment->id;?>">
                  <?php

                    $com_like  =  $this->db->get_where('comment_likes',array('comm_id' => $comment->id))->result();
                
                  ?>

                  <div class="row">
                    <div class="col-md-2">
                    <input type="hidden" value="<?php echo $comment->id;?>" id="reply_to">
                      <button id="like_c"><span class="glyphicon glyphicon-share-alt" style="font-size:15px;color:rgb(204,214,221);" ></span></button>
  
                    </div>
                    <div class="col-md-2">
                    <input type="hidden" value="<?php echo $comment->id;?>" id="comm_id">
                    <button id="like_c"><span class="glyphicon glyphicon-upload" style="font-size:15px;color:rgb(204,214,221);" ><span id="count_like<?php echo $comment->id;?>"> <?php echo count($com_like) ;?></span></span> </button> 
                    </div>

                    <div class="col-md-2">
                    <input type="hidden" value="<?php echo $comment->id;?>" id="comm_id">
                    <button id="edit_c"><span class="glyphicon glyphicon-pencil" style="font-size:15px;color:rgb(204,214,221);" ></span> </button></td> 
                    </div>
                  </div>

                  </div>
                  </tr>
                 </tr>             

                <?php }


                 ?>
                  
                    
                 </table>
                </div>
                </div>

                 <style type="text/css">

                 #comment_spot<?php echo $feed->id;?>{

            border-radius: 0px;
            background-color: #FAFAFA;
            margin: 0px;
            border: solid 1px #DDDDDD;
            padding: 10px;
            border-top: none;
            
            }

                 </style>

                <div class="jumbotron" id="comment_spot<?php echo $feed->id;?>" style="display:none;">
                 </p>
                 <textarea rows="1" style="width:100%;" id="comment"></textarea>
                 <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >

                 <button id="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
                 <button id="cancel" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>

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

<!-- RECIEVER -->
<input type="hidden" value="" id="to">
<input type="hidden" value="<?php echo $this->session->userdata('username');?>" id="from">

<!-- END -->


<!-- MESSAGE MODEL BOX -->
<div id="popup" class="modal-box" style="position:fixed">  
  <header style="background-color:#f7f7f7;">
    <a href="#" class="js-modal-close close" id="close_box">×</a>
    <h3>Send Message to : <span id="sms_to"></span></h3>
  </header>
  <div class="modal-body">
    <p><textarea rows="4" id="sms_box" placeholder="Write a message"></textarea></p>
  </div>
  <footer style="background-color:#f7f7f7;">
    <button class="btn btn-success btn-sm" id="send_sms">Send</button>
    <a href="#" class="js-modal-close" id="close_modal"><button class="btn btn-danger btn-sm">Cancel</button></a>
  </footer>
</div>  
<!-- END MODAL -->

<!-- MODAL 2 -->
<div id="popup2" class="modal-box" style="position:fixed">
  <header> <a href="#" class="js-modal-close close" id="close_box2">×</a>
    <h3><center>Message sent successfully</center></h3>
  </header>
  <div class="modal-body">
  <!-- empty -->
  </div>
  <center><a href="#" class="btn btn-small js-modal-close" id="close_box3"><button class="btn btn-success btn-sm">Close</button></a></center> 
</div>
<!-- END MODAL 2 -->

<!-- MODAL 3 -->
<div id="popup3" class="modal-box" style="position:fixed;margin-top:-50px;height:500px;">
  <header> <a href="#" class="js-modal-close close" id="close_box2">×</a>
    <h3><center>NOTIFICATIONS</center></h3>
  </header>
  <div class="modal-body" id="noti_bodz">
  
  <?php

  $this->db->order_by('id','desc');
  $this->db->where('noti_to',$this->session->userdata('username'));
  $all_n = $this->db->get('notification')->result();
 

                  foreach($all_n as $active): 
               
                    $from = $active->from_who;
                  
                  ?>

                  <?php

                  $this->db->select('photo');
                  $this->db->where('username',$active->from_who);
                  $sender = $this->db->get('user')->result();
                  foreach($sender as $gp){}

                  ?>

                  <table width="100%" border="0">
            <tr>
              <td width="20%" rowspan="2"><center><img src="<?php echo base_url();?>profile_photo/<?php echo $gp->photo;?>" width="35px" height="35px;"></center></td>
              <td>


              <a href="" style="color:#1dcaff"><b><?php echo ucfirst($from);?></b></a>

              <!-- <small><?php echo $active->type;?></small> -->
              <small style="float:right;"><?php echo humanTiming(strtotime($active->date_added));?> ago</small>

              </td>
            </tr>
            <tr>

              <?php

                if($active->type == 'photo'){ ?>

                <td> added a new <a href="<?php echo base_url();?>profile/statusView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">photo</a></td>

                <?php }else if($active->type == 'video'){?>

                <td> added a new <a href="<?php echo base_url();?>profile/statusView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">video</a></td>
                
                <?php }else if($active->type == 'music'){?>

                <td> added a new <a href="<?php echo base_url();?>profile/statusView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">music</a></td>

                <?php }else if($active->type == 'link'){?>

                <td style="font-size:13px;">like <a href=""><?php echo ucfirst($active->owner);?></a> posted <a href="<?php echo base_url();?>profile/statusView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">links</a></td>

                <?php }else if($active->type == 'comment'){?>

                <td style="font-size:13px;">commented on <a href=""> you <a href="<?php echo base_url();?>profile/activityView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">post</a></td>

                <?php }else if($active->type == 'likes'){?>

                <td style="font-size:13px;">like <a href=""> you </a> <a href="<?php echo base_url();?>profile/activityView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">post</a></td>

                <?php }else if($active->type == 'follow'){?>

                <td style="font-size:13px;">now following <a href=""> you </a></td>

                <?php }else if($active->type == 'share'){?>

                <td style="font-size:13px;"> share you <a href="<?php echo base_url();?>profile/activityView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">post</a></td>

                 <?php }else if($active->type == 'mention'){?>

                <td style="font-size:13px;"> mention  you in a <a href="<?php echo base_url();?>profile/statusView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">post</a></td>

                <?php }else{?>


                <td style="font-size:13px;"> updated his <a href="<?php echo base_url();?>profile/statusView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">status</a></td>

                <?php } ?>

            </tr>
            <tr>
              <td height="1px" colspan="2"><hr></td>
            </tr>
              </table>

                  <?php endforeach; ?>

        

  </div>
  <center><a href="#" class="btn btn-small js-modal-close" id="close_box3"><button class="btn btn-success btn-sm">Close</button></a></center> 
</div>
<!-- END MODAL 3 -->


<!-- MODAL 4 -->
<div id="popup4" class="modal-box" style="position:fixed;margin-top:-50px;height:500px;">
  <header> <a href="#" class="js-modal-close close" id="close_box2">×</a>
    <h3><center>MESSAGES</center></h3>
  </header>
  <div class="modal-body" id="sms_bodz">
  <table width="100%" border="0">
  <?php

  $this->db->order_by('id','desc');
  $this->db->where('user_to',$this->session->userdata('username'));
  $all_sms = $this->db->get('inbox')->result();

  foreach($all_sms as $sms){

  $this->db->select('photo');
  $this->db->where('username',$sms->user_from);
  $send_f = $this->db->get('user')->result();
  foreach($send_f as $send_pto){} ?>
  
    <tr>
      <td width="10%" rowspan="2"><img src="<?php echo base_url();?>profile_photo/<?php echo $send_pto->photo;?>" class="#" width="35px" height="35px"></td>
      <td><a href="" style="color:#1dcaff;font-weight:bold;"><?php echo ucfirst($sms->user_from);?></a></td>
      <td width="15%"><?php echo humanTiming(strtotime($sms->date_added));?></td>
    </tr>
    <tr>
      <td><?php echo $sms->body;?></td>
      <td width="15%">

      <input type="hidden" value="<?php echo $sms->user_from;?>" id="rep_id"> 
      <button id="outline" class="reply">REPLY</button>

      </td>
    </tr>
    <tr>
      <td style="height:10px;"></td>
    </tr>

 <?php } ?>
        
  </table>
  </div>
  <center><a href="#" class="btn btn-small js-modal-close" id="close_box3"><button class="btn btn-success btn-sm">Close</button></a></center> 
</div>
<!-- END MODAL 4 -->

<!-- CHAT PANEL -->
      <a class="js-open-modal" href="#" data-modal-id="popup"  id="click_me"></a>
      <a class="js-open-modal" href="#" data-modal-id="popup2" id="success"></a>
      <a class="js-open-modal" href="#" data-modal-id="popup3" id="notis"></a>
      <a class="js-open-modal" href="#" data-modal-id="popup4" id="misij"></a>

<section id="open_chat">

<script type="text/javascript">

        setInterval(function(){
            $("#user_activity").load(location.href + " #user_activity");
        }, 25000);
           
        </script>

        <div class="jumbotron" id="user_activity"> 
          <div class="jumbotron" id="ac_head">

          <center><button class="animate" id="outline">HIDE</button></center>
          <center><button class="animate2" style="display:none;" id="outline">SHOW</button></center>

          </div>
          <div class="jumbotron style" id="ac_body">
            
          <?php

            $target = $row->username;

                    $this->db->select('following_array');
                    $follow   =  $this->db->get_where('user',array('username' => $this->session->userdata('username')));
                    $g_follow =  $follow->result_array();

                    foreach($g_follow as $fol){

                    $old = $fol['following_array'];

                    }

                    $new = explode(',', $old);

                    for ($i = 0; $i < count($new ); ++$i) {

                    $arr[$i] =  $new[$i];

                    }                  

                  $limit = $this->session->userdata('limit');
                  // $this->db->limit(5);
                  $this->db->order_by('id','desc');

                  foreach($arr as $fren){

                  $this->db->or_where('owner',$fren);
               
                  }

                  $activity =  $this->db->get('notification')->result();

                  foreach($activity as $active): 

                  if($active->owner == $this->session->userdata('username')){

                    $from ="You";

                  }else{

                    $from = $active->from_who;
                  }
                  ?>

                  <?php

                  $this->db->select('photo');
                  $this->db->where('username',$active->from_who);
                  $sender = $this->db->get('user')->result();
                  foreach($sender as $gp){}

                  ?>

                  <table width="100%" border="0">
            <tr>
              <td width="20%" rowspan="2"><center><img src="<?php echo base_url();?>profile_photo/<?php echo $gp->photo;?>" width="35px" height="35px;"></center></td>
              <td>


              <a href="" style="color:#1dcaff"><b><?php echo ucfirst($from);?></b></a>

              <!-- <small><?php echo $active->type;?></small> -->
              <small style="float:right;"><?php echo humanTiming(strtotime($active->date_added));?> ago</small>

              </td>
            </tr>
            <tr>

              <?php

                if($active->type == 'photo'){ ?>

                <td> added a new <a href="<?php echo base_url();?>profile/statusView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">photo</a></td>

                <?php }else if($active->type == 'video'){?>

                <td> added a new <a href="<?php echo base_url();?>profile/statusView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">video</a></td>
                
                <?php }else if($active->type == 'music'){?>

                <td> added a new <a href="<?php echo base_url();?>profile/statusView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">music</a></td>

                <?php }else if($active->type == 'link'){?>

                <td style="font-size:13px;">like <a href=""><?php echo ucfirst($active->owner);?></a> posted <a href="<?php echo base_url();?>profile/statusView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">links</a></td>

                <?php }else if($active->type == 'comment'){?>

                <td style="font-size:13px;">commented on <a href=""><?php echo ucfirst($active->owner);?></a> <a href="<?php echo base_url();?>profile/activityView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">post</a></td>

                <?php }else if($active->type == 'likes'){?>

                <td style="font-size:13px;">like <a href=""><?php echo ucfirst($active->owner);?></a> <a href="<?php echo base_url();?>profile/activityView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">post</a></td>

                <?php }else if($active->type == 'follow'){?>

                <td style="font-size:13px;">now following <a href=""><?php echo ucfirst($active->owner);?></a></td>

                <?php }else if($active->type == 'share'){?>

                <td style="font-size:13px;"> share <a href=""><?php echo ucfirst($active->owner);?></a> <a href="<?php echo base_url();?>profile/activityView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">post</a></td>

                <?php }else{?>


                <td style="font-size:13px;"> updated his <a href="<?php echo base_url();?>profile/statusView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">status</a></td>

                <?php } ?>

            </tr>
            <tr>
              <td height="1px" colspan="2"><hr></td>
            </tr>
              </table>

                  <?php endforeach; ?>

          </div>
        </div>

        <div class="jumbotron" id="online_user">
          
        <table width="100%" border="0">

        <?php

                  $this->db->select('following_array');
                  $follow   =  $this->db->get_where('user',array('username' => $this->session->userdata('username')));
                  $g_follow =  $follow->result_array();

                  foreach($g_follow as $fol){

                  $old = $fol['following_array'];

                  }

                  $new = explode(',', $old);

                  for ($i = 0; $i < count($new ); ++$i) {

                  $arr[$i] =  $new[$i];

                  }   

                 $this->db->where('username !=',$this->session->userdata('username'));
               $this->db->order_by('id','desc');

               foreach($arr as $fren){

               $this->db->or_where('username',$fren);

               }

               $this->db->where('online','1');
               $online =  $this->db->get('user')->result();

               foreach($online as $chat){ ?>

                <tr>
            <td rowspan="2"><img src="<?php echo base_url();?>profile_photo/<?php echo $chat->photo;?>" width="40px" height="40px" class="img-circle"></td>
            <td width="70%" style="color:#1dcaff"> <div id="on_logo"></div> <?php echo $chat->username;?> <small style="color:black;">@<?php echo $chat->username;?></small></td>
          </tr>
          <tr>
            <td width="70%;">

            <input type="hidden" value="<?php echo $chat->username;?>" id="t_user">
            <button id="outline" class="send_msg">MESSAGE</button>

            </td>
          </tr>
          <tr>
            <td height="10px;"></td>
          </tr>  

               <?php } ?>


        </table>

        </div>

</section>

<!-- END -->

