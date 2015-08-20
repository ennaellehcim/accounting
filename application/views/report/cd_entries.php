	<div class='jumbotron'>
		<span>Check Disbursement</span>
	</div>
</div>
<div class="content text-tbody">
	<div class="row">
		<div class="col-md-6 text-float-right">
			<span class="txt padding-left">Voucher #: 
				<?php
					$voucher = $cd_entries->row();
					echo $voucher->cd_voucher_no;
				?>
			</span>
		</div>
		<div class="col-md-6 text-float-right">
			<span class="txt padding-left">Check #: 
				<?php
					$check = $cd_entries->row();
					echo $check->cd_check_no;
				?>
			</span>
		</div>
	</div>

	<div class="container">
		<div class="div-bordered div-wrap">
			<div class="col-md-6">
				<span class="txt padding-left-20"><b>PAY TO THE ORDER OF:</b></span>
			</div>
			<div class="col-md-6">
				<span class="txt padding-left-40">
				<?php
					$name = $cd_entries->row();
					echo $name->cd_payee_name;
				?>
				</span>
			</div>
		</div>
		<div class="div-bordered div-wrap">
			<div class="col-md-6">
				<span class="txt padding-left-20"><b>Date:</b>
				<?php
					$date = $cd_entries->row();
					echo $date->cd_date;
				?>
				</span>
			</div>
			<div class="col-md-6">
				<span class="txt padding-left-20"><b>Bank Name:</b> 
				<?php
					$bank = $cd_entries->row();
					echo $bank->cd_master_name;
				?>
				</span>
			</div>
		</div>
	</div>
	
	<div class='row'>
		<table class='table text-tbody table-header-bordered'>
			<thead>
				<tr >
					<th class='one-fourth text-left text-center'>Account Code</th>
					<th class='one-half text-left text-center'>Account Name</th>
					<th class='text-left text-center'>Debit (DR)</th>
					<th class='text-left text-center'>Credit (CR)</th>
				</tr>
			</thead>
			<tbody>
				<!-- Showing of entries -->
				<?php
				foreach($cd_entries->result() as $key){
					echo "<tr>";
					echo "	<td class='padding-left-10 one-fourth text-left table-td-outline-left '>".$key->cd_trans_account_code."</td>";
					echo "	<td class='padding-left-10 one-half text-left table-td-outline-left '>".$key->cd_trans_sub_name."</td>";
					echo "	<td class='padding-left-10 table-td-outline-left text-right padding-right-5'>".$key->cd_trans_dr."</td>";
					echo "	<td class='padding-left-10 table-td-outline-left text-right table-td-outline-right padding-right-5'>".$key->cd_trans_cr."</td>";
					echo "</tr>";
				}
				?>
				<?php
					$total = $cd_entries->row();
					echo "<tr>";
					echo "	<td class='text-bold table-td-outline-bottom table-td-outline-top table-td-outline-left text-left'>TOTAL</td>";
					echo "	<td class='table-td-outline-bottom table-td-outline-top table-td-outline-left text-right'>.</td>";
					echo "	<td class='text-bold table-td-outline-bottom table-td-outline-top table-td-outline-left text-right padding-right-5'>".$total->total_debit."</td>";
					echo "	<td class='text-bold table-td-outline-bottom table-td-outline-top table-td-outline-left text-right  padding-right-5 table-td-outline-right'>".$total->total_credit."</td>";
					echo "</tr>";
				?>
				<!-- Showing of Particulars -->
				<?php
					$part = $cd_entries->row();
					echo "<tr>";
					echo "	<td colspan='4' class='table-td-outline-bottom table-td-outline-top table-td-outline-left table-td-outline-right text-left'><b><i>Particulars</i></b> : ".$part->cd_particulars."</td>";
					echo "</tr>";
				?>

				<tr>
					<td class="table-td-outline-bottom table-td-outline-left"><b>PAY THIS AMOUNT</b></td>
					<td class="table-td-outline-bottom table-td-outline-left">In Words:</td>
					<td colspan="2" class="table-td-outline-bottom table-td-outline-left table-td-outline-right">Figure:</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="container">
		<div class="div-bordered div-wrap-footer">
			<div class="col-md-6">
				<span class="txt">Prepared by:</span>
			</div>
			<div class="col-md-6">
				<span class="txt">________________________</span>
				<span class="txt text-10"><i>Signature over Printed name</i></span>
				<span class="txt text-10 span-footer">Date:</span>
			</div>
		</div>
		<div class="div-bordered div-wrap-footer">
			<div class="col-md-6">
				<span class="txt">Checked by:</span>
			</div>
			<div class="col-md-6">
				<span class="txt">________________________</span>
				<span class="txt text-10 span-footer"><i>Signature over Printed name</i></span>
				<span class="txt text-10">Date:</span>
			</div>
		</div>
		<div class="div-bordered div-wrap-footer">
			<div class="col-md-6">
				<span class="txt">Approved by:</span>
			</div>
			<div class="col-md-6">
				<span class="txt">________________________</span>
				<span class="txt text-10 span-footer"><i>Signature over Printed name</i></span>
				<span class="txt text-10">Date:</span>
			</div>
		</div>
		<div class="div-bordered div-wrap-footer">
			<div class="col-md-6">
				<span class="txt">Payment Received by:</span>
			</div>
			<div class="col-md-6">
				<span class="txt">_________________________</span>
				<span class="txt text-10 span-footer"><i>Signature over Printed name</i></span>
				<span class="txt text-10">Date:</span>
			</div>
		</div>
	</div>
</div>
