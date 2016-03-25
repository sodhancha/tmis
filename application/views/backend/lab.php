<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/alertify.min.css">
		<title>Lab Information</title>
	</head>
	<body>
		<?php echo $navbar;?>
		<?php echo $sidebar;?>
		<div class="col-md-10">
		<center><h1>Lab Information!!!</h1></center>
			<?php echo $this->session->flashdata('updatemsg');?>
			<?php echo $this->session->flashdata('updateunmsg');?>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_lab">
			Add Lab
		</button>			
			<div class="modal fade" id="add_lab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Add Lab</h4>
				      </div>
				      <div class="modal-body">
						<form method="post" id="reg_form" action="<?php echo base_url();?>backend/lab/add_lab">			
						  	<div class="form-group">
								<label for="input" class="col-sm-3 control-label">Lab Name</label>
						    	<div class="col-sm-9">
						    		<input type="text" class="form-control" id="inputLab" placeholder="Lab" name="lab_name">
						    	</div>
							</div>						
							
							<div class="modal-footer">
								<input type="submit" class="btn btn-primary" value="Add Lab" name="add_lab">
							</div>  	
						</form>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>				      
				    </div>
				</div>
			</div>
		</div>
		<div class="col-md-10">
			<table class="table table-default" id="labtable">
				<thead>
					<tr>
						<th>SN</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
				<?php $sn = 1; foreach($lab_list as $lab) {
				?>
					<tr>
						<td><?php echo $sn; $sn++; ?></td>
						<td> <?php echo $lab->lab_name; ?></td>
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
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="exampleModalLabel">Edit Lab</h4>
		      </div>
		      <div class="modal-body">
		        <form id="edit_lab" class="edit_form" method="POST" action="<?php echo base_url();?>backend/lab/updateLab">
		          <div class="form-group">
		            <input type="hidden" class="form-control" name="lab_id" id="lab_id">
		            <label for="lab_name" class="control-label">Lab Name:</label>
		            <input type="text" class="form-control" name="lab_name" id="lab_name">
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
    	$('#labtable').DataTable();  
		});
		</script>
		<script type="text/javascript">
		$(".delete").click(function(){
			debugger;
		var subcat = {"id" : $(event.target).attr('id')};
		alertify.confirm("Are you sure to delete?", function(){
          $.ajax({
          type: "post",
          data: subcat,
          url: "<?php echo base_url(); ?>backend/lab/delLab",
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
				debugger;
	        var cat = {"id" : $(event.target).attr('id')};
			$.ajax({
			type: "post",
			data: cat,
			url: "<?php echo base_url(); ?>backend/lab/editLab",
			dataType: 'json',
	        success: function(data){
	        	$('#edit_lab')
					.find('[name="lab_id"]').val(data[0]['lab_id']).end()
					.find('[name="lab_name"]').val(data[0]['lab_name']).end()
	           },
            error: function () {
	        	alert("sorry");
	      	}
	         });
	       });
		</script>
	</body>
</html>