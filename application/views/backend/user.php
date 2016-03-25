<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/lightbox.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/alertify.min.css">
		<title>User Information</title>
	</head>
	<body>
		<?php echo $navbar;?>
		<?php echo $sidebar;?>
		<div class="col-md-10">
		<center><h1>User Information!!!</h1></center>
			<table class="table table-default" id="usertable">
				<thead>
					<tr>
						<th>SN</th>
						<th>Full Name</th>
						<th>User Name</th>						
						<th>Email</th>						
						<th>Image</th>						
						<th>Action</th>						
					</tr>
				</thead>
				<tbody>
					
				<?php $sn = 1; foreach($user_list as $user) {
				?>
					<tr>
						<td><?php echo $sn; $sn++; ?></td>
						<td> <?php echo $user->admin_fullname; ?></td>
						<td> <?php echo $user->admin_fullname; ?></td>
						<td> <?php echo $user->admin_email; ?></td>
						<td><a href="<?php echo base_url();?>assets/upload/admin/<?php echo $user->admin_image;?>" 
							data-title="<?php echo $user->admin_image;?>" 
							data-lightbox="admin"><img src="<?php echo base_url();?>assets/upload/admin/<?php echo $user->admin_image;?>" 
							style="width:50px; height:50px;" class="img-responsive" alt="Responsive image"></a></td>
						<td>
							<button type="button" class="btn btn-lg btn-danger delete" data-toggle="modal" data-target="#delete" data-whatever="@mdo" id="<?php echo $user->admin_id?>">Delete</button>
							<button type="button" class="btn btn-lg btn-success edit" data-toggle="modal" data-target="#edit" data-whatever="@mdo" id="<?php echo $user->admin_id?>">Edit</button>
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
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/lightbox.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend/alertify.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	    $('#usertable').DataTable();
		});
	</script>
	<script type="text/javascript">
		$(".delete").click(function(){
		var subcat = {"id" : $(event.target).attr('id')};
		alertify.confirm("Are you sure to delete?", function(){
          $.ajax({
          type: "post",
          data: subcat,
          url: "<?php echo base_url(); ?>backend/admin/delAdmin",
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
	</body>
</html>