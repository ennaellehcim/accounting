<!-- Page content Start -->
<!-- Title -->
<div class="row">
	<div class="dv-header col-md-12">
		<span class="page-title">Accounts Receivable</span>
	</div>
</div>
<!-- First Row -->
<div class="row">
	<div class="col-md-6">
		<span class="txt">Customer:</span>
		<select class="form-control">
			<?php 
				foreach ($accounts_receivable as $data) {
					echo "<option>".$data->master_name."</option>";
				}
			?>
		</select>
	</div>
	<div class="col-md-2">
		<a href="#" class="btn-style-1 animate-4 margin-top-35"><i class="fa fa-search"></i> Search</a>
	</div>
</div>
<!-- Divider -->
<div class="row">
	<div class="col-md-12">
		<hr/>
	</div>
</div>
<!-- Searched Results Table List -->
<div class="row">
	<div class="col-md-12">
		<table class="table margin-top-30">
			<thead>
				<tr>
					<th>No</th>
					<th>OR #</th>
					<th>OR Date</th>
					<th>Particulars</th>
					<th>Debit</th>
					<th>Credit</th>
					<th>Balance</th>
				</tr>
			</thead>
			<tbody id="datalist">
				<tr>
					<td>1</td>
					<td>ADMAX_EDU-0001</td>
					<td>7/25/2010</td>
					<td>PERIOD COVERED JULY 19-25, 2010</td>
					<td>38,631.60</td>
					<td>0.00</td>
					<td>38,631.60</td>
				</tr>
				<tr>
					<td>1</td>
					<td>ADMAX_EDU-0001</td>
					<td>7/25/2010</td>
					<td>PERIOD COVERED JULY 19-25, 2010</td>
					<td>38,631.60</td>
					<td>0.00</td>
					<td>38,631.60</td>
				</tr>
				<tr>
					<td>1</td>
					<td>ADMAX_EDU-0001</td>
					<td>7/25/2010</td>
					<td>PERIOD COVERED JULY 19-25, 2010</td>
					<td>38,631.60</td>
					<td>0.00</td>
					<td>38,631.60</td>
				</tr>
				<tr>
					<td>1</td>
					<td>ADMAX_EDU-0001</td>
					<td>7/25/2010</td>
					<td>PERIOD COVERED JULY 19-25, 2010</td>
					<td>38,631.60</td>
					<td>0.00</td>
					<td>38,631.60</td>
				</tr>
				<tr>
					<td>1</td>
					<td>ADMAX_EDU-0001</td>
					<td>7/25/2010</td>
					<td>PERIOD COVERED JULY 19-25, 2010</td>
					<td>38,631.60</td>
					<td>0.00</td>
					<td>38,631.60</td>
				</tr>
				<tr>
					<td>1</td>
					<td>ADMAX_EDU-0001</td>
					<td>7/25/2010</td>
					<td>PERIOD COVERED JULY 19-25, 2010</td>
					<td>38,631.60</td>
					<td>0.00</td>
					<td>38,631.60</td>
				</tr>

			</tbody>
		</table>
	</div>
</div>
<!-- Print Button -->
<div class="row">
	<div class=" col-md-11">
		<a href="#" class="btn-style-1 animate-4 pull-left"><i class="fa fa-print"></i> Print Result </a>
	</div>
</div>
<!-- Page content end -->