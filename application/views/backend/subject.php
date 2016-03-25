<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/alertify.min.css">
		<title>Subject Information</title>
	</head>
	<body>
		<?php echo $navbar;?>
		<?php echo $sidebar;?>
		<div class="col-md-10">
		<center><h1>Subject Information!!!</h1></center>
			<?php echo $this->session->flashdata('updatemsg');?>
			<?php echo $this->session->flashdata('updateunmsg');?>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_subject">
			Add Subject
		</button>			
			<div class="modal fade" id="add_subject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Add Subject</h4>
				      </div>
				      <div class="modal-body">
						<form method="post" id="reg_form" action="<?php echo base_url();?>backend/subject/add_subject" enctype="multipart/form-data">			
						  	<div class="form-group">
								<label for="inputSname" class="col-sm-3 control-label">Subject Name</label>
						    	<div class="col-sm-9">
						    		<input type="text" class="form-control" id="inputSubject" placeholder="Subject" name="sub_name">
						    	</div>
							</div>						
							<div class="form-group">
								<label for="inputDesc" class="col-sm-3 control-label">Description</label>
						    	<div class="col-sm-9">
						    		<textarea rows="4" cols="50" class="form-control" id="inputDescription" placeholder="Description" name="sub_desc">
										
									</textarea>
						    	</div>
							</div>
							<div class="modal-footer">
								<input type="submit" class="btn btn-primary" value="Add Subject" name="add_subject">
							</div>  	
						</form>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>				      
				    </div>
				</div>
			</div>
		</div>
		<div class="col-md-10">
			<table class="table table-default" id="subjecttable">
				<thead>
					<tr>
						<th>SN</th>
						<th>Sbuject</th>
						<th>Description</th>						
						<th>Action</th>						
					</tr>
				</thead>
				<tbody>
					
				<?php $sn = 1; foreach($subject_list as $sub) {
				?>
					<tr>
						<td><?php echo $sn; $sn++; ?></td>
						<td> <?php echo $sub->subject_name; ?></td>
						<td> <?php echo $sub->subject_description; ?></td>
						<td>
							<button type="button" class="btn btn-lg btn-danger delete" data-toggle="modal" data-target="#delete" data-whatever="@mdo" id="<?php echo $sub->subject_id?>">Delete</button>
							<button type="button" class="btn btn-lg btn-success edit" data-toggle="modal" data-target="#edit" data-whatever="@mdo" id="<?php echo $sub->subject_id?>">Edit</button>
						</td>
		
					</tr>
				<?php }
				?>
				</tbody>
			</table>
		</div>
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="exampleModalLabel">Edit Lab</h4>
		      </div>
		      <div class="modal-body">
		        <form id="edit_sub" class="edit_form" method="POST" action="<?php echo base_url();?>backend/subject/updateLab">
		          <div class="form-group">
		            <input type="hidden" class="form-control" name="subject_id" id="subject_id">
		            <label for="lab_name" class="control-label">Subject Name:</label>
		            <input type="text" class="form-control" name="subject_name" id="subject_name">
		          </div>
		          <div class="form-group">
						<label for="inputDesc" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-9">
						    	<textarea rows="4" cols="50" class="form-control" id="subject_desc" placeholder="Description" name="subject_description">
								</textarea>
						    </div>
					</div>
		        <input type="submit" class="btn btn-primary" name="edit" value="Edit">
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/alertify.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
    $('#subjecttable').DataTable();
	});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
    	$('#subjecttable').DataTable();  
		});
		</script>
		<script type="text/javascript">
		$(".delete").click(function(){
		var subcat = {"id" : $(event.target).attr('id')};
		alertify.confirm("Are you sure to delete?", function(){
          $.ajax({
          type: "post",
          data: subcat,
          url: "<?php echo base_url(); ?>backend/subject/delSub",
          dataType: 'json',
        success: function(data){
        	alertify.alert("success");
        	// location.reload();
           },
        error: function () {
        	alert("sorry");
      	}
         })
         })
		});
	</script>
	<script type="text/javascript">
			$(".edit").click(function() {
	        var cat = {"id" : $(event.target).attr('id')};
			$.ajax({
			type: "post",
			data: cat,
			url: "<?php echo base_url(); ?>backend/subject/editSub",
			dataType: 'json',
	        success: function(data){
	        	$('#edit_sub')
					.find('[name="subject_id"]').val(data[0]['subject_id']).end()
					.find('[name="subject_name"]').val(data[0]['subject_name']).end()
					.find('[name="subject_description"]').val(data[0]['subject_desc']).end()
	           },
            error: function () {
	        	alert("sorry");
	      	}
	         });
	       });
		</script>
	</body>
</html>