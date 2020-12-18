
  <!-- Breadcrumbs -->
  
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span></li>
            <li><strong>My Account</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  
  <!-- Main Container -->
  <section class="main-container col1-layout" style="background-color:white">
    <div class="main container">
      
        
        <div class="page-content">
          
            <div class="account-login">
              
			<form method="post" onsubmit="return validasi();" action="<?php echo base_url();?>login_checkout_action">
				<div class="box-authentication">
					<h4>Login</h4>
					<p class="before-login-text">
					<?php
						if($this->session->flashdata('message_login')) 
						{
							echo $this->session->flashdata('message_login');
							$this->session->unset_userdata('message_login');
						}else
						{
							echo"Insert your account detail";
						}
					?>
					</p>
					<label for="email_login">Email address<span class="required">*</span></label>
					<input placeholder="Insert Your Email" id="email_login" name="email" type="email" class="form-control">
					
					<label for="password_login">Password<span class="required">*</span></label>
					<input placeholder="Insert Your Password" id="password_login" name="password" type="password" class="form-control">
					
					<label class="inline" for="rememberme">
						<input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me
					</label>
					<br>
					<button class="button"><i class="fa fa-lock"></i>&nbsp; <span>Login</span></button>
					<p class="forgot-pass"><a href="#">Lost your password?</a></p>
				</div>
			</form>
			<form method="post" onsubmit="return validasi2();" action="<?php echo base_url();?>signup_action">
				<div class="box-authentication">	
					<h4>Register</h4>
					<p>
					<?php
						if($this->session->flashdata('message_signup')) 
						{
							echo $this->session->flashdata('message_signup');
							$this->session->unset_userdata('message_signup');
						}else
						{
							echo"Create your very own account";
						}
					?>
					</p> 											
					<label for="emmail_register">Name<span class="required">*</span></label>
					<input type="text" placeholder="Insert Your Name" id="nama_register" name="nama" type="text" class="form-control">
												
					<label for="emmail_register">Email address<span class="required">*</span></label>
					<input type="email" placeholder="Insert Your Email" id="email_register" name="email" class="form-control">
												
					<label for="emmail_register">Password<span class="required">*</span></label>
					<input placeholder="Insert Your Password" id="password_register" name="password" type="password" class="form-control">
												
					<label for="emmail_register">Password (confirm)<span class="required">*</span></label>
					<input placeholder="Insert Your Password (confirm)" id="password_register_confirm" name="password_confirmation" type="password" class="form-control">
					
					<button class="button"><i class="fa fa-user"></i>&nbsp; <span>Register</span></button>
					<div class="register-benefits">
						<h5>Sign up today and you will be able to :</h5>
						<ul>
							<li>Speed your way through checkout</li>
							<li>Track your orders easily</li>
							<li>Keep a record of all your purchases</li>
						</ul>
					</div>
				</div>
			</form>
    
        </div>
      </div>

    </div>
  </section>
  <!-- Main Container End --> 
  
  
	<script>
		function validasi()
		{
			var email_login = $('#email_login').val();
			var password_login = $('#password_login').val();
			
			if(email_login=="" || password_login=="")
			{
				alert("Semua field harus di isi !");
				
				return false;
			}
			
			if(validasi_email(email_login) == false || validasi_password(password_login) == false)
				return false;
		}
		
		function validasi2()
		{
			var nama_register = $('#nama_register').val();
			var email_register = $('#email_register').val();
			var password_register = $('#password_register').val();
			var password_register_confirm = $('#password_register_confirm').val();
			if(nama_register=="" || email_register=="" || password_register=="" || password_register_confirm=="")
			{
				alert("Semua field harus di isi !");
				
				return false;
			}
			
			if(validasi_nama(nama_register) == false || validasi_email(email_register) == false || validasi_password(password_register) == false || validasi_password(password_register_confirm) == false)
				return false;
			
			if(password_register !== password_register_confirm)
			{
				alert("Password tidak sama !");
				
				return false;
			}
		}
	</script>