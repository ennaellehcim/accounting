$(document).ready(function(){
	side_panel_location();
	page_padding();

	$('.form-control').change(function(){
		if ($(this).hasClass('error')){
			($(this).val().length>0) ? ($(this).removeClass('error')):($(this).addClass('error'));
		}
	});	

	$(".accountgroup-item").click(function(e){
		alert($(this).attr('data-item'));
	});

	//Format txtbx
	$('.inv_amount').on('change keyup keydown', function() {
		var credit = $('.inv_amount').val();
		var number = accounting.formatMoney(credit, {
			symbol 		: '',
			precision 	: 0,
			thousand  	: ',',
			decimal   	: ".",
			format: {
				pos  : '%s %v',
				zero : '%s  0',
			}
		});
		$('.inv_amount').val(number);
	});



});

$(window).resize(function(){
	side_panel_location();
	page_padding();
	
	//show/hide side panel when resize
	($(window).width() < 767) ?	$('body').hasClass('open-nav') ? $('body').removeClass('open-nav') : '' : $('body').hasClass('open-nav') ? '' : $('body').addClass('open-nav');
});

function side_panel_location(){
	var el = $('.dv-page-left-panel');
	el.css({
		'top':		$('.dv-page-header').height()+'px',
		'height':	($(window).height()-$('.dv-page-header').height())+'px'
	});
	setTimeout(function(){
		el.niceScroll({
			cursoropacitymax:	'0.8',
			cursorcolor:		'#8eb92a',
			cursorborderradius:	'0px',
			cursorborder:		'0px'
		});
		el.getNiceScroll().resize();
	});
}


function page_padding(){
	$('.dv-page-main').css({
		'margin-top':	$('.dv-page-header').height()+'px'
	})
}
$('.lnk-close-nav').click(function(){
	$('body').toggleClass('open-nav');
});

$(".menu-link").click(function(e){
	e.preventDefault();

    //$(".dv-page-main").html('<img style="margin:0px;" src="http://www.mytreedb.com/uploads/mytreedb/loader/ajax_loader_gray_64.gif"/>');
    $(document).skylo('start');

    setTimeout(function(){
    	$(document).skylo('set',50);
    },1000);

    $(".ul-link").removeClass('in');
    $(".tab-link").removeClass('active');
    $(".menu-link").removeClass('active');

    $('#'+$(this).data("tab")).addClass('active');
    $('#'+$(this).data("ul")).addClass('in');
    $(this).addClass('active');

    $.ajax({
    	type: 'POST', 
    	datatype:'json',
    	url: $(this).data("address")+"/load_page"
    }).done(function( response ) {
    	$( ".dv-content" ).html( response );
    	onload_functions()
    	setTimeout(function(){
    		$(document).skylo('end');
    	},100);
    });
});



function onload_functions(){
	//$("#table-account-group").niceScroll({touchbehavior:false,cursorcolor:"#fff",cursoropacitymax:0.5,cursorwidth:2,background:"#292a2d"});
	$('.datepicker').datepicker({
	    startDate: ''//for date limit
	});

	$(".select2-dropdown").select2();

	$('.accountype-placeholder').change(function(){
		$('.accountcode-placeholder').attr('Placeholder',$(this).val());
		if ($(this).val()=='Assets') {
			$('.accountcode-placeholder').attr('Placeholder','1000');
			
		}
		else if($(this).val()=='Liabilities'){
			$('.accountcode-placeholder').attr('Placeholder','2000');
		}
		else if($(this).val()=='Capital'){
			$('.accountcode-placeholder').attr('Placeholder','3000');
		}
		else if($(this).val()=='Revenue'){
			$('.accountcode-placeholder').attr('Placeholder','4000');
		}
		else if($(this).val()=='Expense'){
			$('.accountcode-placeholder').attr('Placeholder','5000');
		}

		$.ajax({ 
			type: 'POST', 
			datatype:'json',
			url: site_url+'system_settings/get_accountgroup', 
			data: {type : $(this).val()},
			success: function (data) { 
				if(data.success==1){
					$('#account_group').empty();
					$(data.response).appendTo($('#account_group')).hide().fadeIn(1000);
				}
			}
		});		
	});

	$('.sub-accounttype').change(function(){
		$('.sub-accountcode').attr('Placeholder',$(this).val());
		if ($(this).val()=='Assets') {
			$('.sub-accountcode').attr('Placeholder','1000');
			
		}
		else if($(this).val()=='Liabilities'){
			$('.sub-accountcode').attr('Placeholder','2000');
		}
		else if($(this).val()=='Capital'){
			$('.sub-accountcode').attr('Placeholder','3000');
		}
		else if($(this).val()=='Revenue'){
			$('.sub-accountcode').attr('Placeholder','4000');
		}
		else if($(this).val()=='Expense'){
			$('.sub-accountcode').attr('Placeholder','5000');
		}

		$.ajax({ 
			type: 'POST', 
			datatype:'json',
			url: site_url+'subsidiary_account/get_mainaccounts', 
			data: {type : $(this).val()},
			success: function (data) { 
				if(data.success==1){
					$('.sub_account_title').empty();
					$(data.html).appendTo($('.sub_account_title'));
				}
			}
		});		
	});
	$('.sub_account_title').change(function(){
		$('.sub-accountcode').val($(this).val().substring(0,5));
	});

	$('#searchAccount_type').change(function(){
		$('#searchaccount_code').attr('Placeholder',$(this).val());
		if ($(this).val()=='Assets') {
			$('#searchaccount_code').attr('Placeholder','1000');
			
		}
		else if($(this).val()=='Liabilities'){
			$('#searchaccount_code').attr('Placeholder','2000');
		}
		else if($(this).val()=='Capital'){
			$('#searchaccount_code').attr('Placeholder','3000');
		}
		else if($(this).val()=='Revenue'){
			$('#searchaccount_code').attr('Placeholder','4000');
		}
		else if($(this).val()=='Expense'){
			$('#searchaccount_code').attr('Placeholder','5000');
		}
	});
	
	$("#filter").change(function(){
		if ($("#filter").val()=='All') {
			$("#accountgroup-table  tbody tr  td").parent("tr").slideDown("slow");
		}
		else{
			$("#accountgroup-table  tbody tr").slideUp("slow");
			$("#accountgroup-table  tbody tr  td:contains('"+$(this).val()+"')").parent("tr").slideDown("slow");
		};
	});

	$('.error').click(function(e){
		$(this).slideUp(400);
	});

	//mask input
	//$(".sub-input-masked").inputmask("99999-99999-99999-99999");

	form_submit();

	//Adding supplier name in the tbl enties
	$('.show-supplier').change(function() {
		var supp_name = $(this).val().substring(5);
		var master_code = $(this).val().substring(0,3);

		$.ajax({ 
			type: 'POST', 
			datatype:'json',
			url: site_url+'login/login_user', 
			data: loginformData,
			success: function (data) { 
				if(data.success==1){
					var data = '<tr><td><input type="hidden" name="ap_entry[code][]" value="'+master_code+'"/>'+master_code+'</td><td><input type="hidden" name="ap_entry[accname][]"  value="ACCOUNTS PAYABLE - '+supp_name+' "/>ACCOUNTS PAYABLE - '+supp_name+' </td><td><input type="text" class="form-control entry-debit" id="ap_trans_debit_amount" name="ap_entry[accdebit][]" ></td><td><input type="text" class="form-control entry-credit" id="ap_trans_credit_amount" name="ap_entry[acccredit][]" value=""></td><td><a href="#" class="btn-style-2 animate-4 pull-right btn-remove"><i class="fa fa-minus"></i></a></td></tr>';
					$('#tb_entries > tbody:first').prepend(data);
				}
				else{
					alert('Add subsdiary for this');
				}
			}
		});		
	});
	// end of adding the supplier name

	//Adding expenses in the tbl enties
	$('.show-expenses').change(function() {
		var expense_name = $(this).val().substring(8); 
		var acc_code = $(this).val().substring(0,5);
		var data = '<tr><td><input type="hidden" name="ap_entry[code][]" value="'+acc_code+'"/>'+acc_code+'</td><td><input type="hidden" name="ap_entry[accname][]"  value=" '+expense_name+' "/> '+expense_name+'</td><td><input type="text" class="form-control entry-debit" id="ap_trans_debit_amount" name="ap_entry[accdebit][]" ></td><td><input type="text" class="form-control entry-credit" id="ap_trans_credit_amount" name="ap_entry[acccredit][]" value=""></td><td><a href="#" class="btn-style-2 animate-4 pull-right btn-remove"><i class="fa fa-minus"></i></a></td></tr>';
		$('#tb_entries > tbody:first').prepend(data);
	});

	//Adding bank in the tbl enties
	$('.show-bank').change(function() {
		var bank_name = $(this).val(); 
		var bank_code = $(this).find(':selected').data('code');
		var data = '<tr><td><input type="hidden" name="ap_entry[code][]" value="'+bank_code+'"/>'+bank_code+'</td><td><input type="hidden" name="ap_entry[accname][]"  value="CASH IN BANK - '+bank_name+' "/>CASH IN BANK - '+bank_name+'</td><td><input type="text" class="form-control entry-debit" id="ap_trans_debit_amount" name="ap_entry[accdebit][]" ></td><td><input type="text" class="form-control entry-credit" id="ap_trans_credit_amount" name="ap_entry[acccredit][]" value=""></td><td><a href="#" class="btn-style-2 animate-4 pull-right btn-remove"><i class="fa fa-minus"></i></a></td></tr>';
		$('#tb_entries > tbody:first').prepend(data);
	});

	//Adding customer in the tbl enties
	$('.show-customer').change(function() {
		var customer_name = $(this).val().substring(5); 
		var master_code = $(this).val().substring(0,3);
		var data = '<tr><td><input type="hidden" name="ap_entry[code][]" value="'+master_code+'"/>'+master_code+'</td><td><input type="hidden" name="ap_entry[accname][]"  value="ACCOUNTS RECEIVABLE - '+customer_name+' "/>ACCOUNTS RECEIVABLE - '+customer_name+'</td><td><input type="text" class="form-control entry-debit" id="ap_trans_debit_amount" name="ap_entry[accdebit][]" ></td><td><input type="text" class="form-control entry-credit" id="ap_trans_credit_amount" name="ap_entry[acccredit][]" value=""></td><td><a href="#" class="btn-style-2 animate-4 pull-right btn-remove"><i class="fa fa-minus"></i></a></td></tr>';
		$('#tb_entries > tbody:first').prepend(data);
	});
	//Adding customer in the tbl enties Sales Journal
	$('.show-customer-sj').change(function() {
		var customer_name = $(this).val().substring(5); 
		var master_code = $(this).val().substring(0,3);
		var data = '<tr><td><input type="hidden" name="ap_entry[code][]" value="'+master_code+'"/>'+master_code+'</td><td><input type="hidden" name="ap_entry[accname][]"  value="SALES REVENUE - '+customer_name+' "/>SALES REVENUE - '+customer_name+'</td><td><input type="text" class="form-control entry-debit" id="ap_trans_debit_amount" name="ap_entry[accdebit][]" ></td><td><input type="text" class="form-control entry-credit" id="ap_trans_credit_amount" name="ap_entry[acccredit][]" value=""></td><td><a href="#" class="btn-style-2 animate-4 pull-right btn-remove"><i class="fa fa-minus"></i></a></td></tr>';
		$('#tb_entries > tbody:first').prepend(data);
	});
}