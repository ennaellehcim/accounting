<!-- Page content Start -->
<form class="master-form">
	<!-- Title -->
	<div class="row">
		<div class="dv-header col-md-12">
			<span class="page-title">Master Account</span>
		</div>
	</div>
	<!-- Alerts -->
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible fade in  master-alert-success" role="alert">
				<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Success!</strong> Added New Master Account Record.
			</div>

			<div class="alert alert-warning alert-dismissible fade in  master-alert-warning" role="alert">
				<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Warning!</strong> Master Account already exist.
			</div>
		</div>
	</div>
	<!-- First Row Info -->
	<div class="row">
		<input  type="hidden" value="<?=$this->session->userdata('project_id')?>" name="master[project_id]" >
		<div class="col-md-3">
			<span class="txt">Date:</span>
			<input type="text" placeholder="mm/dd/yyy" id="master_date" name="master[master_date]" class="form-control datepicker main_txtbox">
		</div>
		<div class="col-md-2">
			<span class="txt">Code:</span>
			<input type="text" id="master_code" name="master[master_code]" class="form-control main_txtbox" />
		</div>
		<div class="col-md-4">
			<span class="txt">Name:</span>
			<input type="text" id="master_name" name="master[master_name]" class="form-control main_txtbox" />
		</div>
		<div class="col-md-3">
			<span class="txt">Type:</span>
			<select class="form-control main_txtbox select2-dropdown" id="master_type" name="master[master_type]">
				<option value="Supplier">Supplier</option>
				<option value="Customer">Customer</option>
				<option value="Employee">Employee</option>
				<option value="Bank">Bank</option>
				<option value="Others">Others</option>
			</select>
		</div>
	</div>
	<!-- Second Row Info -->
	<div class="row">
		<div class="col-md-9">
			<span class="txt">Address:</span>
			<textarea class="form-control main_txtbox" id="master_add" name="master[master_add]"></textarea>
		</div>
		<div class="col-md-3">
			<span class="txt">Terms of Payment:</span>
			<select class="form-control main_txtbox select2-dropdown" id="master_terms" name="master[master_terms_payment]">
				<option value="0">0</option>
				<option value="15">15</option>
				<option value="30">30</option>
				<option value="60">60</option>
				<option value="120">120</option>
			</select>
		</div>
	</div>
	<!-- Third Row Info -->
	<div class="row">
		<div class="col-md-6">
			<span class="txt">Contact Person:</span>
			<input type="text" class="form-control main_txtbox" id="master_contact_person" name="master[master_contact_person]" />
		</div>
		<div class="col-md-3">
			<span class="txt">Position:</span>
			<input type="text" id="master_position" name="master[master_position]" class="form-control main_txtbox" />
		</div>
		<div class="col-md-3">
			<span class="txt">Tel No:</span>
			<input type="text" id="master_tel_no" name="master[master_tel_no]" class="form-control main_txtbox" />
		</div>
	</div>
	<!-- 4th Row Info -->
	<div class="row">
		<div class="col-md-6">
			<span class="txt">Email Address:</span>
			<input type="text" id="master_email" name="master[master_email]" class="form-control main_txtbox" />
		</div>
		<div class="col-md-3">
			<span class="txt">Fax No:</span>
			<input type="text" class="form-control main_txtbox" id="master_fax_no" name="master[master_fax_no]"/>
		</div>

		<div class="col-md-3">
			<span class="txt">Auto Create in Subsidiary:</span>
			<select class="form-control main_txtbox select2-dropdown" id="master_subsidiary" name="master[master_subsidiary]">
				<option> -- Select Account -- </option>
				<?php
					foreach ($account_title->result() as $data) {
						echo "<option value='".$data->account_code."'>".$data->account_title."</option>";
					}
				?>
			</select>
		</div>
	</div>

	<!-- Add Master Account button -->
	<div class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-style-1 margin-top-30 animate-4 pull-right"><i class="fa fa-plus"></i> Add Account </button>
		</div>
	</div>	

	
</form>

<!-- Divider -->
<div class="row">
	<div class="col-md-12">
		<hr/>
	</div>
</div>
<form class="searchMaster-form">
	<!-- SubTitle -->
	<div class="row">
		<div class="dv-header col-md-12">
			<span class="page-title">Accounts Record</span>
		</div>
	</div>
	<!-- Alerts -->
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-warning alert-dismissible fade in  search-alert-warning" role="alert">
				<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Warning!</strong> Main Account is not existing.
			</div>
		</div>
	</div>
	<!-- Search Fields -->
	<div class="row">
		<div class="dv-header col-md-4">
			<span class="txt">Name:</span>
			<input type="text" class="form-control" id="searchMaster_name" name="searchMaster[searchMaster_name]" />
		</div>
		<div class="dv-header col-md-4">
			<span class="txt">Type:</span>
			<input type="text" class="form-control" id="searchMaster_type" name="searchMaster[searchMaster_type]" />
		</div>
		<div class="col-md-4">
			<button type="submit" class="btn btn-style-1 animate-4 pull-left margin-top-30"><i class="fa fa-search"></i> Search</button>
		</div>
	</div>
</form>

<!-- Seached Table List -->
<div class="row">
	<div class="col-md-9">
		<table class="table margin-top-30 search-table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Addres</th>
					<th>Contact Person</th>
					<th>Contact Number</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
</div>
<!-- Print Button -->
<div class="row">
	<div class="col-md-11">
		<a href="#" class="btn-style-1 animate-4 pull-left masteraccount-report-print"><i class="fa fa-print"></i> Print Result List</a>
	</div>
</div>
<!-- Page content end