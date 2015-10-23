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
      <li> <a href="<?php echo base_url();?>home/goHome" ><i class="fa fa-fw fa-home">     </i> Home  </a> </li>
      <li> <a href="<?php echo base_url();?>profile/userProfile/<?php echo $this->session->userdata('username');?>" ><i class="fa fa-fw fa-user"></i> <?php echo ucfirst($this->session->userdata('username'));?> </a> </li>
      <li> <a href="<?php echo base_url();?>profile/peopleshow/<?php echo $this->session->userdata('username');?>" ><i class="fa fa-fw fa-users">        </i> People   </a> </li>
      <li> <a href="<?php echo base_url();?>profile/photoshow/<?php echo $this->session->userdata('username');?>" ><i class="fa fa-fw fa-picture-o">     </i> Photos  </a> </li>
      <li> <a href="#" ><i class="fa fa-fw fa-video-camera">   </i> Video   </a> </li>
      <li> <a href="#" ><i class="fa fa-fw fa-music">        </i> Music   </a> </li>
      <li> <a href="<?php echo base_url();?>profile/profileDesign/<?php echo $this->session->userdata('username');?>" ><i class="fa fa-fw fa-wrench">        </i> Settings  </a> </li>
      <li> <a href="<?php echo base_url();?>login/logout" ><i class="fa fa-fw fa-sign-out"></i> Logout</a> </li>
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
  <div id="page-content-wrapper" >
    <button style="margin-top:30px;" type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas"> <span class="hamb-top"></span> <span class="hamb-middle"></span> <span class="hamb-bottom"></span> </button>
       <div class="container" style="margin-top:-18px;">
      

         <?php 

          $this->db->select('photo');
          $this->db->where('username',$this->session->userdata('username'));
          $you_p = $this->db->get('user')->result();
          foreach($you_p as $youp){}

          ?>
        
            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3"  style="background-color:rgba(255,255,255,0.3);min-height:720px;" >
                
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

            <div class="jumbotron" id="d_menu1">

            <button class="btn btn-default" id="acc" style="width:100%"><span style="float:left;" class="style">Account</span> <span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

            <button class="btn btn-default" id="pri" style="width:100%"><span style="float:left;" class="style">Privacy</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

            <button class="btn btn-default" id="em" style="width:100%"><span style="float:left;"  class="style">Email notification</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

            <button class="btn btn-default" id="web" style="width:100%"><span style="float:left;"  class="style">Web notification</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

            <button class="btn btn-default" id="find" style="width:100%"><span style="float:left;" class="style">Find Friends</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

            <button class="btn btn-default" id="veri" style="width:100%"><span style="float:left;"  class="style">Verify accounts</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

            <button class="btn btn-default" id="block" style="width:100%"><span style="float:left;" class="style">Blocked accounts</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>

            <button class="btn btn-default" id="part" style="width:100%"><span style="float:left;"  class="style">Design</span><span style="float:right;" class="glyphicon glyphicon-menu-right"></span></button>
            </div> 

            <script type="text/javascript">

            $(function(){



            });
          

            </script>

            </div>

            <div class="col-md-6"  style="background-color:rgba(255,255,255,0.3);min-height:720px;">

            <!-- ACCOUNT SETTINGS -->
            <div class="jumbotron" id="account_set" style="margin-top:0px;display:#;">
                <div class="jumbotron" id="acc_head">
                    <center class="style">Account</center>
                </div>
                <div class="jumbotron" id="acc_body">
                    <table width="100%" border="0">

                       <!--  <tr>
                            <td height="25px;"></td>
                        </tr>
                        <tr>
                            <td width="30%"><center>Username</center></td>
                            <td><input type="text" value="<?php echo $row->username;?>"class="form-control" id="a_user"></td>
                            <td width="10%"></td>
                        </tr> -->
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
                    <center class="style" >Content</center>
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
            <div class="jumbotron" id="privacy_head"><center class="style" >Privacy and confidentiality</center></div>
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
            <div class="jumbotron" id="email_head"><center class="style">Email notification</center></div>
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
            <div class="jumbotron" id="web_head"><center class="style">Site notification</center></div>
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
            <div class="jumbotron" id="find_head"><center class="style">Find Friends</center></div>
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
            <div class="jumbotron" id="block_head"><center class="style">Blocked user</center></div>
            <div class="jumbotron" id="block_body"></div>
            </div>
            <!-- END LOCKED ACCOUNTS -->


            <!-- PROFILE DESIGN -->
            <div class="jumbotron menu" id="part_1" style="margin-top:25px;display:none;">

                <div class="jumbotron" id="design_head"><center class="style">Design your page</center></div>
                <div class="jumbotron" id="design_body">
                   <!--  Choose from themes
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
 -->
        <center>Custom Style</center>
        <center><small>Your changes are not saved until you click  "Save changes."</small></center>
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
        </div>
                
       
      </div>
    </div>
  </div>
  <!-- /#page-content-wrapper --> 
  
</div>

</body>

<!-- CHAT PANEL -->

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