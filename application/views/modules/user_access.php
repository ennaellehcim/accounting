<!-- Page content Start -->
<!-- Title -->
<div class="row">
	<div class="dv-header col-md-12">
		<span class="page-title">User Access</span>
	</div>
</div>
<!--Edit User access Modal-->
<div class="modal fade userAccess" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" id="userAccess">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header modal-header-bg">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="">User Access</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<span class="txt">First Name</span>
						<input type="text" class="form-control" value="">
					</div>

					<div class="col-md-6">
						<span class="txt">Last Name</span>
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<span class="txt">Username</span>
						<input type="text" class="form-control">
					</div>

					<div class="col-md-6">
						<span class="txt">Password</span>
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<span class="txt">User Type</span>
						<select name="userType" id="" class="form-control">
							<option value=""></option>
						</select>
					</div>
					<div class="col-md-6">
						<button class="btn btn-style-1 margin-top-30" onclick="show_option();"><i class='fa fa-plus'></i> Add Option</button>
					</div>
				</div>
				<!--Adding new user type-->
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<span class="modal-subtitle">Add New User Type</span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<span class="txt">User Type</span>
								<input type="text" placeholder="Ex. Administrator" class="form-control">
							</div>
							<div class="col-md-3 margin-top-30">
								<button class="btn btn-style-1"><i class="fa fa-check"></i> Save Option</button>
							</div>
							<div class="col-md-3 margin-top-30">
								<button class="btn btn-style-2"><i class="fa fa-remove"></i> Cancel </button>
							</div>
						</div>
					</div>
				</div>
				<!--Adding new user type-->
				<div class="row">
					<div class="col-md-12">
						<span class="modal-subtitle">Key Access</span>
					</div>
				</div>
				<div class="row checkbox">
					<div class="col-md-4">
						<label><input type="checkbox" value="" class="">Dashboard</label>
					</div>
					<div class="col-md-4">
						<label><input type="checkbox" value="" class="">Journal</label>
					</div>
					<div class="col-md-4">
						<label><input type="checkbox" value="" class="">Ledger</label>
					</div>
				</div>	
				<div class="row checkbox">
					<div class="col-md-4">
						<label><input type="checkbox" value="" class="">Report</label>
					</div>
					<div class="col-md-4">
						<label><input type="checkbox" value="" class="">Administrator</label>
					</div>
					<div class="col-md-4">
						<label><input type="checkbox" value="" class="">Setup</label>
					</div>
				</div>		
			</div>
			<div class="modal-footer">
				<button class="btn btn-style-1" type="button"  onclick="add_user()">Save Changes</button>
				<button class="btn btn-style2 " data-dismiss="modal" aria-label="Close"> Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--Delete User access Modal-->
<div class="modal fade deleteAccess" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" id="deleteAccess">
	<div class="modal-dialog modal-s">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-offset-2 col-md-5">
						<span class="txt">Are you sure to delete the user?</span>
					</div>
					<div class="col-md-3">
						<button class="btn btn-style-1" type="button"  onclick="">Yes</button>
						<button class="btn btn-style2 " data-dismiss="modal" aria-label="Close"> No</button>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<form class="userAccess-form">
	<!--Add New User-->
	<div class="row">
		<div class="col-md-1 margin-top-10">
			<hr/>
		</div>
		<div class="col-md-3">
			<span class="page-subtitle">Add New System User</span>
		</div>
		<div class="col-md-8 margin-top-10">
			<hr/>
		</div>
	</div>
	<!-- Alerts -->
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible fade in  userAcc-alert-success" role="alert">
				<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Success!</strong> New User is Added.
			</div>

			<div class="alert alert-warning alert-dismissible fade in  userAcc-alert-warning" role="alert">
				<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Warning!</strong>User already exist.
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<span class="txt">Project</span>
			<select name="ua[project_id]" id="project_id" class="form-control">
				<?php
					foreach ($project_list as $project) {
						echo "<option value='".$project->project_id."'>".$project->project_name."</option>";
					}
				?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<span class="txt">First Name</span>
			<input type="text" id="fname" name="ua[fname]" class="form-control">
		</div>

		<div class="col-md-3">
			<span class="txt">Last Name</span>
			<input type="text" id="lname" name="ua[lname]" class="form-control">
		</div>

		<div class="col-md-3">
			<span class="txt">Username</span>
			<input type="text" id="uname" name="ua[uname]" class="form-control">
		</div>

		<div class="col-md-3">
			<span class="txt">Password</span>
			<input type="text" id="pwd" name="ua[pwd]" class="form-control">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<span class="txt">User Type</span>
			<select name="ua[user_type]" id="user_type" class="form-control">
				<?php 
				foreach ($user_access_type as $data) {
					echo "<option>".$data->userType."</option>";
				}
				?>
			</select>
		</div>
	</div>
	<!-- <div class="row">
		<div class="col-md-12 margin-left-30">
			<div class="row">
				<div class="col-md-12">
					<span class="modal-subtitle">Add New User Type</span>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-5">
					<div class="alert alert-success alert-dismissible fade in  userType-alert-success" role="alert">
						<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>Success!</strong> New User Type is Added.
					</div>

					<div class="alert alert-warning alert-dismissible fade in  userType-alert-warning" role="alert">
						<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>Warning!</strong>User Type already exist.
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<span class="txt">User Type</span>
					<input type="text" id="userType" name="ut[userType]" placeholder="Ex. Administrator" class="form-control">
				</div>

				<div class="col-md-1 margin-top-30 margin-right-30">
					<a href="#" class="btn btn-style-1" id="alert" data-toggle="modal" data-target=".addnew"><i class="fa fa-plus"></i> Add Option</a>
				</div>
				<div class="col-md-1 margin-top-30">
					<button class="btn btn-style-2"><i class="fa fa-remove"></i> Cancel </button>
				</div>
			</div>
		</div>
	</div> -->
	<div class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-style-1 animate-4 margin-top-30 pull-right"><i class="fa fa-plus"></i> Add System User </button>
		</div>
	</div>
</form>
<div class="row">
	<div class="col-md-1 margin-top-10">
		<hr/>
	</div>
	<div class="col-md-3">
		<span class="page-subtitle">System User Credentials</span>
	</div>
	<div class="col-md-8 margin-top-10">
		<hr/>
	</div>
</div>

<!-- Table User-->
<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<table class="table userlist">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Username</th>
					<th>Password</th>
					<th>User Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>	        
				<?php 
					foreach ($user_access as $data) {
						echo "
						<tr class='animate-6'>
							<td>".$data->fname."</td>
							<td>".$data->lname."</td>
							<td>".$data->uname."</td>
							<td>".$data->pwd."</td>
							<td>".$data->user_type."</td>
							<td>
								<span class='action'><a href='#' class='' id='alert' data-toggle='modal' data-target='.userAccess'><i class='fa fa-edit' data-item=''></i> Update</a></span> |
								<span class='action'><i class='fa fa-trash-o' data-item=''></i> <a href='#' class='' id='alert' data-toggle='modal' data-target='.deleteAccess'>Delete</a></span>
							</td>
						</tr>
					 ";
					}
				?>
			</tbody>
		</table>

	</div>
</div>
<!-- Page content end -->