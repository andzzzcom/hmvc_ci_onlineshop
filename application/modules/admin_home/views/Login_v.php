
<div class="login-box">
	<div class="login-logo">
		<a href="<?PHP site_url('home/login');?>"><b>Admin Panel</b><br> <?php echo $titleweb;?></a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Sign in to Admin Panel</p>
		<?php if(isset($_SESSION["message"])) echo $_SESSION["message"]; ?>

	<form action="<?PHP echo site_url('admin/login_action');?>" method="post">
		<div class="form-group has-feedback">
			<input type="email" class="form-control" placeholder="Email" name="email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input type="password" class="form-control" placeholder="Password" name="password">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="row">
			<div class="col-xs-8">
				<div class="checkbox icheck">
					<label>
					<input type="checkbox"> Remember Me
					</label>
				</div>
			</div>
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
			</div>
		</div>
    </form>


	</div>
</div>


