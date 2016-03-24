<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/bootstrap.min.css">
	<title>Admin Page</title>
</head>
	<?php include 'navbar.php' ;?>
	<?php include 'sidebar.php' ;?>

	<div class="col-md-10">
	<?php echo $this->session->flashdata('loggedinsuc');?>
	Welcome Admin!!!			
	</div>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/bootstrap.min.js"></script>
</body>
</hmtl>