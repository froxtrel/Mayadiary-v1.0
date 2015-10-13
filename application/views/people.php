
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>people/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>people/fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>people/css/style2.css" />
    <!--<script src="<?php echo base_url();?>people/js/modernizr.custom.js"></script>-->

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


  </head>
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
    <div class="container" style="margin-top:-60px;">
      <div class="row">
        <div class="col-md-12">

      <body>
      <div class="container" style="margin-left:-25%;width:110%;">
      <button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>
      <div id="theGrid" class="main">

        <section class="grid">

        <?php

         $this->db->where('username !=',$row->username);
         $all =  $this->db->get('user')->result();
         foreach($all as $user){ ?>

         <style type="text/css">

          #user<?php echo $user->id;?>{

         /* background-image:url('<?php echo base_url();?>profile_photo/<?php echo $user->photo;?>');  
          background-attachment: <?php echo $row->bg_attach;?>;
          background-color: <?php echo $row->bg_color;?>;
          background-repeat: no;
          background-position: fixed;
          color:<?php echo $row->page_color;?>;
          background-size: cover;  */

          }

         </style>

         <div class="grid__item" href="<?php echo base_url();?>profile/userProfile/<?php echo $user->username;?>" style="text-decoration:none;" id="user<?php echo $user->id;?>">
            <div class="loader"></div>
            <h2 class="title title--preview" style="font-size:15px;"><?php echo ucfirst($user->bio);?></h2>
            <div class="loader"></div>
            <span class="category"><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($user->username);?>" class="style"><?php echo ucfirst($user->username);?></a></span>
            <div class="meta meta--preview">
              <img class="meta__avatar" src="<?php echo base_url();?>profile_photo/<?php echo $user->photo;?>" width="60px" height="60px;" /> 
              <span class="meta__date"><button class="btn btn-warning btn-sm"><i class="fa fa-cog"></i> Option </button></span>


               <?php

                  $target = $user->username;

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
                  
                  if (in_array($target, $arr)){ ?>

                  <span class="meta__reading-time"><button id="off<?php echo $user->id;?>" class="btn btn-danger btn-sm" onclick="javascript:rem<?php echo $user->id;?>()"><i class="fa fa-user-plus"></i> Unfollow</button></span>
                  <span class="meta__reading-time"><button id="on<?php echo $user->id;?>" class="btn btn-success btn-sm" style="display:none;" onclick="javascript:add<?php echo $user->id;?>()"><i class="fa fa-user-plus"></i> Follow</button></span>
                  <input type="hidden" value="<?php echo $user->username;?>" id="to<?php echo $user->id;?>">
                  <input type="hidden" value="<?php echo $this->session->userdata('username');?>" id="from<?php echo $user->id;?>">
  
                  <script type="text/javascript">

                  function add<?php echo $user->id;?>(){

                    var to   = $('#to<?php echo $user->id;?>').val();
                    var from = $('#from<?php echo $user->id;?>').val();


                    $.ajax({

                      type:'POST',
                      url :'http://localhost/Mayadiary-v1.0/follow/addLink',
                      data:{'to':to,'from':from },
                      datatype:'json',
                      success: function (data) {

                      $('#on<?php echo $user->id;?>').toggle();          
                      $('#off<?php echo $user->id;?>').toggle();
                       
                      },

                      error: function (data) {
                        
                      alert('failed');

                      }
                      });
                  }

                  function rem<?php echo $user->id;?>(){

                    var target   = $('#to<?php echo $user->id;?>').val();

                    $.ajax({

                      type:'POST',
                      url :'http://localhost/Mayadiary-v1.0/follow/remove',
                      data:{'target':target},
                      datatype:'json',
                      success: function (data) {

                      $('#on<?php echo $user->id;?>').toggle();          
                      $('#off<?php echo $user->id;?>').toggle();
                       
                      },

                      error: function (data) {
                        
                      alert('failed');

                      }
                      });
                  }

                  </script>


                  <?php }else{ ?>
                 
                  <span class="meta__reading-time"><button id="on<?php echo $user->id;?>" class="btn btn-success btn-sm" onclick="javascript:add<?php echo $user->id;?>()"><i class="fa fa-user-plus"></i> Follow</button></span>
                  <span class="meta__reading-time"><button id="off<?php echo $user->id;?>" class="btn btn-danger btn-sm" style="display:none;" onclick="javascript:rem<?php echo $user->id;?>()"><i class="fa fa-user-plus"></i> Unfollow</button></span>

                  <input type="hidden" value="<?php echo $user->username;?>" id="to<?php echo $user->id;?>">
                  <input type="hidden" value="<?php echo $this->session->userdata('username');?>" id="from<?php echo $user->id;?>">

                  <script type="text/javascript">

                  function add<?php echo $user->id;?>(){

                    var to   = $('#to<?php echo $user->id;?>').val();
                    var from = $('#from<?php echo $user->id;?>').val();


                    $.ajax({

                      type:'POST',
                      url :'http://localhost/Mayadiary-v1.0/follow/addLink',
                      data:{'to':to,'from':from },
                      datatype:'json',
                      success: function (data) {

                      $('#on<?php echo $user->id;?>').toggle();          
                      $('#off<?php echo $user->id;?>').toggle();
                       
                      },

                      error: function (data) {
                        
                      alert('failed');

                      }
                      });
                  }

                  function rem<?php echo $user->id;?>(){

                    var target   = $('#to<?php echo $user->id;?>').val();

                    $.ajax({

                      type:'POST',
                      url :'http://localhost/Mayadiary-v1.0/follow/remove',
                      data:{'target':target},
                      datatype:'json',
                      success: function (data) {

                      $('#on<?php echo $user->id;?>').toggle();          
                      $('#off<?php echo $user->id;?>').toggle();
                       
                      },

                      error: function (data) {
                        
                      alert('failed');

                      }
                      });
                  }


                  </script>

                  <?php } ?>

            </div>
           </div>

         <?php }?>
     
           </section>
       
            </div>
          </div><!-- /container -->
        </div>
      </div>
    </div>
  </body>
</html>

<!-- CHAT PANEL -->

<section id="open_chat"><center>CHAT BOX</center></section>

<!-- END -->
  <!--<script src="<?php echo base_url();?>people/js/classie.js"></script>-->
  <!--<script src="<?php echo base_url();?>people/js/main.js"></script>-->

 