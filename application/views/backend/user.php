<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/alertify.min.css">
		<title>User Information</title>
	</head>
	<body>
		<?php echo $navbar;?>
		<?php echo $sidebar;?>
		<div class="col-md-10">
			<table class="table table-default" id="subjecttable">
				<thead>
					<tr>
						<th>SN</th>
						<th>Full Namet</th>
						<th>User Name</th>						
						<th>Image</th>						
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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend/alertify.min.css">
	</body>
</html>