
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

<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Oswald:300,400,700" media="screen" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">  
<script src="<?php echo base_url();?>js/latae.js" type="text/javascript"></script>

<div id="wrapper">
  <div class="overlay"></div>
  
  <!-- Sidebar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
      <li class="sidebar-brand"> <a href="#"><img src="<?php echo base_url();?>public/img/logo.png" width="40" height="40" class="img-circle" style="border:2px solid #fff;"> <span class="maya">MayaDiary</span></a> </li>
      <li> <a href="#"><i class="fa fa-fw fa-home">  		</i> Home  </a> </li>
      <li> <a href="<?php echo base_url();?>profile/userProfile/<?php echo $this->session->userdata('username');?>"><i class="fa fa-fw fa-user"></i> Profile </a> </li>
      <li> <a href="<?php echo base_url();?>profile/photoshow/<?php echo $this->session->userdata('username');?>"><i class="fa fa-fw fa-picture-o">  		</i> Photos  </a> </li>
      <li> <a href="#"><i class="fa fa-fw fa-video-camera">  	  </i> Video   </a> </li>
      <li> <a href="#"><i class="fa fa-fw fa-music">     		    </i> Music   </a> </li>
      <li> <a href="#"><i class="fa fa-fw fa-pencil-square-o">  </i> Blogs   </a> </li>
      <li> <a href="#"><i class="fa fa-fw fa-bullhorn"> 		    </i> Forums  </a> </li>
      <li> <a href="#"><i class="fa fa-fw fa-users">			      </i> Groups  </a> </li>
      <li> <a href="#"><i class="fa fa-fw fa-gamepad"> 			    </i> Games   </a> </li>
      <li> <a href="#"><i class="fa fa-fw fa-calendar"> 		    </i> Events  </a> </li>
      <li> <a href="#"><i class="fa fa-fw fa-wrench"> 		      </i> Settings  </a> </li>
      <li> <a href="<?php echo base_url();?>login/logout"><i class="fa fa-fw fa-sign-out"></i> Logout</a> </li>
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
       <div class="col-md-10">

          <div class="jumbotron" id="photo_head" style="background-color:rgba(255,255,255,0.5)" >
          
          <div class="row">
            <div class="col-md-3"> <center><button class="btn btn-default">ALL PHOTOS</button> </center></div>
            <div class="col-md-3"> <center><button class="btn btn-default">MY PHOTOS</button> </center></div>
            <div class="col-md-3"> <center><button class="btn btn-default">POPULAR</button> </center></div>
            <div class="col-md-3"> <center><button class="btn btn-default">ALL PHOTOS</button></center> </div>
          </div>

          </div>        

          <!-- ALL PHOTO -->
            <div class="gallery" style="background-color:rgba(255,255,255,0.5)">

                <?php

                $this->db->where('photo !=','');
                $photo = $this->db->get('post')->result();
                foreach($photo as $image){ ?>

                <a href="<?php echo base_url();?>profile/postview/<?php echo $row->username;?>/<?php echo $image->id;?>">

                <?php

                      $cshare = $this->db->get_where('post',array('shared_id' => $image->id ))->result();

                 ?>

                <?php

                      $likes = $this->db->get_where('likes',array('post_id' => $image->id ))->result();

                 ?>

                <figure class="picture" data-title="<small>LIKE: <?php echo count($likes);?> | SHARE : <?php echo count($cshare);?>  |  BY : <?php echo strtoupper($image->added_by);?></small>" data-url="<?php echo base_url();?>uploads/<?php echo $image->photo;?>"></figure>


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

<!-- CHAT PANEL -->

<section id="open_chat"><center>CHAT BOX</center></section>

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
