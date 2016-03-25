<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css">
	<title>Teacher Detail Information</title>
</head>
<body>
	<div class="container">
	<?php $sn = 1; foreach($teacher_list as $teacher) {
	?>
	<div class="col-md-6">
	<img src="<?php echo base_url();?>assets/upload/teacher/<?php echo $teacher->teacher_image;?>" 
	class="img-responsive" alt="Responsive image">
	</div>
	<div class="col-md-6">
		<h3>WELCOME!!!</h3>
		<?php echo $teacher->teacher_username?>
		<h4>Some info</h4>
	</div>
	<?php } ?>
	</div>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
</body>
</html>