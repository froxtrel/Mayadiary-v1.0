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
        <li><a href="#"></a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <?php 

		  $this->db->select('photo');
		  $this->db->where('username',$this->session->userdata('username'));
		  $you_p = $this->db->get('user')->result();
		  foreach($you_p as $youp){}

		  ?>
        <li><a href="<?php echo base_url();?>profile/userProfile/<?php echo $this->session->userdata('username');?>">
            <img src="<?php echo base_url();?>profile_photo/<?php echo $youp->photo;?>" width="24" height="24" class="img-circle" style="border:2px solid #fff;"></a></li>
        <li><a href="<?php echo base_url();?>login/logout" style="color:#fff;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<body>

     <div class="container" style="margin-top:65px;">
     	<div class="row" style="background-color:rgba(255,255,255,0.3);min-height:720px;">
     		<div class="col-md-3" >
     			
     		<div class="jumbotron" id="part_2" style="margin-top:25px;">

     			<div class="jumbotron" id="profile_cover">
     			    <img src="<?php echo base_url();?>cover/<?php echo $row->cover;?>" width="100%" height="110" id="main_cover">
     			</div>

     			<div class="jumbotron" id="profile_view">
     				<img src="<?php echo base_url();?>profile_photo/<?php echo $youp->photo;?>" id="set_photo" width="74" height="74" class="img-circle">
     				<center><?php echo ucfirst($row->username);?></center>
     			</div>

     		</div>	

     		<div class="jumbotron" id="d_menu1">

     		<button class="btn btn-default" id="acc" style="width:100%"><span style="float:left;">Account</span> <span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

     		<button class="btn btn-default" id="pri" style="width:100%"><span style="float:left;">Privacy</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

     		<button class="btn btn-default" id="em" style="width:100%"><span style="float:left;">Email notification</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

     		<button class="btn btn-default" id="web" style="width:100%"><span style="float:left;">Web notification</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

     		<button class="btn btn-default" id="find" style="width:100%"><span style="float:left;">Find Friends</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

     		<button class="btn btn-default" id="veri" style="width:100%"><span style="float:left;">Verify accounts</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

     		<button class="btn btn-default" id="block" style="width:100%"><span style="float:left;">Blocked accounts</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

     		<button class="btn btn-default" id="part" style="width:100%"><span style="float:left;">Design</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>
     		</div> 

     		<script type="text/javascript">

            $(function(){



            });
		  

     		</script>

     		</div>

     		<div class="col-md-6">

     		<!-- ACCOUNT SETTINGS -->
     		<div class="jumbotron" id="account_set" style="margin-top:25px;display:#;">
     		    <div class="jumbotron" id="acc_head">
     		    	<center>Account</center>
     		    </div>
     		    <div class="jumbotron" id="acc_body">
     		    	<table width="100%" border="0">

     		    	    <tr>
     		    			<td height="25px;"></td>
     		    		</tr>
     		    		<tr>
     		    			<td width="30%"><center>Username</center></td>
     		    			<td><input type="text" value="<?php echo $row->username;?>"class="form-control" id="a_user"></td>
     		    			<td width="10%"></td>
     		    		</tr>
     		    		<tr>
     		    			<td height="15px;"></td>
     		    		</tr>
     		    		<tr>
     		    			<td width="30%"><center>Email</center></td>
     		    			<td><input type="text" value="<?php echo $row->email;?>" class="form-control" id="a_email">
     		    			<small>Email will not be publicly displayed. </small></td>
     		    			<td width="10%"></td>
     		    		</tr>
     		    		<tr>
     		    			<td height="15px;"></td>
     		    		</tr>
     		    		<tr>
     		    			<td width="30%"><center>Language</center></td>
     		    			<td><input type="text" value="<?php echo $row->lang;?>" class="form-control" id="a_lang"></td>
     		    			<td width="10%"></td>
     		    		</tr>
     		    		<tr>
     		    			<td height="15px;"></td>
     		    		</tr>
     		    	</table>
     		    	<hr>
     		    	<center>Content</center>
     		    	<table width="100%" border="0"> 		    		
     		    	    <tr>
     		    			<td height="25px;"></td>
     		    		</tr>
     		    		<tr>
     		    			<td width="30%"><center>Country</center></td>
     		    			<td>
     		    				<select class="form-control" id="country">

                                  <option value="xx">Worldwide</option>
								  <option value="al">Albania</option>
								  <option value="ar">Argentina</option>
								  <option value="am">Armenia</option>
								  <option value="au">Australia</option>
								  <option value="at">Austria</option>
								  <option value="az">Azerbaijan</option>
								  <option value="bs">Bahamas</option>
								  <option value="bh">Bahrain</option>
								  <option value="bd">Bangladesh</option>
								  <option value="by">Belarus</option>
								  <option value="be">Belgium</option>
								  <option value="bz">Belize</option>
								  <option value="bo">Bolivia</option>
								  <option value="ba">Bosnia &amp; Herzegovina</option>
								  <option value="br">Brazil</option>
								  <option value="bg">Bulgaria</option>
								  <option value="kh">Cambodia</option>
								  <option value="ca">Canada</option>
								  <option value="ky">Cayman Islands</option>
								  <option value="cl">Chile</option>
								  <option value="co">Colombia</option>
								  <option value="cr">Costa Rica</option>
								  <option value="hr">Croatia</option>
								  <option value="cu">Cuba</option>
								  <option value="cy">Cyprus</option>
								  <option value="cz">Czech Republic</option>
								  <option value="dk">Denmark</option>
								  <option value="do">Dominican Republic</option>
								  <option value="ec">Ecuador</option>
								  <option value="eg">Egypt</option>
								  <option value="sv">El Salvador</option>
								  <option value="ee">Estonia</option>
								  <option value="et">Ethiopia</option>
								  <option value="fi">Finland</option>
								  <option value="fr">France</option>
								  <option value="ge">Georgia</option>
								  <option value="de">Germany</option>
								  <option value="gh">Ghana</option>
								  <option value="gr">Greece</option>
								  <option value="gt">Guatemala</option>
								  <option value="gy">Guyana</option>
								  <option value="ht">Haiti</option>
								  <option value="hn">Honduras</option>
								  <option value="hk">Hong Kong SAR China</option>
								  <option value="hu">Hungary</option>
								  <option value="is">Iceland</option>
								  <option value="in">India</option>
								  <option value="id">Indonesia</option>
								  <option value="ir">Iran</option>
								  <option value="iq">Iraq</option>
								  <option value="ie">Ireland</option>
								  <option value="il">Israel</option>
								  <option value="it">Italy</option>
								  <option value="jm">Jamaica</option>
								  <option value="jp">Japan</option>
								  <option value="jo">Jordan</option>
								  <option value="kz">Kazakhstan</option>
								  <option value="ke">Kenya</option>
								  <option value="kw">Kuwait</option>
								  <option value="la">Laos</option>
								  <option value="lv">Latvia</option>
								  <option value="lb">Lebanon</option>
								  <option value="lt">Lithuania</option>
								  <option value="lu">Luxembourg</option>
								  <option value="my" selected="">Malaysia</option>
								  <option value="mv">Maldives</option>
								  <option value="mt">Malta</option>
								  <option value="mx">Mexico</option>
								  <option value="mn">Mongolia</option>
								  <option value="ma">Morocco</option>
								  <option value="nl">Netherlands</option>
								  <option value="nz">New Zealand</option>
								  <option value="ni">Nicaragua</option>
								  <option value="ng">Nigeria</option>
								  <option value="no">Norway</option>
								  <option value="om">Oman</option>
								  <option value="pk">Pakistan</option>
								  <option value="pa">Panama</option>
								  <option value="py">Paraguay</option>
								  <option value="pe">Peru</option>
								  <option value="ph">Philippines</option>
								  <option value="pl">Poland</option>
								  <option value="pt">Portugal</option>
								  <option value="qa">Qatar</option>
								  <option value="ro">Romania</option>
								  <option value="ru">Russia</option>
								  <option value="sa">Saudi Arabia</option>
								  <option value="rs">Serbia</option>
								  <option value="sg">Singapore</option>
								  <option value="sk">Slovakia</option>
								  <option value="si">Slovenia</option>
								  <option value="za">South Africa</option>
								  <option value="kr">South Korea</option>
								  <option value="es">Spain</option>
								  <option value="lk">Sri Lanka</option>
								  <option value="sr">Suriname</option>
								  <option value="se">Sweden</option>
								  <option value="ch">Switzerland</option>
								  <option value="tw">Taiwan</option>
								  <option value="tz">Tanzania</option>
								  <option value="th">Thailand</option>
								  <option value="tt">Trinidad &amp; Tobago</option>
								  <option value="tn">Tunisia</option>
								  <option value="tr">Turkey</option>
								  <option value="ug">Uganda</option>
								  <option value="ua">Ukraine</option>
								  <option value="ae">United Arab Emirates</option>
								  <option value="gb">United Kingdom</option>
								  <option value="us">United States</option>
								  <option value="uy">Uruguay</option>
								  <option value="uz">Uzbekistan</option>
								  <option value="ve">Venezuela</option>
								  <option value="vn">Vietnam</option>
								  <option value="zm">Zambia</option>
								  <option value="zw">Zimbabwe</option>

                            </select>
     		    			</td>
     		    			<td width="10%"></td>
     		    		</tr>
     		    		<tr>
     		    			<td height="15px;"></td>
     		    		</tr>
     		    		<tr>
     		    			<td width="30%"><center>Video</center></td>
     		    			<td>
     		    				<select class="form-control" id="video_set">
     		    					<option>Enable Autoplay</option>
     		    					<option>Disable Autoplay</option>
     		    				</select>
     		    				<small>Videos will automatically play.</small>
     		    			</td>
     		    			<td width="10%"></td>
     		    		</tr>
     		    		<tr>
     		    			<td height="25px;"></td>
     		    		</tr>
     		    		<tr>
     		    			<td width="30%"></td>
     		    			<td><button class="btn btn-primary" id="account_up">Save Changes</button></td>
     		    			<td width="10%"></td>
     		    		</tr>
     		    	</table>
     		    	<hr>
     		    	<center><a href="">Deactive my account</a></center>
     		    	<br>
     		    	<br>
     		    	<br>
     		    </div>
     		</div>
     		<!-- END ACCOUNT SETTINGS -->

     		<!-- PRIVACY SETTINGS -->
     		<div class="jumbotron menu" id="privacy_set" style="margin-top:25px;display:none;">
     		<div class="jumbotron" id="privacy_head"><center>Privacy and confidentiality</center></div>
     		<br>
     		<div class="jumbotron" id="privacy_body">
     		 <table width="90%" border="0">
     		 	<tr>
     		 		<td width="30%;">Who can see my profile</td>
     		 		<td>
     		 		<select class="form-control" id="w_profile">
     		 		<option>Everyone</option>
     		 		<option>Followers</option>	
     		 		<option>Only me</option>
     		 		</select></td>
     		 	</tr>
     		 	<tr>
     		 		<td height="15px;"></td>
     		 	</tr>
     		 	<tr>
     		 		<td width="30%;">Who can Follow you</td>
     		 		<td>
     		 		<select class="form-control" id="w_follow">
     		 		<option>Everyone</option>
     		 		<option>Followers</option>	
     		 		<option>Only me</option>
     		 		</select></td>
     		 	</tr>
     		 	<tr>
     		 		<td height="15px;"></td>
     		 	</tr>
     		 	<tr>
     		 		<td width="30%;">Who can contact me</td>
     		 		<td>
     		 		<select class="form-control" id="w_contact">
     		 		<option>Everyone</option>
     		 		<option>Followers</option>	
     		 		<option>Only me</option>
     		 		</select></td>
     		 	</tr>
     		 	<tr>
     		 		<td height="15px;"></td>
     		 	</tr>
     		 	<tr>
     		 		<td width="30%;">Who can see my photos</td>
     		 		<td>
     		 		<select class="form-control" id="w_photos">
     		 		<option>Everyone</option>
     		 		<option>Followers</option>	
     		 		<option>Only me</option>
     		 		</select></td>
     		 	</tr>
     		 	<tr>
     		 		<td height="15px;"></td>
     		 	</tr>
     		 	<tr>
     		 		<td width="30%;">Who can see my video</td>
     		 		<td>
     		 		<select class="form-control" id="w_video">
     		 		<option>Everyone</option>
     		 		<option>Followers</option>	
     		 		<option>Only me</option>
     		 		</select></td>
     		 	</tr>
     		 	<tr>
     		 		<td height="15px;"></td>
     		 	</tr>
     		 	<tr>
     		 		<td width="30%;">Who can see my music</td>
     		 		<td>
     		 		<select class="form-control" id="w_music">
     		 		<option>Everyone</option>
     		 		<option>Followers</option>	
     		 		<option>Only me</option>
     		 		</select></td>
     		 	</tr>
     		 	<tr>
     		 		<td height="15px;"></td>
     		 	</tr>
     		 	<tr>
     		 		<td width="30%;">Who can see your Birth Date</td>
     		 		<td>
     		 		<select class="form-control" id="w_bday">
     		 		<option>Everyone</option>
     		 		<option>Followers</option>	
     		 		<option>Only me</option>
     		 		</select></td>
     		 	</tr>
     		 	<tr>
     		 		<td height="15px;"></td>
     		 	</tr>
     		 	<tr>
     		 		<td width="30%;">Who can post on your timeline</td>
     		 		<td>
     		 		<select class="form-control" id="w_timeline">
     		 		<option>Everyone</option>
     		 		<option>Followers</option>	
     		 		<option>Only me</option>
     		 		</select></td>
     		 	</tr>
     		 	<tr>
     		 		<td height="15px;"></td>
     		 	</tr>
     		 	<tr>
     		 		<td width="30%;">Turn off follow</td>
     		 		<td>
     		 		<select class="form-control" id="off_follow">
     		 		<option>Everyone</option>
     		 		<option>Followers</option>	
     		 		<option>Only me</option>
     		 		</select></td>
     		 	</tr>
     		 	<tr>
     		 		<td height="15px;"></td>
     		 	</tr>
     		 	<tr>
     		 		<td height="25px;"></td>
     		 	</tr>
     		 	<tr>
     		 		<td width="30%;"></td>
     		 		<td><button class="btn btn-primary" id="up_privacy">Save Changes</button></td>
     		 	</tr>
     		 </table>
     		 </div>
     		 <br>
     		</div>
     		<!-- END PRIVACY SETTINGS -->

     		<!-- EMAIL NOTIFICATION -->
     		<div class="jumbotron menu" id="email_set" style="margin-top:25px;display:none;">
     		<div class="jumbotron" id="email_head"><center>Email notification</center></div>
     		<center>Receive email notifications for:</center>
     		<div class="jumbotron" id="email_body">
     			<table width="90%" border="0">
     			    <tr>
     					<td height="15px;"></td>
     				</tr>
     				<tr>
     					<td width="40%">Someone started following you</td>
     					<td>
     					<select class="form-control" id="fol_y">
     						<option>Enable</option>
     						<option>Disable</option>
     					</select></td>
     				</tr>
     				<tr>
     					<td height="15px;"></td>
     				</tr>
     				<tr>
     					<td width="40%">Someone mention you in a post</td>
     					<td>
     					<select class="form-control" id="men_y">
     						<option>Enable</option>
     						<option>Disable</option>
     					</select></td>
     				</tr>
     				<tr>
     					<td height="15px;"></td>
     				</tr>
     				<tr>
     					<td width="40%">You have a new messages</td>
     					<td>
     					<select class="form-control" id="sms_n">
     						<option>Enable</option>
     						<option>Disable</option>
     					</select></td>
     				</tr>
     				<tr>
     					<td height="15px;"></td>
     				</tr>
     				<tr>
     					<td width="40%">Someone commented on your post</td>
     					<td>
     					<select class="form-control" id="com_y">
     						<option>Enable</option>
     						<option>Disable</option>
     					</select></td>
     				</tr>
     				<tr>
     					<td height="15px;"></td>
     				</tr>
     				<tr>
     					<td width="40%">Someone like your post</td>
     					<td>
     					<select class="form-control" id="like_y">
     						<option>Enable</option>
     						<option>Disable</option>
     					</select></td>
     				</tr>
     				<tr>
     					<td height="25px;"></td>
     				</tr>
     				<tr>
     					<td width="40%"></td>
     					<td><button class="btn btn-primary" id="up_emailn">Save Changes</button></td>
     				</tr>
     			</table>
     			<br>
     		</div>
     		</div>
     		<!-- END EMAIL NOTIFICATION -->

     		<!-- WEB NOTIFICATION -->
     		<div class="jumbotron menu" id="web_set" style="margin-top:25px;display:none;">
     		<div class="jumbotron" id="web_head"><center>Site notification</center></div>
     		<center>Receive site notifications for:</center>
     		<div class="jumbotron" id="web_body">
     			<table width="90%" border="0">
     			    <tr>
     					<td height="15px;"></td>
     				</tr>
     				<tr>
     					<td width="40%">Someone started following you</td>
     					<td>
     					<select class="form-control" id="fol_s">
     						<option>Enable</option>
     						<option>Disable</option>
     					</select></td>
     				</tr>
     				<tr>
     					<td height="15px;"></td>
     				</tr>
     				<tr>
     					<td width="40%">Someone mention you in a post</td>
     					<td>
     					<select class="form-control" id="men_s">
     						<option>Enable</option>
     						<option>Disable</option>
     					</select></td>
     				</tr>
     				<tr>
     					<td height="15px;"></td>
     				</tr>
     				<tr>
     					<td width="40%">You have a new messages</td>
     					<td>
     					<select class="form-control" id="sms_s">
     						<option>Enable</option>
     						<option>Disable</option>
     					</select></td>
     				</tr>
     				<tr>
     					<td height="15px;"></td>
     				</tr>
     				<tr>
     					<td width="40%">Someone commented on your post</td>
     					<td>
     					<select class="form-control" id="com_s">
     						<option>Enable</option>
     						<option>Disable</option>
     					</select></td>
     				</tr>
     				<tr>
     					<td height="15px;"></td>
     				</tr>
     				<tr>
     					<td width="40%">Someone share my post</td>
     					<td>
     					<select class="form-control" id="share_s">
     						<option>Enable</option>
     						<option>Disable</option>
     					</select></td>
     				</tr>
     				<tr>
     					<td height="15px;"></td>
     				</tr>
     				<tr>
     					<td width="40%">Someone like your post</td>
     					<td>
     					<select class="form-control" id="like_s">
     						<option>Enable</option>
     						<option>Disable</option>
     					</select></td>
     				</tr>
     				<tr>
     					<td height="25px;"></td>
     				</tr>
     				<tr>
     					<td width="40%"></td>
     					<td><button class="btn btn-primary" id="web_up">Save Changes</button></td>
     				</tr>
     			</table>
     			<br>
     		</div>

     		</div>
     		<!-- END WEB NOTIFICATION -->

     		<!-- FIND FRIENDS -->
     		<div class="jumbotron menu" id="find_set" style="margin-top:25px;display:none;min-height:400px;">
            <div class="jumbotron" id="find_head"><center>Find Friends</center></div>
             <div class="jumbotron" id="find_body"></div>
     		</div>
     		<!-- END FIND FRIENDS -->

     		<!-- VERIFY ACCOUNTS -->
     		<div class="jumbotron menu" id="verify_set" style="margin-top:25px;display:none;">

            <div class="jumbotron" id="verify_head"><center>Get Verified</center></div>
            <div class="jumbotron" id="verify_body">
                <table width="90%" border="0">
                    <tr>
                        <td>Your title</td>
                        <td><input type="text" class="form-control"><small>Provide your title for example (Mr, Mrs, Miss e.t.c)</small></td>
                    </tr>
                    <tr>
                        <td height="15px;"></td>
                    </tr>
                     <tr>
                        <td>Fullname</td>
                        <td><input type="text" class="form-control"><small>Provide your correct full name containing your firstname and lastname</small></td>
                    </tr>
                     <tr>
                        <td height="15px;"></td>
                    </tr>
                     <tr>
                        <td>Your Address</td>
                        <td><input type="text" class="form-control"><small>Provide your residential address</small></td>
                    </tr>
                     <tr>
                        <td height="15px;"></td>
                    </tr>
                     <tr>
                        <td>Date of birth</td>
                        <td><input type="date" class="form-control"></td>
                    </tr>
                     <tr>
                        <td height="15px;"></td>
                    </tr>
                </table>
                <hr>
                <button class="btn btn-primary">Send Request</button>
                <br>
            </div>

     		</div>
     		<!-- END MUTED ACCOUNTS -->

     		<!-- BLOCKED ACCOUNTS -->
     		<div class="jumbotron menu" id="blocked_set" style="margin-top:25px;display:none;min-height:400px;">
            <div class="jumbotron" id="block_head"><center>Blocked user</center></div>
            <div class="jumbotron" id="block_body"></div>
     		</div>
     		<!-- END LOCKED ACCOUNTS -->


     		<!-- PROFILE DESIGN -->
     		<div class="jumbotron menu" id="part_1" style="margin-top:25px;display:none;">

     			<div class="jumbotron" id="design_head"><center>Design your page</center></div>
     			<div class="jumbotron" id="design_body">
     				Choose from themes
     				<hr>

     			<table width="100%" border="0">
		     	<tr>
		         <td width="20%" ><button id="t1" onclick="javascript:changt('t1')"><img id="imgt1" src="<?php echo base_url();?>themes/theme1.png" width="90%" height="100px" class="img-rounded"></button></td>
		         <td width="20%" ><button id="t2" onclick="javascript:changt('t2')"><img id="imgt2" src="<?php echo base_url();?>themes/theme2.jpg" width="90%" height="100px" class="img-rounded"></button></td>
		         <td width="20%" ><button id="t3" onclick="javascript:changt('t3')"><img id="imgt3"src="<?php echo base_url();?>themes/theme3.jpg" width="90%" height="100px" class="img-rounded"></button></td>
		         <td width="20%" ><button id="t4" onclick="javascript:changt('t4')"><img id="imgt4"src="<?php echo base_url();?>themes/theme4.jpg" width="90%" height="100px" class="img-rounded"></button></td>
		         <td width="20%" ><button id="t5" onclick="javascript:changt('t5')"><img id="imgt5"src="<?php echo base_url();?>themes/theme5.jpg" width="90%" height="100px" class="img-rounded"></button></td>
		         </tr>
		         <tr>
		         	<td height="15px;"></td>
		         </tr>
		         <tr>
		         <td width="20%" ><button id="t6" onclick="javascript:changt('t6')"><img id="imgt6" src="<?php echo base_url();?>themes/theme6.jpg" width="90%" height="100px" class="img-rounded"></button></td>
		         <td width="20%" ><button id="t7" onclick="javascript:changt('t7')"><img id="imgt7" src="<?php echo base_url();?>themes/theme7.jpg" width="90%" height="100px" class="img-rounded"></button></td>
		         <td width="20%" ><button id="t8" onclick="javascript:changt('t8')"><img id="imgt8"src="<?php echo base_url();?>themes/theme8.jpg" width="90%" height="100px" class="img-rounded"></button></td>
		         <td width="20%" ><button id="t9" onclick="javascript:changt('t9')"><img id="imgt9"src="<?php echo base_url();?>themes/theme9.png" width="90%" height="100px" class="img-rounded"></button></td>
		         <td width="20%" ><button id="t10" onclick="javascript:changt('t10')"><img id="imgt10"src="<?php echo base_url();?>themes/theme10.jpg" width="90%" height="100px" class="img-rounded"></button></td>
                </tr>
     			</table>
     				
     			<script type="text/javascript">

               function changt(data){

                 var img   = $("#img"+data).attr("src");
                 $('body').css('background-image','url(' + img + ')');
         	    }

               </script>

       <hr>

        <center>Custom Style</center>
        <small>Your changes are not saved until you click "Save changes."</small>
		<hr>
		<table width="85%" border="0">
		    <tr>
		        <td width="30%;"><b><small>Enable Design</small></b></td>
		        <td>

		            <select class="form-control" id="enable_design">
		                <option checked>--Select--</option>
		                <option>Enable</option>
		                <option>Disable</option>
		            </select>

		        </td>
		    </tr>
		    <tr>
		        <td height="30px;"></td>
		    </tr>

		    <tr>
		        <td width="30%;"><b><small>Background Image</small></b></td>
		        <td>

		            <form method="post" action="" id="upload_bg">

		                <input type="file" name="userfile" id="userfile" size="20" class="up_bg form-control" />
		                <br>
		                <button style="border-radius:0px;" type="submit" class="btn btn-success btn-sm">Update Background</button>

		            </form>

		            <br>
		            <div id="files" class="jumbotron" style="width='100px';height='100px';border-radius:0px;padding:0px;"></div>

		        </td>
		    </tr>
		    <tr>
		        <td height="30px;"></td>
		    </tr>

		    <tr>
		        <td width="30%;"><b><small>Background Color</small></b></td>
		        <td>
		            <input type="text" class="b_color form-control" id="b_color" style="width:100%;" /> </td>
		    </tr>
		    <tr>
		        <td height="30px;"></td>
		    </tr>

		    <tr>
		        <td width="30%;"><b><small>Background Position</small></b></td>
		        <td>
		            <input type="text" id="b_position" class="b_position form-control" style="width:100%">
		        </td>
		    </tr>
		    <tr>
		        <td height="30px;"></td>
		    </tr>

		    <tr>
		        <td width="30%;"><b><small>Background Attachment</small></b></td>
		        <td>
		            <select class="form-control" id="attach">
		            <option checked>--Select--</option>
		                <option>Scroll</option>
		                <option>fixed</option>
		            </select>
		        </td>
		    </tr>
		    <tr>
		        <td height="30px;"></td>
		    </tr>

		    <tr>
		        <td width="30%;"><b><small>Background Repeat</small></b></td>
		        <td>
		            <select class="form-control" id="repeat">
		            <option checked>--Select--</option>
		                <option>No repeat</option>
		                <option>Repeat</option>
		                <option>Repeat-x</option>
		                <option>Repeat-y</option>
		            </select>
		        </td>
		    </tr>
		    <tr>
		        <td height="30px;"></td>
		    </tr>

		    <tr>
		        <td width="30%;"><b><small>Font Color</small></b></td>
		        <td>
		            <input type="text" class="f_color form-control" id="f_color" style="width:100%;" />
		        </td>
		    </tr>
		    <tr>
		        <td height="30px;"></td>
		    </tr>

		    <tr>
		        <td width="30%;"><b><small>Link color</small></b></td>
		        <td>
		            <input type="text" class="l_color form-control" id="l_color" style="width:100%;" />
		        </td>
		    </tr>
		    <tr>
		        <td height="30px;"></td>
		    </tr>
		</table>

       <hr>

      <button style="border-radius:0px;" class="btn btn-primary" id="s_themes">Save Changes</button> <div id="themes_status"></div>
      <button class="btn btn-primary" id="s_custom" style="display:none;border-radius:0px;">Save Changes</button> <div id="themes_status"></div>
      </div>     				
      <!-- END PROFILE DESIGN -->

     		</div>
     		<div class="col-md-3"></div>
     	</div>
     </div>

</body>
