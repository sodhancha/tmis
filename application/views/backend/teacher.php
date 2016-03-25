<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/alertify.min.css">
		<title>Teacher View</title>
	</head>
	<body>
		<?php echo $navbar;?>
		<?php echo $sidebar;?>
		<div class="col-md-10">
		<center><h1>Teacher Information!!!</h1></center>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_Teacher">
			Add Teacher
		</button>			
			<div class="modal fade" id="add_Teacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Add Teacher</h4>
				      </div>
				      <div class="modal-body">
						<form method="post" id="reg_form" action="<?php echo base_url();?>backend/teacher/add_teacher" enctype="multipart/form-data">			
						  	<div class="form-group">
								<label for="inputTname" class="col-sm-3 control-label">Teacher Name</label>
						    	<div class="col-sm-9">
						    		<input type="text" class="form-control" id="inputTeacherName" placeholder="Teacher Name" name="teacher_name">
						    	</div>
							</div>
							<div class="form-group">
								<label for="inputSubject" class="col-sm-3 control-label">Subject</label>
						    	<div class="col-sm-9">
						    		<select class="form-control" name="subject_id">
						    			<option value="">--Please Select--</option>
						    			<?php  foreach($subject_list as $sub) {
										?>
						    			<option value="<?php echo $sub->subject_id;?>"><?php echo $sub->subject_name;?></option>
						    			<?php } ?>
						    		</select>
						    	</div>
							</div>					
							<div class="form-group">
								<label for="inputLab" class="col-sm-3 control-label">Lab</label>
						    	<div class="col-sm-9">
						    		<select class="form-control" name="lab_id">
						    			<option value="">--Please Select--</option>
						    			<?php  foreach($lab_list as $lab) {
										?>
						    			<option value="<?php echo $lab->lab_id;?>"><?php echo $lab->lab_name;?></option>
						    			<?php } ?>
						    		</select>
						    	</div>
							</div>
							<div class="form-group">
								<label for="inputTsalary" class="col-sm-3 control-label">Teacher's Salary</label>
						    	<div class="col-sm-9">
						    		<input type="text" class="form-control" id="inputSalary" placeholder="Teacher's Salary" name="teacher_salary">
						    	</div>
							</div>
							<div class="form-group">
								<label for="inputImage" class="col-sm-3 control-label">Image</label>
						    	<div class="col-sm-9">
						    		<input type="file" class="form-control" name="userfile">
						    	</div>
							</div>
							<div class="modal-footer">
								<input type="submit" class="btn btn-primary" value="Add Teacher" name="add_teacher">
							</div>  	
						</form>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>				      
				    </div>
				</div>
			</div>
		</div>
		<div class="col-md-10">
			<table class="table table-default" id="teachertable">
				<thead>
					<tr>
						<th>SN</th>
						<th>Teacher's Name</th>
						<th>Subject</th>
						<th>Lab</th>
						<th>Time</th>
						<th>Salary</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
				<?php $sn = 1; foreach($teacher_list as $teacher) {
				?>
					<tr>
						<td><?php echo $sn; $sn++; ?></td>
						<td> <?php echo $teacher->teacher_name; ?></td>
						<td> <?php echo $teacher->subject_name; ?></td>
						<td> <?php echo $teacher->lab_name; ?></td>
						<td> <?php echo $teacher->time_date; ?></td>
						<td> <?php echo $teacher->teacher_salary; ?></td>
						<td> <?php echo $teacher->teacher_image; ?></td>
						<td>
							<button type="button" class="btn btn-lg btn-danger delete" data-toggle="modal" data-target="#delete" data-whatever="@mdo" id="<?php echo $lab->lab_id?>">Delete</button>
							<button type="button" class="btn btn-lg btn-success edit" data-toggle="modal" data-target="#edit" data-whatever="@mdo" id="<?php echo $lab->lab_id?>">Edit</button>

						</td>
		
					</tr>
				<?php }
				?>
				</tbody>
			</table>
		</div>

	<script type="text/javascript" src="<?php echo base_url();?>js/backend/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/alertify.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
    	$('#teachertable').DataTable();  
		});
	</script>
	</body>
</html>