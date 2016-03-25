<!DOCTYPE html>
<html>
<head>
	<title>Frontend</title>
</head>
<body>
	<div class="container">
			<div class="row">
			<?php $sn = 1; foreach($teacher_list as $teacher) {
					?>
				<div class="col-md-3">
					<a href="<?php echo base_url();?>teacher/teacher_info/<?php echo $teacher->teacher_id; ?>">
						<img src="<?php echo base_url();?>assets/upload/teacher/<?php echo $teacher->teacher_image;?>" 
						style="width:262.500px;height:262.500px;" class="img-responsive" alt="Responsive image">
					</a>
				</div>
			<?php }
					?>
			</div>
		</div>
</body>
</html>