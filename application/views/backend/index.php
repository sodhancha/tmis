<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/screen.css">
	<title>Admin Login Page</title>
</head>
<body>
	<div class="panel panel-danger col-md-4 col-md-offset-4">
		<?php echo $this->session->flashdata('tmessage');?>
		<div class="panel-heading">Admin Login</div>
			<div class="panel-body">
				<form class="form-horizontal" action="<?php echo base_url();?>backend/admin/sign_in" method="post" id="admin_login">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="admin_email">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputPassword3" placeholder="Password" name="admin_password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-success" name="sign_in" value="Sign in">
					</div>
				</div>
				</form>
			</div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">
				Register Admin
			</button>
			<!-- Modal -->
			<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Admin Registraion</h4>
			      </div>
			      <div class="modal-body">
					<form method="post" id="reg_form" action="<?php echo base_url();?>backend/admin/register" enctype="multipart/form-data">
					
					    <div class="form-group">
							<label for="inputFname" class="col-sm-3 control-label">Full Name</label>
					    	<div class="col-sm-9">
					    		<input type="text" class="form-control" id="inputFullname" placeholder="Full Name" name="full_name">
					    	</div>
						</div>				
					  	<div class="form-group">
							<label for="inputUname" class="col-sm-3 control-label">Username</label>
					    	<div class="col-sm-9">
					    		<input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username">
					    	</div>
						</div>
						<div class="form-group">	
							<label for="inputEmail" class="col-sm-3 control-label">Email</label>
					    	<div class="col-sm-9">
					    		<input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email">
					    	</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-3 control-label">Password</label>
					    	<div class="col-sm-9">
					    		<input type="text" class="form-control" id="inputPassword" placeholder="Password" name="password">
					    	</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-3 control-label">Image</label>
					    	<div class="col-sm-9">
					    		<input type="file" class="form-control" name="userfile">
					    	</div>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-primary" value="Register" name="register_admin">
						</div>  	
					</form>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>			      
			    </div>
			  </div>
			</div>
	</div>
		<span>
		  	<?php echo form_error('full_name');?>
		  	<?php echo form_error('username');?>
		  	<?php echo form_error('email');?>
		  	<?php echo form_error('password');?>
		</span>
		<span>
		  	<?php echo form_error('admin_email');?>
		  	<?php echo form_error('admin_password');?>
		</span>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/jquery.validate.min.js"></script>
	<script type="text/javascript">
			$("#reg_form").validate({
			rules: {
				full_name: {
					required: true,
					minlength: 3,
					maxlength: 25
				},
				username: {
					required: true,
					minlength: 5
				},
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 5
				}
			},
			messages:{
				full_name: "Please enter your full name",
				username: {
					required: "Please enter your username",
					minlength: "Your username must be at least 5 characters long"
				},
				email: "Please enter a valid email address",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				}
			}
			});
		</script>
		<script type="text/javascript">
			$("#admin_login").validate({
				rules:{
					admin_email:{
						required: true,
						email: true
					},
					admin_password:{
						required: true,
						minlength: 5 
					}
				},
				messages:{
					admin_email:"Please enter a valid email address",
					admin_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					}
				}
			});
		</script>
</body>
</html>
