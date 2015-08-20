<!--Page content Start -->
<!--Add Transaction access Modal-->
<div class="modal fade addTrans" role="dialog" aria-labelledby="" aria-hidden="true" id="addTrans">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header modal-header-bg">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="">Add Transaction</h4>
			</div>
			<div class="modal-body">
				<form class="search-chartaccount" action="post">
					<!-- Alerts -->
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-warning alert-dismissible fade in  chart-alert-warning" role="alert">
								<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
								<strong>Warning!</strong> Accounts is not existing.
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<span class="txt">Account Code</span>
							<input type="text" class="form-control entry-text" value="" name="chart[account_code]">
						</div>

						<div class="col-md-9">
							<span class="txt">Account Title</span>
							<select class="form-control select2-dropdown entry-select"  name="chart[account_title]">
								<option value="">-- Select Account Title --</option>
								<?php
								foreach ($account_title->result() as $title) {
									echo "<option>".$title->account_code." - ".$title->account_title."</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<span class="txt">Subsidiary Code</span>
							<input type="text" class="form-control sub-input-masked entry-subcode " name="chart[sub_code]" data-inputmask-clearmaskonlostfocus="false">
						</div>

						<div class="col-md-7">
							<span class="txt">Subsidiary Name</span>
							<select class="form-control select2-dropdown entry-subname">
							</select>
						</div>

						<div class="col-md-2">
							<button class="btn btn-style-1 margin-top-30 pull-right"><i class='fa fa-search'></i> Search</button>
						</div>
					</div>
				</form>
				<!-- divider -->
				<div class="row">
					<div class="col-md-1">
						<hr>
					</div>
					<div class="col-md-3">
						<span class="modal-subtitle">Transaction Result</span>
					</div>
					<div class="col-md-8">
						<hr/>
					</div>
				</div>
				<!-- Table List result -->
				<!-- System must be detect if there is no subsidiary. -->
				<!-- Alerts -->
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-warning alert-dismissible fade in  entries-alert-warning" role="alert">
							<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
							<strong>Warning!</strong> No Transaction Selected!
						</div>
					</div>
				</div>
				<div class="col-md-12 entry-data">
					<table id="tb_show_entries" class="table chart-table">
						<thead>
							<tr>
								<th></th>
								<th>Account Code</th>
								<th>Account Title</th>
								<th>Subsidiary Code</th>
								<th>Subsidiary Name</th>
							</tr>
						</thead>
						<tbody class="tran_data">
	
						</tbody>
					</table>
				</div>
				<div class="row"></div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-style-1 btn-add-trans" type="button" >Add Transaction</button>
				<button class="btn btn-style2 " data-dismiss="modal" aria-label="Close"> Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<form class="cr-form">
	<!-- Title -->
	<div class="row">
		<div class="dv-header col-md-12">
			<span class="page-title">Cash Recipts</span>
		</div>
	</div>
	<!-- Alerts -->
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible fade in  cr-alert-success" role="alert">
				<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Success!</strong> Added New Cash Receipts Record.
			</div>

			<div class="alert alert-warning alert-dismissible fade in  cr-alert-warning" role="alert">
				<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Warning!</strong> Cash Receipts already exist.
			</div>
		</div>
	</div>
	<!-- First Row -->
	<div class="row">
		<div class="col-md-2">
			<span class="txt">OR #:</span>
			<input type="text" class="form-control main_txtbox" id="cr_or_no" name="cr[cr_or_no]">
		</div>
		<div class="col-md-3">
			<span class="txt">OR Date:</span>
			<input type="text" placeholder="mm/dd/yyy" class="form-control datepicker main_txtbox" id="cr_or_date" name="cr[cr_or_date]">
		</div>
		<div class="col-md-4">
			<span class="txt">Customer:</span>
			<select class="form-control main_txtbox show-customer select2-dropdown" id="cr_master_name_customer" name="cr[cr_master_name_customer]">
				<option> -- Select Customer -- </option>
				<?php 
				foreach ($journal_cr_customer as $data) {
					echo "<option>".$data->master_code." - ".$data->master_name."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-md-3">
			<span class="txt">SI #:</span>
			<input type="text" class="form-control main_txtbox" id="cr_sj_si_no" name="cr[cr_sj_si_no]">
		</div>
	</div>
	<!-- Second Row -->
	<div class="row">
		<div class="col-md-5">
			<span class="txt">Bank:</span>
			<select class="form-control main_txtbox show-bank select2-dropdown" id="cr_master_name_bank" name="cr[cr_master_name_bank]">
				<?php 
				foreach ($journal_cr_bank as $data) {
					echo "<option data-code='".$data->sub_code."'>".$data->sub_name."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-md-2">
			<span class="txt">Cleared?:</span>
			<select class="form-control main_txtbox select2-dropdown" id="cr_cleared" name="cr[cr_cleared]">
				<option>Yes</option>
				<option>No</option>
			</select>
		</div>
		<div class="col-md-2">
			<span class="txt">Date Cleared:</span>
			<input type="text" placeholder="mm/dd/yyy" class="form-control datepicker main_txtbox" id="cr_cleared_date" name="cr[cr_cleared_date]">
		</div>
		<div class="col-md-3">
			<span class="txt">OR Amount:</span>
			<input type="text" class="form-control main_txtbox inv_amount" id="cr_or_amount" name="cr[cr_or_amount]">
		</div>
	</div>
	<!-- Third Row -->
	<div class="row">
		<div class="col-md-12">
			<span class="txt">Particulars:</span>
			<input type="text" class="form-control main_txtbox" id="cr_particulars" name="cr[cr_particulars]">
		</div>
	</div>
	<!-- fourth Row: Adding Accounts -->
	<div class="row">
		<div class="col-md-12">
			<div class="table">
				<table class="table" id="tb_entries">
					<thead>
						<tr>
							<th>Account Code</th>
							<th>Title</th>
							<th>Debit (DR)</th>
							<th>Credit (CR)</th>
							<th>
								<a href="#" class="btn-style-1 animate-4 margin-top-30 pull-right" id='alert' data-toggle='modal' data-target='.addTrans'><i class="fa fa-plus"></i></a>
							</th>
						</tr>
						<tr>
							<td></td><td></td>
							<td colspan="2">
								<span class=""><b>Note</b>: Please indicate zero (0) if amount is not avilable.</span>
							</td>
						</tr>
					</thead>
					<tbody class="entry-list">
						<tr class="row_total">
							<td colspan="2">TOTAL</td>
							<td><input type="text" class="form-control entry-debit-total" readonly="true" id="total_debit" name="cr[total_debit]" data-inputmask-clearmaskonlostfocus="false"></td>
							<td><input type="text" class="form-control entry-credit-total"  readonly="true" id="total_credit" name="cr[total_credit]"></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- Add AP Button -->
	<div class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-style-1 animate-4 margin-top-30 pull-right"><i class="fa fa-plus"></i> Add Account</button>
		</div>
	</div>
</form>

	<!-- Divider -->
	<div class="row">
		<div class="col-md-12">
			<hr/>
		</div>
	</div>

	<form class="searchCR-form">
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
					<strong>Warning!</strong> Cash Receipts is not existing.
				</div>
			</div>
		</div>
		<!-- Serach Fields -->
		<div class="row">
			<div class="col-md-3">
				<span class="txt">OR #:</span>
				<input type="text" class="form-control" id="searchCR_orNo" name="searchCR[searchCR_orNo]">
			</div>
			<div class="col-md-3">
				<span class="txt">OR Date:</span>
				<input type="text" placeholder="mm/dd/yyy" class="form-control datepicker" id="searchCR_date" name="searchCR[searchCR_date]">
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-style-1 animate-4 pull-left margin-top-35"><i class="fa fa-search"></i> Search</button>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10">
				<table class="table margin-top-30 search-table">
					<thead>
						<tr>
							<th>OR #</th>
							<th>Date</th>
							<th>Customer</th>
							<th>Particulars</th>
							<th>OR Amount</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10">
				<a href="#" class="btn-style-1 cr-print-list-result animate-4 pull-left"><i class="fa fa-print"></i> Print Result List</a>
			</div>
		</div>
	</form>
	
<!-- Page content end