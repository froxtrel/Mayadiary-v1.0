<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Oswald:300,400,700" media="screen" rel="stylesheet" type="text/css">
<!-- <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">   -->
<script src="<?php echo base_url();?>js/latae.js" type="text/javascript"></script>

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
  <div id="page-content-wrapper">
   <button  style="margin-top:30px;" type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas"><span class="hamb-top"></span> <span class="hamb-middle"></span> <span class="hamb-bottom"></span></button>
    <div class="container" style="margin-top:-18px;">
      <div class="row">
       <div class="col-md-10">

          <div class="jumbotron" id="photo_head" style="background-color:rgba(255,255,255,0.5)" >
          
          <div class="row">
            <div class="col-md-3"> <center><button class="btn btn-default " style="width:100%;" id="all_p"><span class="glyphicon glyphicon-list-alt"></span> ALL PHOTOS</button> </center></div>
            <div class="col-md-3"> <center><button class="btn btn-default " style="width:100%;" id="all_m"><span class="glyphicon glyphicon-picture"></span> MY PHOTOS</button> </center></div>
            <div class="col-md-3"> <center><button class="btn btn-default " style="width:100%;" id="pupo"><span class="glyphicon glyphicon-star-empty"></span> POPULAR</button> </center></div>
            <div class="col-md-3"> <center><button class="btn btn-default" style="width:100%;"><span class="glyphicon glyphicon-upload"></span> UPLOAD PHOTOS</button></center> </div>
          </div>

          </div>        


          <!-- ALL PHOTO -->
            <div class="gallery" style="background-color:rgba(255,255,255,0.5)">

                <?php

                $status = $this->session->userdata('photo');

                if($status == 'A'){

                $this->db->order_by('id','desc');
                $this->db->where('photo !=','');
                $photo = $this->db->get('post')->result();


                }else if($status == 'M'){

                $this->db->where('added_by',$row->username);
                $this->db->where('photo !=','');
                $photo = $this->db->get('post')->result();
 

                }else{

                // ORDER BY LIKE

                }

               foreach($photo as $image){ ?>  
                  

                <a href="<?php echo base_url();?>profile/postview/<?php echo $row->username;?>/<?php echo $image->id;?>">

                <?php

                      $cshare = $this->db->get_where('post',array('shared_id' => $image->id ))->result();

                 ?>

                <?php

                      $likes = $this->db->get_where('likes',array('post_id' => $image->id ))->result();

                 ?>

                <figure class="picture" data-title="<small><span class='glyphicon glyphicon-heart'></span> <?php echo count($likes);?> | <span class='glyphicon glyphicon-retweet'></span> : <?php echo count($cshare);?>  |  <span class='glyphicon glyphicon-user'></span> : <?php echo strtoupper($image->added_by);?></small>" data-url="<?php echo base_url();?>uploads/<?php echo $image->photo;?>"></figure>


                </a>

              <?php } ?>
         
               <br style="clear: both;">

            </div>

            <!-- END -->

        </div>
      </div>
    </div>
  </body>
</html>

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


<!-- <section id="open_chat"><center>CHAT BOX</center></section> -->

<!-- END -->


  <script>
  $(document).ready(function(){
      $(".gallery").latae({
          loader : 'http://localhost/Mayadiary-v1.0/img/loader.gif',
          init : function() { console.log('bonjour'); },
          loadPicture : function(event, img) { console.log($(img)); },
          resize : function(event, gallery) { console.log(gallery); },
          displayTitle: true
      });
  });
  </script>


