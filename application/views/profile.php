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

<div id="wrapper" style="min-width:1000px;">
  <div class="overlay"></div>
  
  <!-- Sidebar -->
   <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation" style="background-color:#8E44AD;">
    <ul class="nav sidebar-nav">
      <li> <a href="#"><img src="<?php echo base_url();?>public/img/logo.png" width="40" height="40" class="img-circle" style="border:2px solid #fff;"> <span class="maya">MayaDiary</span></a> </li>
      <li> <a href="<?php echo base_url();?>home/goHome" ><i class="fa fa-fw fa-home">     </i> Home  </a> </li>
      <li> <a href="<?php echo base_url();?>profile/userProfile/<?php echo $this->session->userdata('username');?>" ><i class="fa fa-fw fa-user"></i> <?php echo ucfirst($this->session->userdata('username'));?> </a> </li>
      <li> <a href="<?php echo base_url();?>profile/peopleshow/<?php echo $this->session->userdata('username');?>" ><i class="fa fa-fw fa-users">        </i> People   </a> </li>
      <li> <a href="<?php echo base_url();?>profile/photoshow/<?php echo $this->session->userdata('username');?>" ><i class="fa fa-fw fa-camera">     </i> Photos  </a> </li>
      <li> <a href="#" ><i class="fa fa-fw fa-youtube">   </i> Video   </a> </li>
      <li> <a href="#" ><i class="fa fa-fw fa-soundcloud">        </i> Music   </a> </li>
      <li> <a href="<?php echo base_url();?>profile/profileDesign/<?php echo $this->session->userdata('username');?>" ><i class="fa fa-fw fa-wrench">        </i> Settings  </a> </li>
      <li> <a href="<?php echo base_url();?>login/logout" ><i class="fa fa-fw fa-sign-out"></i> Logout</a> </li>
    </ul>
  </nav>
  <!-- /#sidebar-wrapper --> 
  <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#8E44AD;border-bottom:1px solid #ddd;padding-right:100px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#"><img style="margin-top:-5px;" src="<?php echo base_url();?>public/img/logo.png" width="30" height="30" class="img-circle"></img></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#" style="color:#fff;"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">   
         <li>
         	 <?php 

		          $this->db->select('photo');
		          $this->db->where('username',$this->session->userdata('username'));
		          $mphoto = $this->db->get('user')->result();
		          foreach($mphoto as $mp){}

		     ?>
		 <a href="<?php echo base_url();?>profile/userProfile/<?php echo $this->session->userdata('username');?>"><img src="<?php echo base_url();?>profile_photo/<?php echo $mp->photo;?>" width="20px" height="20px"></a>
         </li>
      	 <li><a href="<?php echo base_url();?>home/goHome"  style="color:#fff;" id="home_v"><!-- <span class="glyphicon glyphicon-home"></span> --> Home</a>	 
         <li><a href=""  style="color:#fff;" id="notis_v">

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

	         <span class="glyphicon glyphicon glyphicon-bell"></span> </a></li>

            <li><a href=""  style="color:#fff;" id="misij_v">

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
         	 <span class="glyphicon glyphicon glyphicon-envelope"></span>   </a></li>

      </ul>
    </div>
  </div>
</nav>

<script type="text/javascript">

setInterval(function() {
      
$("#myNavbar").load(location.href + " #myNavbar");  

}, 5000);

// setInterval(function() {
      
// $("#mini_gallery").load(location.href + " #mini_gallery");  

//  }, 5000);
	
</script>
  
  <!-- Page Content -->
  <div id="page-content-wrapper">
   <button style="margin-top:40px;" id="burger" type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas"><span class="hamb-top"></span> <span class="hamb-middle"></span> <span class="hamb-bottom"></span></button>
    <div class="container" style="margin-top:-18px;">
      <div class="row">
		<div class="col-md-10">
			<div class="jumbotron" id="main_wrap">

			<?php

		        function random_color_part() {
						    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
				}

				function random_color() {
						    return random_color_part() . random_color_part() . random_color_part();
				}

		     ?>
					
			<div class="jumbotron" id="cover_photo">

			<div id="covers" style="border:1px solid #ddd;">

			<?php if(empty($row->cover)){ ?>

			<div class="jumbotron" style="background-color:#<?php echo random_color();?>;width:100%;height:220px;color:#fff;color:#fff;border-radius:0px;margin:0px;" id="main_cover">
			<center>WELCOME TO <img src="<?php echo base_url();?>public/img/logo.png" width="24" height="24" class="img-circle" style="border:2px solid #fff;"> MAYADIARY <?php echo strtoupper($row->username);?></center>
			</div>

		    <?php  }else{  ?>


	       	<img src="<?php echo base_url();?>cover/<?php echo $row->cover;?>" width="80%" height="429" id="main_cover">

	       	<div id="mini_gallery">

	       	<?php

	       	$this->db->order_by('id','random');
	       	$this->db->where('photo !=','');
	       	$this->db->where('added_by',$row->username);
	       	$this->db->where('status','on');
	       	$this->db->limit(4);
	        $p_pre = $this->db->get('post')->result();

	        foreach($p_pre as $prev){ ?>
	        	
	        <a href="<?php echo base_url();?>profile/postview/<?php echo $this->session->userdata('username');?>/<?php echo $prev->id;?>">
	        <img src="<?php echo base_url();?>uploads/<?php echo $prev->photo;?>" width="20%" height="107.5" id="main_cover" class="img"></a>

	       <?php } ?>

	       </div>

		    <?php } ?>
			
			</div>			

			</div>

			<div id="photos">

		    <?php if(empty($row->photo)){ ?>

			<div class="jumbotron" style="background-color:#<?php echo random_color();?>;width:120px;height:120px;color:#fff;" id="profile_photo">
			<?php echo strtoupper(substr($row->username,0,2));?>
			</div>

		    <?php  }else{  ?>

	        <img src="<?php echo base_url();?>profile_photo/<?php echo $row->photo;?>" width="120" height="120" id="profile_photo" class="img-circle">	

		    <?php } ?>
		    
		          	
			</div>

			<button id="upload_logo" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-camera"></span></button>
			<button id="cover_logo" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-camera"></span> Change Cover</button>


			<span id="profile_name" >

			<?php echo ucfirst($row->username);?>

			</span>

			<span id="profile_mini" >

			<a href="">@<?php echo ucfirst($row->username);?></a>

			</span>

			<span id="tagline">

			<?php echo $row->tagline;?>

			</span>

			<div class="jumbotron" id="profile_menu">

				<div class="jumbotron" id="menu_1" style="width:10%;"><a href="" style="color:black;" id="post_list"><center>MEW <span style="color:#1dcaff;"> 

				<?php

		         $this->db->where('added_by',$row->username);
		         $c_post = $this->db->get('post')->result();

		         ?>
				<?php echo count($c_post);?>	
				</span> </center></a></div>

				<div class="jumbotron" id="menu_2" style="width:10%;"><a href="" style="color:black;" id="following_list"><center>FOLLOWING <span style="color:#1dcaff;">
				
				<?php								

					                $this->db->select('following_array');
					                $follow   =  $this->db->get_where('user',array('username' => $row->username));
					                $g_follow =  $follow->result_array();

					                foreach($g_follow as $fol){

					                $old = $fol['following_array'];

					                }

					                $new = explode(',', $old);

					                for ($i = 0; $i < count($new ); ++$i) {

					                $arr[$i] =  $new[$i];

					                }		               
				?>	
				<?php echo count($arr) -1 ;?>
				</span> </center></a></div>

				<div class="jumbotron" id="menu_3" style="width:10%;"><a href="" style="color:black;" id="follower_list"><center>FOLLOWERS <span style="color:#1dcaff;">
					
				<?php								

					                $this->db->select('follower_array');
					                $follow   =  $this->db->get_where('user',array('username' => $row->username));
					                $g_follow =  $follow->result_array();

					                foreach($g_follow as $fol){

					                $old = $fol['follower_array'];

					                }

					                $new = explode(',', $old);

					                for ($i = 0; $i < count($new ); ++$i) {

					                $arrx[$i] =  $new[$i];

					                }		               
				?>
				<?php echo count($arrx) -1 ;?>
				</span> </center></a></div>

				<div class="jumbotron" id="menu_4" style="width:10%;"><a href="" style="color:black;" id="like_list"><center>LIKE <span style="color:#1dcaff;">
				<?php

				$this->db->where('likers',$row->username);
				$co_like = $this->db->get('likes')->result();

				?>
				<?php echo count($co_like);?>
				</span> </center></a></div>

				<div class="jumbotron" id="menu_5" style="width:60%;">

				<?php   

			   if($row->username !== $this->session->userdata('username')){?>

				<center>
				  <div class="btn-group" id="btn_list">
				  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				  <span class="glyphicon glyphicon-refresh"></span> Action <span class="caret"></span>
				  </button>

				  <ul class="dropdown-menu" role="menu">
				    <li><a href="#" id="open_sms"><span class="glyphicon glyphicon-envelope"></span> Send Messages</a></li>

				    <li>

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
	                
	                if (in_array($target, $arr)){ ?>

	                <a href="#" id="unfollow_u"><span class="glyphicon glyphicon-refresh" ></span> Unfollow User</a>
	                <a href="#" id="follow_u" style="display:none;"><span class="glyphicon glyphicon-refresh" ></span> Follow User</a>

				   <?php }else{ ?>

					<a href="#" id="follow_u"><span class="glyphicon glyphicon-refresh" ></span> Follow User</a> 
					<a href="#" id="unfollow_u" style="display:none;"><span class="glyphicon glyphicon-refresh" ></span> Unfollow User</a>  	 

				   <?php } ?>

				    </li>

				    <li><a href="#"><span class="glyphicon glyphicon-ban-circle"></span> Block User</a></li>
				    <li><a href="#"><span class="glyphicon glyphicon-exclamation-sign"></span> Report User</a></li>
				  </ul>

				  </div>

				   <input type="hidden" id="to" value="<?php echo $row->username;?>">
				   <input type="hidden" id="from" value="<?php echo $this->session->userdata('username');?>">

			   </center>

			   <?php }else{ ?>

				<a href="" id="edit_pro"><center><span class="glyphicon glyphicon-cog"></span> Edit profile</center></a>

			   <?php } ?>
				</div>
				
			</div>
			<div class="clearfix"></div>

		 <div class="jumbotron" id="following_area" style="display:none;">

		 <?php

		 $this->db->select('following_array');
		 $this->db->where('username',$row->username);
		 $fl_list = $this->db->get('user')->result();

		 foreach($fl_list as $flist){

		 	$listz =  $flist->following_array;
		 	
		 }

		 	$n_listz = explode(",",$listz);
		 	array_shift($n_listz);

		 	foreach($n_listz as $me){

		 	$user =  $me;		

			$this->db->where('username',$user);
			$get_user = $this->db->get('user')->result();

			foreach($get_user as $users){

		?>

		<div class="jumbotron" id="user_f">
		 <br>
		 	 <div class="jumbotron" id="user_cover">
		          <img src="<?php echo base_url();?>cover/<?php echo $users->cover;?>" width="100%" height="110" id="#">
		     </div>

		     <div class="jumbotron" id="user_body">
		     	<img src="<?php echo base_url();?>profile_photo/<?php echo $users->photo;?>" id="user_photo" width="74" height="74" class="img-circle">

		     <table width="100%" border="0">
		     	<tr>
		     	 	<td height="20px;" colspan="2"></td>
		     	</tr>
		     	<tr>
		     		<td><center><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($users->username);?>"><?php echo ucfirst($users->username);?></a></b></center></td>
		     	</tr>
		     	<tr>
		     		<td><center><small>@<?php echo ucfirst($users->username);?></small></center></td>
		     	</tr>
		     	<tr>
		     		<td height="60px;">
		     			<?php echo substr($users->bio,0,100);?>
		     		</td>
		     	</tr>
		     	<tr>
		     		<td>

		     	    <?php if($row->username == $this->session->userdata('username')){ ?>

		     	    <button id="outline">UNFOLLOW</button>

		     	   <?php  }else{ ?>

		     	    <button id="outline">DROP BY</button>

		     	   <?php }
		     	    ?>

		     		</td>
		     	</tr>
		     </table>	

		     </div>

		 </div>
	
		 		
		<?php } }?>


		 <div class="clearfix"></div>
		 <br>
		 <button id="outline">LOAD MORE <span class="glyphicon glyphicon-refresh" ></span></button>
		 </div>


		 <div class="jumbotron" id="follower_area" style="display:none;">

		 <?php

		 $this->db->select('follower_array');
		 $this->db->where('username',$row->username);
		 $fl_list = $this->db->get('user')->result();

		 foreach($fl_list as $flist){

		 	$listz =  $flist->follower_array;
		 	
		 }

		 	$n_listz = explode(",",$listz);
		 	array_shift($n_listz);

		 	foreach($n_listz as $me){

		 	$user =  $me;		

			$this->db->where('username',$user);
			$get_user = $this->db->get('user')->result();

			foreach($get_user as $users){

		?>

		<div class="jumbotron" id="user_f">
		 <br>
		 	 <div class="jumbotron" id="user_cover">
		          <img src="<?php echo base_url();?>cover/<?php echo $users->cover;?>" width="100%" height="110" id="#">
		     </div>

		     <div class="jumbotron" id="user_body">
		     	<img src="<?php echo base_url();?>profile_photo/<?php echo $users->photo;?>" id="user_photo" width="74" height="74" class="img-circle">

		     <table width="100%" border="0">
		     	<tr>
		     	 	<td height="20px;" colspan="2"></td>
		     	</tr>
		     	<tr>
		     		<td><center><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($users->username);?>"><?php echo ucfirst($users->username);?></a></b></center></td>
		     	</tr>
		     	<tr>
		     		<td><center><small>@<?php echo ucfirst($users->username);?></small></center></td>
		     	</tr>
		     	<tr>
		     		<td height="60px;">
		     			<?php echo substr($users->bio,0,100);?>
		     		</td>
		     	</tr>
		     	<tr>
		     		<td>

		     	    <a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($users->username);?>"><button id="outline">DROP BY</button></a>

		     		</td>
		     	</tr>
		     </table>	

		     </div>

		 </div>
	
		 		
		<?php } }?>


		 <div class="clearfix"></div>
		 <br>
		 <button id="outline">LOAD MORE <span class="glyphicon glyphicon-refresh" ></span></button>
		 </div>


		  <div class="row" id="main_post">

		     <div class="col-md-8">

		     		<div id="f_tag">

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
	                
	                if (in_array($target, $arr)){ ?>

		     		<div id="tag"><span class="label label-success">FOLLOWING</span></div>

		     		<?php };?>

		     		</div>

		     		 <div class="jumbotron" id="post" style="display:#;margin-top:2px;" >

		            	


		            	<div class="jumbotron" id="post_body">
		            	<table width="100%" border="0">
		            		<tr>
		            			<td width="10%" style="padding:5px;">

		            			<?php 

		            				$this->db->select('photo');
		            				$this->db->where('username',$this->session->userdata('username'));
		            				$user_p = $this->db->get('user')->result();
		            				foreach($user_p as $userp){}

		            			?>
		            			<img src="<?php echo base_url();?>profile_photo/<?php echo $userp->photo;?>" width="30" height="30" class="img-#">
		            			<div id="status"></div>
		            			</td>

		            			<td>
		            			<textarea class="form-control" id="n_post" rows="3"  placeholder="Share what's new"></textarea>
		            			<input type="hidden" value="<?php echo $row->username;?>" id="user_to">
		            			<input type="hidden" value="<?php echo $this->session->userdata('username');?>" id="user_from">

							    <div id="extra"></div>
							    <input type="hidden" id="emo" value="">
							    <input type="hidden" id="emo_f" value="">				 
		            			</td>
		            		</tr>
		            	</table>
		            	</div>

		            	<div class="jumbotron" id="show_music">
		            		 <textarea id="music" style="width:100%" rows="1" placeholder="Share music from souncloud"></textarea>
		            	</div>

		            	<div class="jumbotron" id="show_video">
		            		 <textarea id="video" style="width:100%" rows="1" placeholder="Share video from youtube"></textarea>
		            	</div>

		            	<div class="jumbotron" id="show_map">
		            		 <textarea id="map" style="width:100%" rows="1" placeholder="Add a visited place"></textarea>
		            	</div>

		            	<div class="jumbotron" id="show_link">
		            		 <textarea id="link" style="width:100%" rows="1" placeholder="Share a link"></textarea>
		            	</div>



		            	<div class="jumbotron" id="upload_photo">

		            		<form method="post" action="" id="upload_file">
					        <input type="file" data-filename-placement="inside" name="userfile" id="userfile">
					        <input type="hidden" value="<?php echo $row->username;?>" id="receiver"> 
					        
					       

		            	</div>


		            	<div class="jumbotron" id="post_footer">

		            		<button type="submit" class="btn btn-default btn-sm" id="ajax_photo" style="background-color:#BF55EC;color:#fff;border:none;" >MEW</button>

		            	    </form>

		            		<button class="btn btn-default btn-sm" id="np_send" style="background-color:#BF55EC;color:#fff;border:none;">MEW</button>		

		            		<div class="btn-group">

						    <button type="button" class="btn btn-default btn-sm"><span id="value">Public</span></button>
						    <input type="hidden" value="public" id="sett_v">

						    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
						    <span class="caret"></span>
						    </button>
						    <ul class="dropdown-menu" role="menu">
						      <li><a href="#" id="pub">Public</a></li>
						      <li><a href="#" id="fr">Follower</a></li>
						    <!--   <li><a href="#" id="onl">Only me</a></li>
						      <li><a href="#" id="cus">Custom</a></li> -->
						    </ul>
						    </div>		


						    <a href="" id="nor_post" style="margin-left:15px" ><i class="fa fa-refresh" style="color:black;width:15px;height:15px;"></i></a>				    

		            		<a href="" id="emotion" style="margin-left:15px" ><img src="<?php echo base_url();?>public/img/smile.png" width="13" height="13"></a>
		            		
		            		<a href="" id="gps" style="margin-left:15px"><img src="<?php echo base_url();?>public/img/mark.png" width="13" height="13"></a>

                            <a href="" id="links" style="margin-left:15px;"><img src="<?php echo base_url();?>public/img/link.png" width="13" height="13"></a>



                           
		            		
		            		<a href="" id="pho_post" style="margin-left:15px"><i class="fa fa-camera" style="color:black;width:15px;height:15px;"></i></a>

                            <a href="" id="v_post" style="margin-left:15px;"><i class="fa fa-youtube" style="color:black;width:15px;height:15px;"></i></a>

                            <a href="" id="mu_post" style="margin-left:15px" ><i class="fa fa-soundcloud" style="color:black;width:15px;height:15px;"></i></a>
		            		

		            	</div>


		            	 <div class="jumbotron" id="emotion_t" style="display:none;">
				          
				        <table width="100%" border="0">
				          <tr>
				            <td><a href="" id="1"><img src="<?php echo base_url();?>emotion/1.gif" width="25" height="25" id="img1"></a></td>
				            <td><a href="" id="2"><img src="<?php echo base_url();?>emotion/2.gif" width="25" height="25" id="img2"></a></td>
				            <td><a href="" id="3"><img src="<?php echo base_url();?>emotion/3.gif" width="25" height="25" id="img3"></a></td>
				            <td><a href="" id="4"><img src="<?php echo base_url();?>emotion/4.gif" width="25" height="25" id="img4"></a></td>
				            <td><a href="" id="5"><img src="<?php echo base_url();?>emotion/5.gif" width="25" height="25" id="img5"></a></td>
				            <td><a href="" id="6"><img src="<?php echo base_url();?>emotion/6.gif" width="25" height="25" id="img6"></a></td>
				            <td><a href="" id="7"><img src="<?php echo base_url();?>emotion/7.gif" width="25" height="25" id="img7"></a></td>
				            <td><a href="" id="8"><img src="<?php echo base_url();?>emotion/8.gif" width="25" height="25" id="img8"></a></td>
				            <td><a href="" id="9"><img src="<?php echo base_url();?>emotion/9.gif" width="25" height="25" id="img9"></a></td>
				            <td><a href="" id="10"><img src="<?php echo base_url();?>emotion/10.gif" width="25" height="25" id="img10"></a></td>
				          </tr>

				          <tr>
				            <td><a href="" id="11"><img src="<?php echo base_url();?>emotion/0.gif" width="25" height="25" id="img11"></a></td>
				            <td><a href="" id="12"><img src="<?php echo base_url();?>emotion/12.gif" width="25" height="25" id="img12"></a></td>
				            <td><a href="" id="13"><img src="<?php echo base_url();?>emotion/13.gif" width="25" height="25" id="img13"></a></td>
				            <td><a href="" id="14"><img src="<?php echo base_url();?>emotion/14.gif" width="25" height="25" id="img14"></a></td>
				            <td><a href="" id="15"><img src="<?php echo base_url();?>emotion/15.gif" width="25" height="25" id="img15"></a></td>
				            <td><a href="" id="16"><img src="<?php echo base_url();?>emotion/16.gif" width="25" height="25" id="img16"></a></td>
				            <td><a href="" id="17"><img src="<?php echo base_url();?>emotion/17.gif" width="25" height="25" id="img17"></a></td>
				            <td><a href="" id="18"><img src="<?php echo base_url();?>emotion/18.gif" width="25" height="25" id="img18"></a></td>
				            <td><a href="" id="19"><img src="<?php echo base_url();?>emotion/19.gif" width="25" height="25" id="img19"></a></td>
				            <td><a href="" id="20"><img src="<?php echo base_url();?>emotion/20.gif" width="25" height="25" id="img20"></a></td>
				          </tr>

				          <tr>
				            <td><a href="" id="21"><img src="<?php echo base_url();?>emotion/21.gif" width="25" height="25" id="img21"></a></td>
				            <td><a href="" id="22"><img src="<?php echo base_url();?>emotion/ok.gif" width="25" height="25" id="img22"></a></td>
				            <td><a href="" id="23"><img src="<?php echo base_url();?>emotion/23.gif" width="25" height="25" id="img23"></a></td>
				            <td><a href="" id="24"><img src="<?php echo base_url();?>emotion/24.gif" width="25" height="25" id="img24"></a></td>
				            <td><a href="" id="25"><img src="<?php echo base_url();?>emotion/25.gif" width="25" height="25" id="img25"></a></td>
				            <td><a href="" id="26"><img src="<?php echo base_url();?>emotion/26.gif" width="25" height="25" id="img26"></a></td>
				            <td><a href="" id="27"><img src="<?php echo base_url();?>emotion/27.gif" width="25" height="25" id="img27"></a></td>
				            <td><a href="" id="28"><img src="<?php echo base_url();?>emotion/28.gif" width="25" height="25" id="img28"></a></td>
				            <td><a href="" id="29"><img src="<?php echo base_url();?>emotion/29.gif" width="25" height="25" id="img29"></a></td>
				            <td><a href="" id="30"><img src="<?php echo base_url();?>emotion/30.gif" width="25" height="25" id="img30"></a></td>
				          </tr>

				          <tr>
				            <td><a href="" id="31"><img src="<?php echo base_url();?>emotion/31.gif" width="25" height="25" id="img31"></a></td>
				            <td><a href="" id="32"><img src="<?php echo base_url();?>emotion/32.gif" width="25" height="25" id="img32"></a></td>
				            <td><a href="" id="33"><img src="<?php echo base_url();?>emotion/no.gif" width="25" height="25" id="img33"></a></td>
				            <td><a href="" id="34"><img src="<?php echo base_url();?>emotion/34.gif" width="25" height="25" id="img34"></a></td>
				            <td><a href="" id="35"><img src="<?php echo base_url();?>emotion/35.gif" width="25" height="25" id="img35"></a></td>
				            <td><a href="" id="36"><img src="<?php echo base_url();?>emotion/36.gif" width="25" height="25" id="img36"></a></td>
				            <td><a href="" id="37"><img src="<?php echo base_url();?>emotion/37.gif" width="25" height="25" id="img37"></a></td>
				            <td><a href="" id="38"><img src="<?php echo base_url();?>emotion/38.gif" width="25" height="25" id="img38"></a></td>
				            <td><a href="" id="39"><img src="<?php echo base_url();?>emotion/39.gif" width="25" height="25" id="img39"></a></td>
				            <td><a href="" id="40"><img src="<?php echo base_url();?>emotion/40.gif" width="25" height="25" id="img40"></a></td>
				          </tr>

				          <tr>
				            <td><a href="" id="41"><img src="<?php echo base_url();?>emotion/41.gif" width="25" height="25" id="img41"></a></td>
				            <td><a href="" id="42"><img src="<?php echo base_url();?>emotion/42.gif" width="25" height="25" id="img42"></a></td>
				            <td><a href="" id="43"><img src="<?php echo base_url();?>emotion/43.gif" width="25" height="25" id="img43"></a></td>
				            <td><a href="" id="44"><img src="<?php echo base_url();?>emotion/44.gif" width="25" height="25" id="img44"></a></td>
				            <td><a href="" id="45"><img src="<?php echo base_url();?>emotion/45.gif" width="25" height="25" id="img45"></a></td>
				            <td><a href="" id="46"><img src="<?php echo base_url();?>emotion/46.gif" width="25" height="25" id="img46"></a></td>
				            <td><a href="" id="47"><img src="<?php echo base_url();?>emotion/47.gif" width="25" height="25" id="img47"></a></td>
				            <td><a href="" id="48"><img src="<?php echo base_url();?>emotion/48.gif" width="25" height="25" id="img48"></a></td>
				            <td><a href="" id="49"><img src="<?php echo base_url();?>emotion/49.gif" width="25" height="25" id="img49"></a></td>
				            <td><a href="" id="50"><img src="<?php echo base_url();?>emotion/54.gif" width="25" height="25" id="img50"></a></td>
				          </tr>

				        </table>
					</div>

		            </div>

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
			          return $string;

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

                   <br>
		           <div class="jumbotron" id="post_feed">
		            
		           <?php 

		           if($this->session->userdata('p_post') == 'A'){

		           $limit = $this->session->userdata('limit');
		           $this->db->limit($limit);
		           $this->db->order_by('id','desc');		     
		           $this->db->where('added_by',$row->username); 
		           $this->db->where('status','on'); 
		           $post =  $this->db->get('post')->result();
		           // echo $this->db->last_query();


		           }else{

		           $this->db->select('post_id');
		           $this->db->where('likers',$row->username);
		           $p_likers = $this->db->get('likes')->result();

		           foreach($p_likers as $likers){

		           $all_like[] =  $likers->post_id;

		           }

		           $limit = $this->session->userdata('limit');
			       $this->db->limit($limit);
			       $this->db->order_by('id','desc');		   

		           foreach($all_like as $likes){

			         $this->db->or_where('id',$likes);  


		          	}

		               $this->db->where('status','on'); 
			           $post =  $this->db->get('post')->result();
			           // echo $this->db->last_query();	

		          }


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
		            	   <img src="<?php echo base_url();?>profile_photo/<?php echo $addp->photo;?>" width="48px" height="48px" class="img-#" id="mini_photo">	
		            	   </td>

		            	   <?php if (!empty($feed->shared_id)){ ?>

		             	   <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($feed->added_by);?>" style="color:black;"><?php echo ucfirst($feed->added_by);?></a></b> ↫ <small>Shared a post</small> 


		             	   <?php } else if (!empty($feed->profile_picture)){ ?>


		             		<td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($feed->added_by);?>" style="color:black;" ><?php echo ucfirst($feed->added_by);?></a> </b> ↫ <small>Change profile photo</small> 


		             	   <?php } else if (!empty($feed->cover_photo)){ ?>


		             	   <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($feed->added_by);?>" style="color:black;"><?php echo ucfirst($feed->added_by);?> </a></b> ↫ <small>Change cover photo</small> 	


		             	   <?php } else if (!empty($feed->user_posted_to AND $feed->user_posted_to!= $this->session->userdata('username'))){ ?>


		             	   <td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($feed->added_by);?>" style="color:black;"><?php echo ucfirst($feed->added_by);?></a> </b> <small style="color:rgb(204,214,221);">@<?php echo ucfirst($feed->added_by);?></small> 	


		             	   <?php }else{ ?>

		            		<td><b><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($feed->added_by);?>" style="color:black;"><?php echo ucfirst($feed->added_by);?></a></b> 
		            			<small style="color:rgb(204,214,221);">@<?php echo ucfirst($feed->added_by);?></small>

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
		  
			         <a href="<?php echo base_url();?>profile/postview/<?php echo $this->session->userdata('username');?>/<?php echo $feed->id;?>"><img class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $feed->photo;?>" width="100%" height="300px;"></a>
			       
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

		             				<img src="<?php echo base_url();?>profile_photo/<?php echo $p_photo->photo;?>" width="35px" height="35px" class="img-rounded">

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

		            <div class="jumbotron" id="feed_like" style="border-top:none;#">
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
		            		<button style="float:right;" id="option"><span class="glyphicon glyphicon-option-horizontal" style="font-size:15px;color:rgb(204,214,221);"></span></button>

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
		            			<!-- <tr> bug with hastag system
		            				<td height="10px;"></td>
		            			</tr>
		            			<tr>
		            				<td>
		            				<input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >	
		            				<button style="width:100%;border:none;border-radius:0px;" class="btn btn-default btn-xs" id="edit_post_button"> Edit post</button>
		            				</td>
		            			</tr> -->
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
		            		<button id="whol" style="color:#8899a6;"> <a href=""><?php echo count($like) ;?></a> POINTS </button>
		            		</td>
		            		<td width="10%">

		            		<?php

		            			$cshare = $this->db->get_where('post',array('shared_id' => $feed->id ))->result();

		            		?>

		            		<input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
		            		<button id="whos" style="color:#8899a6;" > SHARE <a href=""><?php echo count($cshare);?></a></button>
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
		             					<td style="color:#8899a6;">POINTS</td>
		             					<td style="color:#8899a6;">COMMENTS</td>
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

		             				<img style="margin-top:8px;" src="<?php echo base_url();?>profile_photo/<?php echo $s->photo;?>" width="24px" height="24px" class="img-circle">

		             		<?php		}
		             				}

		             			?>
		             		</div>
		             	</div>
		             </div>

		             <style type="text/css">

		             #feed_comment<?php echo $feed->id;?>{

						border-radius: 0px;
						background-color: #f5f8fa;
						margin: 0px;
						border: solid 1px #DDDDDD;
						border-top: none;
						padding: 0px;
						
						}


		             #comment_spot<?php echo $feed->id;?>{

						border-radius: 0px;
						background-color: #DCC6E0;
						margin: 0px;
						border: solid 1px #DDDDDD;
						padding: 10px;
						border-top: none;
						border-bottom: none;

						}


		             #media_preview<?php echo $feed->id;?> {

						 border-radius: 0px;
						 background-color: #f1f1f1;
						 padding: 15px;
						 display: none;
						
						}

		             </style>

		            <div class="jumbotron" id="comment_spot<?php echo $feed->id;?>" style="display:none;" ng-app="">
		             </p>
		            <div class="row" style="padding-left:10px;">
		            	<div class="col-md-1">
		            		<img src="<?php echo base_url();?>profile_photo/<?php echo $row->photo;?>" width="32px" height="32px" class="img-circle">
		            	</div>
		            	<div class="col-md-11">
		            		<textarea rows="2" style="width:100%;" id="comment" class="copy_c<?php echo $feed->id;?>"></textarea>
		            		<div class="jumbotron" id="media_preview<?php echo $feed->id;?>">
		            			
		            		</div>
		            	</div>
		            </div>

		             <input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
		             <textarea rows="2" style="width:100%;display:none;" id="comment" class ="comment<?php echo $feed->id;?>"></textarea> 
		             <button id="submit" class="btn btn-primary" style="float:right;"> Ping </button>
		             <button style="float:right;margin-right:15px;" id="media"><span class="glyphicon glyphicon-camera"></span></button>
		             <button id="cancel" class="btn btn-danger">Close</button>

		             <script type="text/javascript">

		             $(document).ready(function(){
					    $(".copy_c<?php echo $feed->id;?>").on("change keypress input", function() {
					        $(".comment<?php echo $feed->id;?>").text( $(".copy_c<?php echo $feed->id;?>").val() );
					    });    
					}); 

		             </script>

		            </div>
		              
		           <div class="jumbotron" id="feed_comment<?php echo $feed->id;?>" style="display:none;">


		   			<div id="comment_div<?php echo $feed->id;?>">	
		             <table width="100%" border="0">

		             <?php

		             	$this->db->order_by('id','asc');
		          		$com =  $this->db->get_where('comment',array('post_id' => $feed->id))->result();

		          	
		           		foreach ($com as $comment){  ?>
		           		<tr>
		           			<td style="height:5px;"></td>
		           		</tr>
		           		<tr>
		             	<td rowspan="2" width="10%" class="comment_list<?php echo $comment->id;?>">

		             	<?php

		            			$this->db->select('photo');
		            			$this->db->where('username',$comment->added_by);
		            			$com_p = $this->db->get('user')->result();
		            			foreach($com_p as $comp){}	

		            	?>

		             	<center><img src="<?php echo base_url();?>profile_photo/<?php echo $comp->photo;?>" width="30px" height="30px" class="img-circle"></center>

		             	</td>
		             	<td class="comment_list<?php echo $comment->id;?>">
		             	<b id="mini_name"><a href="<?php echo base_url();?>profile/userProfile/<?php echo ucfirst($comment->added_by);?>"><?php echo ucfirst($comment->added_by);?></a></b>
		             	<small style="color:rgb(204,214,221)">@<?php echo ucfirst($comment->added_by);?></small> 
		             	<small id="com_mini"><?php echo humanTiming(strtotime($comment->date_added));?></small>


		             	</td>
		             	</tr>
		             	<tr>
		             	<td class="comment_list<?php echo $comment->id;?>">

		             	<span id="origin<?php echo $comment->id;?>" class="origin">

		             	<?php echo $comment->body;?>
		             	
		             	<?php 
		             	if(!empty($comment->img)){

		             	echo '</p>';
		             	echo $comment->img;

		             	}

		             	?>

		             	</span>	

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
		             		<button id="edit_c"><span class="glyphicon glyphicon-pencil" style="font-size:15px;color:rgb(204,214,221);" ></span> </button>	
		             		</div>	

		             		<div class="col-md-2">
		             		<input type="hidden" value="<?php echo $comment->id;?>" id="comm_id">
		             		<button id="delete_com"><span class="glyphicon glyphicon-remove" style="font-size:15px;color:rgb(204,214,221);"></span></button>	
		             		</div>		

		             		<div class="col-md-4">
		             			
		             		</div>
		             	</div>	
		             	</td>

		             	</div>
		             	</div>
		             	</tr>
		             </tr>	
		             <tr>
		             	<td style="height:5px;"></td>
		             </tr>	         

		           	<?php	}


		             ?>
		             	
		            
		             </table>
		            
		            </div>
		            </div>

		             
		            <br>

		            </div>
		           
		           
		            <?php } ?>

		            <!-- end -->
		          
		            </div>

		            <br>
			        <div class="jumbotron" id="banner_bot" style="border-top:none;">
	                <center><img src="<?php echo base_url();?>public/img/logo.png" width="40" height="40" class="img-circle"></center></p>
	                <center><a href="" id="top">Back to top↑</a></center>
	                </div>

			 		<center><button id="load_more" class="btn btn-default btn-sm" style="color:black;border-color:#ddd;width:100%;">LOAD MORE</button></center>
		     </div>

		     <div class="col-md-4" id="info_side">

		     	   <div class="jumbotron" id="profile_setting">
		     		<div class="row">
		     			<div class="col-md-6"><button class="btn btn-default" id="hideinfo">Cancel</button></div>
		     			<div class="col-md-6"><button class="btn btn-success" id="update_info">Save Changes</button></div>
		     		</div>
		     		</p>
		     		<!-- <input type="text" class="form-control" value="<?php echo $row->username;?>" id="username"></p>   -->
		     		<input type="text" class="form-control" value="<?php echo $row->bio;?>" placeholder="Bio" id="bio"></p>   
		     		<input type="text" class="form-control" value="<?php echo $row->location;?>" placeholder="Location" id="location"></p>  
		     		<input type="text" class="form-control" value="<?php echo $row->websites;?>" placeholder="Website" id="websites"></p>  
		     		<input type="text" class="form-control" value="<?php echo $row->facebook;?>" placeholder="Facebook" id="facebook"></p>  	
		     		<input type="text" class="form-control" value="<?php echo $row->google;?>" placeholder="Google+" id="google"></p>
		     		<input type="text" class="form-control" value="<?php echo $row->twitter;?>" placeholder="Twitter" id="twitter"></p>
		     		<a href="<?php echo base_url();?>profile/profileDesign/<?php echo $row->username;?>"><button class="btn btn-primary"><span class="glyphicon glyphicon-wrench"></span> Advance Profile Settings</button></a>
		     	   </div>

		           <div class="jumbotron" id="side_info">

		           <div id="refresh_info">
		           <?php

		           $info = $this->db->get_where('user',array('username' => $row->username))->result();
		           foreach($info as $i){}

		           ?>
		           <div class="jumbotron" id="date_join"><center><b><a href=""><?php echo ucfirst($row->username);?></a></b> <small>@<?php echo ucfirst($row->username);?></small></center></div>
		           <div class="jumbotron" id="date_join">
		           	
		           <center><?php echo $i->bio;?></center>

		           </div>

		           <div class="jumbotron" id="date_join">
		           <table width="100%" border="0">
		           		<tr>
		           			<td><center><span class="glyphicon glyphicon-time"></span></center></a></td>
		           			<td><center>Joined <?php echo $i->registerdate;?></center></td>
		           		</tr>
		           		<tr>
		           			<td height="10px;"></td>
		           		</tr>
		           		<tr>
		           			<td width="10%"><center><img src="<?php echo base_url();?>public/img/link.png" width="15" height="15"></canter></td>
		           			<td><center><a href=""><?php echo $i->websites;?></center></a></td>
		           		</tr>
		           </table>		           
		           </div>
		           <div class="jumbotron" id="date_join">		         	           
		          
		           <table width="100%">

		          	<tr>
		          		<td><a href="http://<?php echo $i->facebook;?>"><center><img src="<?php echo base_url();?>public/img/facebook.png" width="36" height="36"></center></td>
		          		<td><a href="http://<?php echo $i->google;?>"><center><img src="<?php echo base_url();?>public/img/google.ico" width="32" height="32"></center></td>
		          		<td><a href="http://<?php echo $i->twitter;?>"><center><img src="<?php echo base_url();?>public/img/twitter.png" width="38" height="38"></center></td>
		          	</tr>
		           	
		           </table>

		           </div>

		           </div>

		           </div>	

		          <div class="jumbotron style" id="hash_body">

					<table width="100%" border="0">
					<tr>
						<td style="color: #66757f;font-size: 18px;font-weight: 300;"> <center><small>TRENDING</small></center> </td>
					</tr>
					<?php

					  $this->db->limit(10);
					  $this->db->order_by('total','desc');
					  $trend = $this->db->get('tag')->result();

					  foreach($trend as $tag_list){ ?>

					  <tr>
					  	<td><a href="<?php echo base_url();?>profile/hashtagView/<?php echo $tag_list->tag;?>"><b>#<?php echo ucfirst($tag_list->tag);?></b></a></td>
					  </td>

					  <?php }?>	

					 </table>

					</div>

				  <div class="jumbotron" id="other_user"> 
					<div class="jumbotron" id="ou_head" style="display:none;"><center>Other people</center></div>
					<div class="jumbotron style" id="ou_body">
					
					<table width="100%" border="0">

					<tr>
						<td colspan="3"><hr></td>
					</tr>

					<?php

					$this->db->limit(2);
					$this->db->where('username !=',$this->session->userdata('username'));
					$other = $this->db->get('user')->result();
					foreach ($other as $g_other){ ?>

					<tr>
						<td rowspan="2" width="25%"><img src="<?php echo base_url();?>profile_photo/<?php echo $g_other->photo;?>" width="50px" height="50px"></td>
						<td style="color:#1dcaff"><?php echo strtoupper($g_other->username);?></td>
						<td><span class="glyphicon glyphicon-remove" style="float:right;font-size:8px;"></span></td>
					</tr>
					<tr>
						<td width="33.3%">@<?php echo $g_other->username;?></td>
						<td width="33.3%"><a href="<?php echo base_url();?>profile/userProfile/<?php echo $g_other->username;?>"><button class="btn btn-default btn-xs">DROP BY</button></a></td>
							
					</tr>
					<tr>
						<td colspan="3"><hr></td>
					</tr>

					<?php }?>

					</table>

					</div>
				</div>

		     </div>
		
	    </div>
		</div>
		</div>
		<div class="col-md-1">
	
			<a class="js-open-modal" href="#" data-modal-id="popup"  id="click_me"></a>
			<a class="js-open-modal" href="#" data-modal-id="popup2" id="success"></a>
			<a class="js-open-modal" href="#" data-modal-id="popup3" id="notis"></a>
			<a class="js-open-modal" href="#" data-modal-id="popup4" id="misij"></a>

		</div>

      </div>
    </div>
  </div>
  <!-- /#page-content-wrapper --> 
  
</div>

</body>
</html>

<!-- PHOTO UPLOAD -->
<div style="display:none;">
    <form method="post" action="#" id="upload_photoz" name="upload_photoz">
      <input type="file" data-filename-placement="inside" name="userfile" id=
      "userphoto" /> <input type="hidden" value="<?php echo $row->username;?>" id=
      "receiver" /> <button type="submit" id="profile_update">Post</button>
    </form>
  </div>

  <div style="display:none;">
    <form method="post" action="#" id="upload_coverz" name="upload_coverz">
      <input type="file" data-filename-placement="inside" name="userfile" id=
      "usercover" /> <input type="hidden" value="<?php echo $row->username;?>" id=
      "receiver" /> <button type="submit" id="cover_update">Post</button>
    </form>
  </div>

  <div style="display:none;">
    <form method="post" action="#" id="upload_com" name="upload_com">
      <input type="file" data-filename-placement="inside" name="userfile" id=
      "usercom" /> <input type="hidden" value="<?php echo $row->username;?>" id=
      "receiver" /> <button type="submit" id="com_photo">Post</button>
    </form>
  </div>
  
<!-- END PHOTO UPLOAD -->

<!-- RECIEVER -->
<input type="hidden" value="" id="to">
<input type="hidden" value="<?php echo $this->session->userdata('username');?>" id="from">

<!-- END -->


<!-- MESSAGE MODEL BOX -->
<div id="popup" class="modal-box" style="position:fixed">  
  <header style="background-color:#f7f7f7;">
    <a href="#" class="js-modal-close close" id="close_box">×</a>
    <h3>Send Message to : <span id="sms_to"><?php echo $row->username;?></span></h3>
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

<section id="open_chat">

<script type="text/javascript">

				setInterval(function(){
				    $("#user_activity").load(location.href + " #user_activity");
				}, 25000);
			     
				</script>

				<div class="jumbotron" id="user_activity"> 
					<div class="jumbotron" id="ac_head" style="border-top:1px solid #ddd;">

					<center><button id="down" class="animate btn btn-default btn-xs"><i class="fa fa-arrow-down"></i></button></center>
					<center><button class="animate2 btn btn-default btn-xs" style="display:none;"><i class="fa fa-arrow-up"></i></button></center>

					<script type="text/javascript">

					$(function(){

						$('#burger').click(function(){
							
						$('#down').click();	

						});

						// $('#down').click();
					});

					</script>

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


							<a href="" style="color:black"><b><?php echo ucfirst($from);?></b></a>

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
						<td width="70%" style="color:black"> <div id="on_logo"></div> <?php echo ucfirst($chat->username);?> <small style="color:rgb(204,214,221);">@<?php echo $chat->username;?></small></td>
					</tr>
					<tr>
						<td width="70%;">

						<input type="hidden" value="<?php echo $chat->username;?>" id="t_user">
						<button class="send_msg btn btn-default btn-xs"><i class="fa fa-comment"></i></button>

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



<input type="hidden" id="current_id" value="<?php echo $this->session->userdata('com_id');?>">
<input type="hidden" id="img_src" value="">