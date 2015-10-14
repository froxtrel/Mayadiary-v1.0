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

<div id="wrapper">
  <div class="overlay"></div>
  
  <!-- Sidebar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
      <li class="sidebar-brand"> <a href="#"><img src="<?php echo base_url();?>public/img/logo.png" width="40" height="40" class="img-circle" style="border:2px solid #fff;"> <span class="maya">MayaDiary</span></a> </li>
      <li> <a href="<?php echo base_url();?>home/goHome" class="style"><i class="fa fa-fw fa-home">  		</i> Home  </a> </li>
      <li> <a href="<?php echo base_url();?>profile/userProfile/<?php echo $this->session->userdata('username');?>" class="style"><i class="fa fa-fw fa-user"></i> Profile </a> </li>
      <li> <a href="<?php echo base_url();?>profile/photoshow/<?php echo $this->session->userdata('username');?>" class="style"><i class="fa fa-fw fa-picture-o">  		</i> Photos  </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-video-camera">  	</i> Video   </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-music">     		</i> Music   </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-pencil-square-o">  </i> Blogs   </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-bullhorn"> 		</i> Forums  </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-users">			</i> Groups  </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-gamepad"> 			</i> Games   </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-calendar"> 		</i> Events  </a> </li>
      <li> <a href="#" class="style"><i class="fa fa-fw fa-wrench"> 		    </i> Settings  </a> </li>
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
		<div class="col-md-10">
			<div class="jumbotron" id="main_wrap">

    		  <div class="row">

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

		            <div class="jumbotron" id="post">

		            	<div class="jumbotron" id="post_header">

			              <a href="" id="nor_post"><img src="<?php echo base_url();?>public/img/posts.png" width="15" height="15" ><small id="sta" class="style"> Status </small></a>	
			              
			              <a href="" id="pho_post" style="margin-left:10px;"><img src="<?php echo base_url();?>public/img/photo.png" width="19" height="19"> <small id="pho" class="style"> Photo </small></a>

					      <a href="" id="v_post" style="margin-left:10px;"><img src="<?php echo base_url();?>public/img/video.png" width="15" height="15" > <small id="vi" class="style"> Video </small></a>

					      <a href="" id="mu_post" style="margin-left:10px;"><img src="<?php echo base_url();?>public/img/music.png" width="15" height="15"> <small id="mu" class="style"> Music </small></a>


		            	</div>


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

		            		<button type="submit" class="btn btn-success btn-sm" id="ajax_photo">Post</button>

		            	    </form>

		            		<button class="btn btn-success btn-sm" id="np_send">Post</button>		

		            		<div class="btn-group">

						    <button type="button" class="btn btn-default btn-sm"><span id="value">Public</span></button>
						    <input type="hidden" value="public" id="sett_v">

						    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
						    <span class="caret"></span>
						    </button>
						    <ul class="dropdown-menu" role="menu">
						      <li><a href="#" id="pub">Public</a></li>
						      <li><a href="#" id="fr">Friends</a></li>
						      <li><a href="#" id="onl">Only me</a></li>
						      <li><a href="#" id="cus">Custom</a></li>
						    </ul>
						    </div>						    

		            		<a href="" id="emotion" style="margin-left:10px" ><img src="<?php echo base_url();?>public/img/smile.png" width="15" height="15"></a>
		            		
		            		<a href="" id="gps" style="margin-left:10px"><img src="<?php echo base_url();?>public/img/mark.png" width="15" height="15"></a>

                            <a href="" id="links" style="margin-left:10px;"><img src="<?php echo base_url();?>public/img/link.png" width="15" height="15"></a>

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



		           <div class="jumbotron" id="post_feed">

		            <!-- post -->
		            
		           <?php 

		           $status = $this->session->userdata('post');

		           if($status == 'A'){

		           $limit = $this->session->userdata('limit');
		           $this->db->limit($limit);
		           $this->db->order_by('id','desc');	
		           $this->db->where('type','public');	      
		           $this->db->where('status','on'); 
		           $post =  $this->db->get('post')->result();

		            }else if($status == 'F'){


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
		           $this->db->limit($limit);
		           $this->db->order_by('id','desc');

		           foreach($arr as $fren){

		           $this->db->or_where('added_by',$fren);
		         
		           }

		           $this->db->where('type','public');	      
		           $this->db->where('status','on'); 
		           $post =  $this->db->get('post')->result();

		           // echo $this->db->last_query();

		           }else if($status == 'P'){

		           $limit = $this->session->userdata('limit');
		           $this->db->limit($limit);
		           $this->db->where('photo !=','');
		           $this->db->order_by('id','desc');	
		           $this->db->where('type','public');	      
		           $this->db->where('status','on'); 
		           $post =  $this->db->get('post')->result();


		           }else if($status == 'M'){

		           $limit = $this->session->userdata('limit');
		           $this->db->limit($limit);
		           $this->db->where('music !=','');
		           $this->db->order_by('id','desc');	
		           $this->db->where('type','public');	      
		           $this->db->where('status','on'); 
		           $post =  $this->db->get('post')->result();


		           }else{

		           $limit = $this->session->userdata('limit');
		           $this->db->limit($limit);
		           $this->db->where('video !=','');
		           $this->db->order_by('id','desc');	
		           $this->db->where('type','public');	      
		           $this->db->where('status','on'); 
		           $post =  $this->db->get('post')->result();


		           }

		           

		           foreach ($post as $feed){ 

		           $like = $this->db->get_where('likes',array('post_id' => $feed->id,'value' => '1' ))->result_array();
		           
		           ?>

		            <div id="<?php echo $feed->id;?>">

		            <div class="jumbotron" id="feed_head" style="border-top-right-radius:5px;" >       

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

		             <div class="jumbotron" id="feed_comment" style="border-bottom-right-radius:5px;border-bottom-left-radius:5px;">
		   				
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

		           	<?php	}


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
			  <center><button id="load_more" class="btn btn-warning btn-sm">LOAD MORE</button></center>
		     </div>

		     <div class="col-md-4" id="info_side">

		    	<div class="btn-group-vertical jumbotron" id="filter">
				  <button type="button" class="btn btn-default style" style="width:280px;" id="a_p"><span class="glyphicon glyphicon-list-alt" style="float:left;"></span>Newsfeed</button>
				  <button type="button" class="btn btn-default style" id="f_p"><span class="glyphicon glyphicon-user" style="float:left;"></span>Following</button>
				  <button type="button" class="btn btn-default style" id="p_p"><span class="glyphicon glyphicon-picture" style="float:left;"></span>Photo</button>
				  <button type="button" class="btn btn-default style" id="m_p"><span class="glyphicon glyphicon-volume-up" style="float:left;"></span>Music</button>
				  <button type="button" class="btn btn-default style" id="v_p"><span class="glyphicon glyphicon-film" style="float:left;"></span>Video</button>
				</div>

				<script type="text/javascript">

				setInterval(function(){
				    $("#user_activity").load(location.href + " #user_activity");
				}, 25000);
			     
				</script>

				<div class="jumbotron" id="user_activity"> 
					<div class="jumbotron" id="ac_head"><center class="style">Activity</center></div>
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

			            if($active->from_who == $this->session->userdata('username')){

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


							<a href=""><b><?php echo ucfirst($from);?></b></a>

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

							  <?php }else{?>


							  <td><?php echo ucfirst($active->owner);?> updated his <a href="<?php echo base_url();?>profile/statusView/<?php echo $row->username;?>/<?php echo $active->post_id;?>">status</a></td>

							  <?php } ?>

						</tr>
						<tr>
							<td height="1px" colspan="2"><hr></td>
						</tr>
					    </table>

			            <?php endforeach; ?>

					</div>
				</div>

				<div class="jumbotron" id="other_user"> 
					<div class="jumbotron" id="ou_head"><center class="style">Other people</center></div>
					<div class="jumbotron style" id="ou_body"></div>
				</div>

				<div class="jumbotron" id="t_hash"> 
					<div class="jumbotron" id="hash_head"><center class="style">Trending #</center></div>
					<div class="jumbotron style" id="hash_body"></div>
				</div>
						         	
		     </div>
		
	    </div>
		</div>
		</div>
		<div class="col-md-1">
	
			<a class="js-open-modal" href="#" data-modal-id="popup"  id="click_me"></a>
			<a class="js-open-modal" href="#" data-modal-id="popup2" id="success"></a>

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
<!-- END PHOTO UPLOAD -->

<!-- MESSAGE MODEL BOX -->
<div id="popup" class="modal-box">  
  <header style="background-color:#f7f7f7;">
    <a href="#" class="js-modal-close close">×</a>
    <h3>Send Message to : <?php echo $row->username;?></h3>
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
<div id="popup2" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <h3><center>Message sent successfully</center></h3>
  </header>
  <div class="modal-body">
  <!-- empty -->
  </div>
  <center><a href="#" class="btn btn-small js-modal-close"><button class="btn btn-success btn-sm">Close</button></a></center> 
</div>
<!-- END MODAL 2 -->

<!-- CHAT PANEL -->

<section id="open_chat"><center>CHAT BOX</center></section>

<!-- END -->