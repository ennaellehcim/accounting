<!-- Page content Start -->

<!--Add Transaction access Modal-->
<div class="modal fade addTrans"  role="dialog" aria-labelledby="" aria-hidden="true" id="addTrans">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header modal-header-bg">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="">Add Transaction</h4>
			</div>
			<div class="modal-body">
				<form class="search-chartaccount">
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
							<select id="" class="form-control select2-dropdown entry-select" >
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
							<input type="text" id="" class="form-control sub-input-masked entry-subcode " name="chart[sub_code]" data-inputmask-clearmaskonlostfocus="false">
						</div>

						<div class="col-md-7">
							<span class="txt">Subsidiary Name</span>
							<select id="" class="form-control select2-dropdown entry-subname">
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
					<table id="tb_show_entries" class="table chart-table ">
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
<form class="ap-form">
	<!-- Title -->
	<div class="row">
		<div class="dv-header col-md-12">
			<span class="page-title">Accounts Payable</span>
		</div>
	</div>
	<!-- Alerts -->
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible fade in  ap-alert-success" role="alert">
				<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Success!</strong> Added New Account Payable Record.
			</div>

			<div class="alert alert-warning alert-dismissible fade in  ap-alert-warning" role="alert">
				<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Warning!</strong> Account Payable already exist.
			</div>
		</div>
	</div>
	<!-- First Row -->
	<div class="row">
		<div class="col-md-3">
			<span class="txt">Invoice Date:</span>
			<input type="text" placeholder="mm/dd/yyy" class="form-control datepicker main_txtbox" id="ap_invoice_date" name="ap[ap_invoice_date]">
		</div>
		<div class="col-md-3">
			<span class="txt">Invoice #:</span>
			<input type="text" class="form-control main_txtbox" id="ap_ivoice_no" name="ap[ap_invoice_no]">
		</div>
		<div class="col-md-3">
			<span class="txt">PO #:</span>
			<input type="text" class="form-control main_txtbox" id="ap_po_no" name="ap[ap_po_no]">
		</div>
		<div class="col-md-3">
			<span class="txt">Terms:</span>
			<select class="form-control main_txtbox select2-dropdown" id="">
				<option value="0">0</option>
				<option value="7">7</option>
				<option value="15">15</option>
				<option value="30">30</option>
				<option value="60">60</option>
				<option value="120">120</option>
			</select>
		</div>
	</div>
	<!-- Second Row -->
	<div class="row">
		<div class="col-md-5">
			<span class="txt">Supplier:</span>
			<select class="form-control main_txtbox show-supplier select2-dropdown" id="ap_master_name" name="ap[ap_master_name]">
				<option> -- Select Supplier -- </option>
				<?php 
				foreach ($bank_recon as $data) {
					echo "<option>".$data->master_code." - ".$data->master_name."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-md-4">
			<span class="txt">Expenses:</span>
			<select class="form-control main_txtbox show-expenses select2-dropdown" id="ap_expenses">
				<option> -- Select Expense -- </option>
				<?php 
				foreach ($accounts_payable as $data) {
					echo "<option>".$data->account_code." - ".$data->account_title."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-md-3">
			<span class="txt">Invoice Amount:</span>
			<input type="text" class="form-control main_txtbox inv_amount" id="ap_invoice_amount" name="ap[ap_invoice_amount]">
		</div>
	</div>
	<!-- Third Row -->
	<div class="row">
		<div class="col-md-12">
			<span class="txt">Particulars:</span>
			<input type="text" class="form-control main_txtbox" id="ap_particulars" name="ap[ap_particulars]">
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
							<td><input type="text" class="form-control entry-debit-total" readonly="true" name="ap[total_debit]" data-inputmask-clearmaskonlostfocus="false"></td>
							<td><input type="text" class="form-control entry-credit-total"  readonly="true" name="ap[total_credit]"></td>
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

<form class="searchAP-form">
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
				<strong>Warning!</strong> Accounts Payable is not existing.
			</div>
		</div>
	</div>
	<!-- Search Fields -->
	<div class="row">
		<div class="col-md-2">
			<span class="txt">Invoice #:</span>
			<input type="text" class="form-control" id="searchAP_invNo" name="searchAP[searchAP_invNo]">
		</div>
		<div class="col-md-3">
			<span class="txt">Invoice Date:</span>
			<input type="text" placeholder="mm/dd/yyy" class="form-control datepicker" id="searchAP_date" name="searchAP[searchAP_date]">
		</div>
		<div class="col-md-3">
			<span class="txt">Supplier's Name:</span>
			<input type="text" class="form-control" id="searchAP_suppName" name="searchAP[searchAP_suppName]">
		</div>
		<div class="col-md-2">
			<span class="txt">PO #:</span>
			<input type="text" class="form-control" id="searchAP_po" name="searchAP[searchAP_po]">
		</div>
		<div class="col-md-2">
			<button type="submit" class="btn btn-style-1 animate-4 margin-top-35"><i class="fa fa-search"></i> Search</button>
		</div>
	</div>
	<!-- Searched result Table List -->
	<div class="row">
		<div class="col-md-11">
			<table class="table margin-top-30 search-table">
				<thead>
					<tr>
						<th>Invoice #</th>
						<th>Invoice Date</th>
						<th>Supplier</th>
						<th>Particulars</th>
						<th>Invoice Amount</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
	<!-- Print Button -->
	<div class="row">
		<div class="col-md-12">
			<a href="#" class="btn-style-1 animate-4 pull-left print-list-result"><i class="fa fa-print"></i> Print Result List</a>
		</div>
	</div>
</form>


<!-- Page content end