<body style="background-image:url(<?php echo base_url();?>public/img/index_bg.jpg)">

<style type="text/css">
  
body {

    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;

}

</style>

<div class="container-fluid">
	<div class="row">

		<div class="col-md-1" class="nopadding"></div>
		<div class="col-md-6" class="nopadding" style="margin-top:40px;">

		<center><img src="<?php echo base_url();?>public/img/logo.png" width="100" height="100" class="img-circle" style="border:2px solid #fff;margin-top:-30px;">
		<b style="color:#fff;"><span id="maya">MayaDiary</span></b></center>
		</div>

		<div class="col-md-5" class="nopadding" style="margin-top:50px;">
		
		<div class="jumbotron" id="login_maya">	

		<table width="100%" border="0">
			<tr>
				<td colspan="4"><button class="btn btn-default" id="register"><span class="glyphicon glyphicon-envelope"></span> Sign up with your email</button></td>
			</tr>

			<tr>
				<td height="10px;"></td>
			</tr>

			<tr>
				<td colspan="4">
					
				<div class="jumbotron" id="login_show" style="background-color:rgba(255,255,255,0.5);margin-top:-20px;">
				
				<?php echo validation_errors(); ?>
				<?php echo @$success ;?>
				<?php echo form_open('login/loginUser');?>	
				<label>Email Address</label>
				<input type="email" class="form-control" name="l_email" id="l_email" required >
				</p>
				<label>Password</label>
				<input type="password" class="form-control" name="l_pass" id="l_pass" required >
				</p>
				<label><input type="checkbox"> Keep me log in</label>
				</p>
				<button type="submit" class="btn btn-success" style="border-radius:0px;">Log in</button><a href=""> Forgot your password?</a>
				<?php echo form_close();?>

				</div>	

				</td>
			</tr>

			<tr>
				<td colspan="4">
					
				<div class="jumbotron" id="signup_show" style="display:none;background-color:rgba(255,255,255,0.5);margin-top:-20px;">
					
				<?php echo form_open('register/signUp');?>	
				<label>Username</label>
				<input type="text" class="form-control" name="r_user" id="r_user" value="<?php echo set_value('r_user'); ?>" required>
				</p>
				<label>Email Address</label>
				<input type="email" class="form-control" name="r_email" id="r_email" value="<?php echo set_value('r_email'); ?>" required>
				</p>
				<label>Password</label>
				<input type="password" class="form-control" name="r_pass" id="r_pass" value="<?php echo set_value('r_pass'); ?>" minlength="8">
				</p>
				<label>Birthday</label>
				<input type="date" class="form-control" name="r_date" id="r_date" value="<?php echo set_value('r_date'); ?>" required>
				</p>
				<button type="submit" class="btn btn-warning" style="border-radius:0px;">Sign up now</button>
				<?php echo form_close();?>

				</div>	

				</td>
			</tr>



			<tr>
				<td width="25%"><a href=""><center><img src="<?php echo base_url();?>public/img/facebook.png" width="56" height="56"></center></a></td>
				<td width="25%"><a href=""><center><img src="<?php echo base_url();?>public/img/google.ico" width="48" height="48"></center></a></td></td>
				<td width="25%"><a href=""><center><img src="<?php echo base_url();?>public/img/twitter.png" width="58" height="58"></center></a></td></td>
				<td width="25%"></td>
			</tr>

		</table>

		</div>
	</div>
</div>

<div class="container-fluid" style="margin:0px;padding:0px;">
	<div class="row">
		<div class="col-md-12" id="bottom">
		<br><br>
		<table width="100%" border="0">
			 <tr>
			 	<td width="20%"><center><a href="" style="color:#fff;">Terms and conditions</a></center></td>
			 	<td width="20%"><center><a href="" style="color:#fff;">Privacy policy</a></center></td>
			 	<td width="20%"><center><a href="" style="color:#fff;">Disclaimer</a></center></td>
			 	<td width="20%"><center><a href="" style="color:#fff;">Privacy policy</a></center></td>
			 	<td width="20%"><center><a href="" style="color:#fff;">About us</a></center></td>
			 </tr>
		</table>
		</div>
	</div>
</div>


</body>
