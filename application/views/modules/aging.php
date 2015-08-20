<!-- Page content Start -->
<!-- Title -->
<form class="aging-form">
	<div class="row">
		<div class="dv-header col-md-12">
			<span class="page-title">Aging Report</span>
		</div>
	</div>
	<!-- First Row -->
	<div class="row">
		<div class="col-md-3">
			<span class="txt">As of</span>
			<input type="text" class="form-control datepicker" placeholder="mm/dd/yyyy">
		</div>
		<div class="col-md-3">
			<span class="txt">Report</span>
			<select name="aging[aging_report_type]" id="aging_report_type" class="form-control select2-dropdown">
				<option value="1">Aging of Payables</option>
				<option value="2">Aging of Receivables</option>
			</select>
		</div>
		<div class="col-md-3 margin-top-30">
			<a href="#" class="btn btn-style-1 aging-report-print"><i class="fa fa-refresh"></i> Generate</a>
		</div>
	</div>
</form>

<!-- Page content end -->