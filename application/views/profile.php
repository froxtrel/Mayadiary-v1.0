<?php foreach($user as $row){}?>


<nav class="navbar navbar-inverse navbar-fixed-top" id="main_nav">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>public/img/logo.png" width="24" height="24" class="img-circle" style="border:2px solid #fff;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li> 
      </ul>
    </div>
  </div>
</nav>
<body>
<div class="container" style="margin-top:20px;">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="jumbotron" id="main_wrap">
					
			<div class="jumbotron" id="cover_photo">
			<img src="<?php echo base_url();?>cover/default.jpg" width="100%" height="210" id="main_cover">	
			<table width="100%" border="0">
				<tr>
					<td width="25%"><img src="<?php echo base_url();?>uploads/1.jpg" width="100%" height="220" id="photo1"></td>
					<td width="25%"><img src="<?php echo base_url();?>uploads/2.jpg" width="100%" height="220" id="photo2"></td>
					<td width="25%"><img src="<?php echo base_url();?>uploads/3.png" width="100%" height="220" id="photo3"></td>
					<td width="25%"><img src="<?php echo base_url();?>uploads/4.jpg" width="100%" height="220" id="photo4"></td>
			</table>
			</div>

			<img src="<?php echo base_url();?>profile_photo/default.jpg" width="120" height="120" id="profile_photo" class="img-circle">	
			<span id="profile_name"><?php echo ucfirst($row->username);?></span>

			<div class="jumbotron" id="profile_menu">

				<div class="jumbotron" id="menu_1"><a href=""><center>Timeline</center></a></div>
				<div class="jumbotron" id="menu_2"><a href=""><center>1 Friends</center></a></div>
				<div class="jumbotron" id="menu_3"><a href=""><center>1 Followers</center></a></div>
				<div class="jumbotron" id="menu_4"><a href=""><center>0 Photos</center></a></div>
				<div class="jumbotron" id="menu_5"><a href=""><center>0 Blog</center></a></div>
				
			</div>
			<div class="clearfix"></div>

		  <div class="row">

		     <div class="col-md-8">

		            <div class="jumbotron" id="post">

		            	<div class="jumbotron" id="post_header">

		            	<a href=""><b style="color:black;"><img src="<?php echo base_url();?>public/img/posts.png" width="20" height="20" ></b></a>	

		            	</div>


		            	<div class="jumbotron" id="post_body">
		            	<table width="100%" border="0">
		            		<tr>
		            			<td width="10%" style="padding:5px;"><img src="<?php echo base_url();?>profile_photo/default.jpg" width="30" height="30" class="img-circle"></td>
		            			<td>
		            			<textarea class="form-control" id="n_post" cols="2" placeholder="Share what's new"></textarea>
		            			<input type="hidden" value="<?php echo $row->username;?>" id="user_to">
		            			<input type="hidden" value="<?php echo $this->session->userdata('username');?>" id="user_from">
		            			</td>
		            		</tr>
		            	</table>
		            	</div>

		            	<div class="jumbotron" id="post_footer">
		            		<button class="btn btn-success btn-sm" id="np_send">Post</button>
		            		<button class="btn btn-default btn-sm" id="visib">Friends</button>
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

		           $this->db->order_by('id','desc');
		           $post =  $this->db->get('post')->result();
		         
		           foreach ($post as $feed){ 

		           $like = $this->db->get_where('likes',array('post_id' => $feed->id,'value' => '1' ))->result_array();
		           
		           	?>

		            <div id="<?php echo $feed->id;?>">

		            <div class="jumbotron" id="feed_head">       

		            <table width="100%" border="0">
		            	<tr>
		            		<td rowspan="2" width="15%">
		            			<img src="<?php echo base_url();?>profile_photo/default.jpg" width="48px" height="48px" class="img-circle">	
		            		</td>
		            		<td><b><?php echo ucfirst($feed->added_by);?></b> 

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
		            		<td><span class="glyphicon glyphicon-time"></span><small> About <?php echo humanTiming(strtotime($feed->date_added));?> ago</small></td>
		            	</tr>
		            </table>
		            </div>

		            <div class="jumbotron" id="feed_body">
		            	<?php echo $feed->body;?>


		            	<div id="editpost<?php echo $feed->id;?>" style="display:none;">
		             	<textarea style="width:100%;" id="edit_post"><?php echo $feed->body;?></textarea>

		             	<input type="hidden" value="<?php echo $feed->id;?>" id="feed_id">
		             	<button class="btn btn-success btn-xs" id="post_e">Done editing</button>

		             	<button class="btn btn-danger btn-xs" id="cancel_pe">Cancel</button>
		             	</div>

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
		            		<input type="hidden" value="<?php echo $feed->id;?>" id="feed_id" >
		            		<button id="whos">↫ Share 1</button>
		            		</td>
		            	</tr>
		         
		            </table>
		            	
		            </div>

		             <div class="jumbotron" id="feed_comment">
		   				
		             <table width="100%" border="0">

		             <?php

		             	$this->db->order_by('id','desc');
		          		$com =  $this->db->get_where('comment',array('post_id' => $feed->id))->result();

		          	
		           		foreach ($com as $comment){  ?>

		           		<tr>
		             	<td rowspan="2" width="6%"><img src="<?php echo base_url();?>profile_photo/default.jpg" width="30px" height="30px" class="img-circle">	</td>
		             	<td>
		             	<b><?php echo ucfirst($comment->added_by);?></b>

		             	<input type="hidden" value="<?php echo $comment->id;?>" id="comm_id">
		             	<button id="delete_com">X </button>

		             	</td>
		             	</tr>
		             	<tr>
		             	<td>

		             	<span id="origin<?php echo $comment->id;?>"><?php echo $comment->body;?></span>	

		             	<div id="<?php echo $comment->id;?>" style="display:none;">
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
		             	<span class="glyphicon glyphicon-time"></span><small> About <?php echo humanTiming(strtotime($comment->date_added));?> ago</small>

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

			
		     </div>

		     <div class="col-md-4">

		           <div class="jumbotron" id="side_info"></div>
			
		    </div>
		
	    </div>
		</div>
		</div>
		<div class="col-md-1"></div>
	</div>

	

</div>

</body>

