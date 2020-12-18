	
<!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span></li>
            <li><strong>Forgot Password </strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<!-- Breadcrumbs End --> 

	 <!--Container -->
	  <div class="error-page">
		<div class="container">
			<div class="error_pagenotfound"> 
				<h2>Reset your password</h2>
				<?php
					if($this->session->flashdata('message_forgot')) 
					{
						echo $this->session->flashdata('message_forgot');
						$this->session->unset_userdata('message_forgot');
					}
				?>
				<form class="form-group" method="post" onsubmit="return validasi();" action="<?php echo base_url();?>forgot_password_action">
					<input type="email" id="email" placeholder="Please Insert Your Email" name="email" class="form-control"/><br>
					<button type="submit" class="btn btn-default">Reset Password</button>
				</form>
			</div>
		</div>
	  </div>
	<!-- Container End -->
  
  
	<script>
		function validasi()
		{
			var email = $('#email').val();
			
			if(email=="")
			{
				alert("Semua field harus di isi !");
				
				return false;
			}
			
			if(validasi_email(email) == false)
				return false;
		}
		
	</script>