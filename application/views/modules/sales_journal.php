<!-- Page content Start -->
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
				<div class="col-md-12  entry-data">
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
<form class="sj-form">
	<!-- Title -->
	<div class="row">
		<div class="dv-header col-md-12">
			<span class="page-title">Sales Journal</span>
		</div>
	</div>
	<!-- Alerts -->
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible fade in  sj-alert-success" role="alert">
				<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Success!</strong> Added New Sales Journal Record.
			</div>

			<div class="alert alert-warning alert-dismissible fade in  sj-alert-warning" role="alert">
				<button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Warning!</strong> Sales Journal already exist.
			</div>
		</div>
	</div>
	<!-- First Row -->
	<div class="row">
		<div class="col-md-3">
			<span class="txt">SI Date:</span>
			<input type="text" placeholder="mm/dd/yyy" class="form-control datepicker main_txtbox" id="sj_si_date" name="sj[sj_si_date]">
		</div>
		<div class="col-md-3">
			<span class="txt">SI #:</span>
			<input type="text" class="form-control main_txtbox" id="sj_si_no" name="sj[sj_si_no]">
		</div>
		<div class="col-md-3">
			<span class="txt">Customer:</span>
			<select class="form-control main_txtbox select2-dropdown show-customer-sj" id="sj_master_name" name="sj[sj_master_name]">
				<option> -- Select Customer --</option>
				<?php 
				foreach ($journal_sj as $data) {
					echo "<option>".$data->master_code." - ".$data->master_name."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-md-3">
			<span class="txt">Terms:</span>
			<select class="form-control main_txtbox select2-dropdown" id="sj_terms" name="sj[sj_terms]">
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
		<div class="col-md-3">
			<span class="txt">SI Amount:</span>
			<input type="text" class="form-control main_txtbox inv_amount" id="sj_si_amount" name="sj[sj_si_amount]">
		</div>
		<div class="col-md-9">
			<span class="txt">Particulars</span>
			<input type="text" class="form-control main_txtbox" id="sj_particulars" name="sj[sj_particulars]">
		</div>
	</div>
	<!-- Third Row: Adding Accounts -->
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
							<td><input type="text" class="form-control entry-debit-total" readonly="true" id="total_debit" name="sj[total_debit]" data-inputmask-clearmaskonlostfocus="false"></td>
							<td><input type="text" class="form-control entry-credit-total"  readonly="true" id="total_credit" name="sj[total_credit]"></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-style-1 animate-4 margin-top-35 pull-right"><i class="fa fa-plus"></i> Add Account</button>
		</div>
	</div>
</form>

<!-- Divider -->
<div class="row">
	<div class="col-md-12">
		<hr/>
	</div>
</div>

<form class="searchSJ-form">
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
				<strong>Warning!</strong> Sales Journal is not existing.
			</div>
		</div>
	</div>
	<!-- Search Fields -->
	<div class="row">
		<div class="col-md-3">
			<span class="txt">SI #:</span>
			<input type="text" class="form-control" id="searchSJ_siNo" name="searchSJ[searchSJ_siNo]">
		</div>
		<div class="col-md-3">
			<span class="txt">SI Date:</span>
			<input type="text" placeholder="mm/dd/yyy" class="form-control datepicker" id="searchSJ_siDate" name="searchSJ[searchSJ_siDate]">
		</div>
		<div class="col-md-2">
			<button type="submit" class="btn btn-style-1 animate-4 margin-top-35"><i class="fa fa-search"></i> Search</button>
		</div>
	</div>
	<!-- Searchec Result Table List -->
	<div class="row">
		<div class="col-md-11">
			<table class="table margin-top-30 search-table">
				<thead>
					<tr>
						<th>SI #</th>
						<th>Date</th>
						<th>Customer</th>
						<th>Particulars</th>
						<th>SI Amount</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-11">
			<a href="#" class="btn btn-style-1 sj-print-list-result animate-4 pull-left"><i class="fa fa-print"></i> Print Result List</a>
		</div>
	</div>
</form>

<!-- Page content end -->