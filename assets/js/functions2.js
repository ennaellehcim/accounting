function form_submit () {
	//Login JS Start
	$('.form-login').submit(function(e){
		$('.login-alert').slideUp();
		e.preventDefault();
		var loginformData = {
			'username'		: $('input[name=username]').val(),
			'pwd'			: $('input[name=pwd]').val(),
			'project_id'	: $('#project').val()
		};
		$.ajax({ 
			type: 'POST', 
			datatype:'json',
			url: site_url+'login/login_user', 
			data: loginformData,
			success: function (data) { 
				if(data.success==1){
					window.location=site_url+'site';
				}
				else{
					$('.login-alert').slideDown();
				}
			}
		});
	});
			//Login JS End

			//Account Group JS Start
			$('.accountgroup-form').submit(function(e){
				e.preventDefault();
				if ($('#accountType').val().length>0&&$('input[name=accountGroup]').val().length>0) {
					var accountgroupData = {
						'account_type'		: $('#accountType').val(),
						'accountgroup'		: $('input[name=accountGroup]').val()
					};
					$.ajax({ 
						type: 'POST', 
						datatype:'json',
						url: site_url+'system_settings/add_accountgroup', 
						data: accountgroupData,
						success: function (data) { 
							if(data.success==1){
								$(data.response).appendTo($('.accountgroup-table > tbody:last')).hide().fadeIn(1000);
								$('.accountgroup-alert-success').slideDown();
								$('.main_txtbox').val("");
								$('.accountgroup-alert-success').delay(2000).fadeOut();
							}
							else{
								$('.accountgroup-alert-warning').slideDown();
							}
						}
					});

					$('#accountGroup').val('');

				}
				else{
					jQuery("#accountGroup").addClass('error');
				};
			});
			//Account Group JS End

			//Copyrights JS Start
			$('.form-copyrights').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'system_settings/save_copyrights', 
					data: $('.form-copyrights').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.copyrights-alert-success').slideDown();
							$('.main_txtbox').val("");
						}
						else if(data.success==2){
							$('.copyrights-alert-warning').slideDown();
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});
			//Copyrights JS End


			//mainAccount JS Start
			$('.mainaccount-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'main_account/save_main_account', 
					data: $('.mainaccount-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.main-alert-success').slideDown();
							$('.main_txtbox').val("");
							$('.main-alert-success').delay(2000).fadeOut();
						}
						else if(data.success==2){
							$('.main-alert-warning').slideDown();
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			$('.searchaccount-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'main_account/search_accountcode', 
					data: $('.searchaccount-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.search-table > tbody:last').empty().fadeIn(1000);
							$(data.response).appendTo($('.search-table > tbody:last')).hide().fadeIn(1000);
						}
						else if(data.success==2){
							$('.search-alert-warning').slideDown();
							$('.search-table tbody').html('');
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			$('.mainaccount-report-print').click(function(e){
				window.open(site_url+"main_account/report_tbl?at="+$('#searchAccount_type').val()+"&ac="+$('#searchaccount_code').val()+"&atits"+$('#searchaccount_title').val(),'_blank');
			});
			//mainAccount JS End

			//Subsidiary Account JS Start

			$('.subAccount-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'subsidiary_account/save_subsidiary', 
					data: $('.subAccount-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.sub-alert-success').slideDown();
							$('.main_txtbox').val("");
						}
						else if(data.success==2){
							$('.sub-alert-warning').slideDown();
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});


			$('.searchSub-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'subsidiary_account/search_subsidiary', 
					data: $('.searchSub-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.search-table > tbody:last').empty().fadeIn(1000);
							$(data.response).appendTo($('.search-table > tbody:last')).hide().fadeIn(1000);
						}
						else if(data.success==2){
							$('.search-alert-warning').slideDown();
							$('.search-table tbody').html('');
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});
			
			$('.subaccount-report-print').click(function(e){
				window.open(site_url+"subsidiary_account/report_tbl?at="+$('#searchAccount_type').val()+"&sc="+$('#searchAccount_code').val()+"&sn="+$('#searchAccount_name').val(),'_blank');
			});

			//Subsidiary Account JS End

			//User Access JS Start
			$('.userAccess-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'user_access/save_user_access', 
					data: $('.userAccess-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.userAcc-alert-success').slideDown();
							$('.main_txtbox').val("");
							$(data.response).appendTo($('.userlist > tbody:last')).hide().fadeIn(1000);
						}
						else if(data.success==2){
							$('.userAcc-alert-warning').slideDown();
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});
			//User Access JS End



			//MASTER JS Start
			$('.master-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'master_account/save_master_account', 
					data: $('.master-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.master-alert-success').slideDown();
							$('.main_txtbox').val("");
						}
						else if(data.success==2){
							$('.master-alert-warning').slideDown();
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			$('.searchMaster-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'master_account/search_master', 
					data: $('.searchMaster-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.search-table > tbody:last').empty().fadeIn(1000);
							$(data.response).appendTo($('.search-table > tbody:last')).hide().fadeIn(1000);
						}
						else if(data.success==2){
							$('.search-alert-warning').slideDown();
							$('.search-table tbody').html('');
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			$('.masteraccount-report-print').click(function(e){
				window.open(site_url+"master_account/report_tbl?mn="+$('#searchMaster_name').val()+"&ma="+$('#searchMaster_type').val(),'_blank');
			});
			//MASTER JS End


			//BANK RECON JS Start
			$('.bank-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'bank_recon/save_bank_recon', 
					data: $('.bank-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.bank-alert-success').slideDown();
							$('.main_txtbox').val("");
						}
						else if(data.success==2){
							$('.bank-alert-warning').slideDown();
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});


			$('.searchBank-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'bank_recon/search_bank', 
					data: $('.searchBank-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.search-table > tbody:last').empty().fadeIn(1000);
							$(data.response).appendTo($('.search-table > tbody:last')).hide().fadeIn(1000);
						}
						else if(data.success==2){
							$('.search-alert-warning').slideDown();
							$('.search-table tbody').html('');
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			$('.bankRecon-report-print').click(function(e){
				window.open(site_url+"bank_recon/report_tbl?bn="+$('#searchBank_name').val()+"&bm="+$('#searchBank_month').val()+"&byr="+$('#searchBank_year').val()+"&bal="+$('#searchBank_balance').val(),'_blank');
			});
			//BANK RECON JS End

			//Journal AP JS Start
			$('.ap-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'accounts_payable/save_journal_ap', 
					data: $('.ap-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.ap-alert-success').slideDown();
							$('.main_txtbox').val("");
						}
						else if(data.success==2){
							$('.ap-alert-warning').slideDown();
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			$('.searchAP-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'accounts_payable/search_ap', 
					data: $('.searchAP-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.search-table > tbody:last').empty().fadeIn(1000);
							$(data.response).appendTo($('.search-table > tbody:last')).hide().fadeIn(1000);
						}
						else if(data.success==2){
							$('.search-alert-warning').slideDown();
							$('.search-table tbody').html('');
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			// ACCOUNTS PAYABLE - auto compute of debit credit total
			$('.ap-form').on('keyup', '.entry-debit', function () {
				$('.entry-list').each(function(){
					var totalPoints = 0;
					$(this).find('.entry-debit').each(function(){
					    totalPoints += parseFloat($(this).val()); //<==== a catch  in here !! read below
					});
					var tot_amount = accounting.formatMoney(totalPoints, {
						symbol 		: '₱',
						precision 	: 2,
						thousand  	: ',',
						decimal   	: ".",
						format: {
							pos  : '%s %v',
							zero : '%s  0',
						}
					});
					$('.entry-debit-total').val(tot_amount);
				});
			});

			$('.ap-form').on('keyup', '.entry-credit', function () {
				$('.entry-list').each(function(){
					var totalPoints = 0;
					$(this).find('.entry-credit').each(function(){
					    totalPoints += parseFloat($(this).val()); //<==== a catch  in here !! read below
					});
					var tot_amount = accounting.formatMoney(totalPoints, {
						symbol 		: '₱',
						precision 	: 2,
						thousand  	: ',',
						decimal   	: ".",
						format: {
							pos  : '%s %v',
							zero : '%s  0',
						}
					});
					$('.entry-credit-total').val(tot_amount);
				});
			});

			   // ACCOUNTS PAYABLE END OF auto compute of debit credit total

		//Journal AP JS End


			//Journal cd JS Start
			$('.cd-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'check_dis/save_journal_cd', 
					data: $('.cd-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.cd-alert-success').slideDown();
							$('.main_txtbox').val("");
						}
						else if(data.success==2){
							$('.cd-alert-warning').slideDown();
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			$('.searchCD-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'check_dis/search_cd', 
					data: $('.searchCD-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.search-table > tbody:last').empty().fadeIn(1000);
							$(data.response).appendTo($('.search-table > tbody:last')).hide().fadeIn(1000);
						}
						else if(data.success==2){
							$('.search-alert-warning').slideDown();
							$('.search-table tbody').html('');
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			// CHECK DISBURSEMENT - auto compute of debit credit total
			$('.cd-form').on('keyup', '.entry-debit', function () {
				$('.entry-list').each(function(){
					var totalPoints = 0;
					$(this).find('.entry-debit').each(function(){
					    totalPoints += parseFloat($(this).val()); //<==== a catch  in here !! read below
					});

					var tot_amount = accounting.formatMoney(totalPoints, {
						symbol 		: '₱',
						precision 	: 2,
						thousand  	: ',',
						decimal   	: ".",
						format: {
							pos  : '%s %v',
							zero : '%s  0',
						}
					});
					$('.entry-debit-total').val(tot_amount);
				});
			});

			$('.cd-form').on('keyup', '.entry-credit', function () {
				$('.entry-list').each(function(){
					var totalPoints = 0;
					$(this).find('.entry-credit').each(function(){
					    totalPoints += parseFloat($(this).val()); //<==== a catch  in here !! read below
					});
					var tot_amount = accounting.formatMoney(totalPoints, {
						symbol 		: '₱',
						precision 	: 2,
						thousand  	: ',',
						decimal   	: ".",
						format: {
							pos  : '%s %v',
							zero : '%s  0',
						}
					});
					$('.entry-credit-total').val(tot_amount);
				});
			});
			   // CHECK DISBURSEMENT END OF auto compute of debit credit total

			//Journal cd JS End

			//Journal sj JS Start
			$('.sj-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'sales_journal/save_journal_sj', 
					data: $('.sj-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.sj-alert-success').slideDown();
							$('.main_txtbox').val("");
						}
						else if(data.success==2){
							$('.sj-alert-warning').slideDown();
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});


			$('.searchSJ-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'sales_journal/search_sj', 
					data: $('.searchSJ-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.search-table > tbody:last').empty().fadeIn(1000);
							$(data.response).appendTo($('.search-table > tbody:last')).hide().fadeIn(1000);
						}
						else if(data.success==2){
							$('.search-alert-warning').slideDown();
							$('.search-table tbody').html('');
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			// SALES JOURNAL - auto compute of debit credit total
			$('.sj-form').on('keyup', '.entry-debit', function () {
				$('.entry-list').each(function(){
					var totalPoints = 0;
					$(this).find('.entry-debit').each(function(){
					    totalPoints += parseFloat($(this).val()); //<==== a catch  in here !! read below
					});
					var tot_amount = accounting.formatMoney(totalPoints, {
						symbol 		: '',
						precision 	: 2,
						thousand  	: ',',
						decimal   	: ".",
						format: {
							pos  : '%s %v',
							zero : '%s  0',
						}
					});
					$('.entry-debit-total').val(tot_amount);
				});
			});

			$('.sj-form').on('keyup', '.entry-credit', function () {
				$('.entry-list').each(function(){
					var totalPoints = 0;
					$(this).find('.entry-credit').each(function(){
					    totalPoints += parseFloat($(this).val()); //<==== a catch  in here !! read below
					});
					var tot_amount = accounting.formatMoney(totalPoints, {
						symbol 		: '',
						precision 	: 2,
						thousand  	: ',',
						decimal   	: ".",
						format: {
							pos  : '%s %v',
							zero : '%s  0',
						}
					});
					$('.entry-credit-total').val(tot_amount);
				});
			});
			   // SALES JOURNAL END OF auto compute of debit credit total

			//Journal sj JS End


			//Journal cr JS Start
			$('.cr-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'cash_receipts/save_journal_cr', 
					data: $('.cr-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.cr-alert-success').slideDown();
							$('.main_txtbox').val("");
						}
						else if(data.success==2){
							$('.cr-alert-warning').slideDown();
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			$('.searchCR-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'cash_receipts/search_cr', 
					data: $('.searchCR-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.search-table > tbody:last').empty().fadeIn(1000);
							$(data.response).appendTo($('.search-table > tbody:last')).hide().fadeIn(1000);
						}
						else if(data.success==2){
							$('.search-alert-warning').slideDown();
							$('.search-table tbody').html('');
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			//CASH RECEIPTS - auto compute of debit credit total
			$('.cr-form').on('keyup', '.entry-debit', function () {
				$('.entry-list').each(function(){
					var totalPoints = 0;
					$(this).find('.entry-debit').each(function(){
					    totalPoints += parseFloat($(this).val()); //<==== a catch  in here !! read below
					});
					var tot_amount = accounting.formatMoney(totalPoints, {
						symbol 		: '',
						precision 	: 2,
						thousand  	: ',',
						decimal   	: ".",
						format: {
							pos  : '%s %v',
							zero : '%s  0',
						}
					});
					$('.entry-debit-total').val(tot_amount);
				});
			});

			$('.cr-form').on('keyup', '.entry-credit', function () {
				$('.entry-list').each(function(){
					var totalPoints = 0;
					$(this).find('.entry-credit').each(function(){
					    totalPoints += parseFloat($(this).val()); //<==== a catch  in here !! read below
					});
					var tot_amount = accounting.formatMoney(totalPoints, {
						symbol 		: '₱',
						precision 	: 2,
						thousand  	: ',',
						decimal   	: ".",
						format: {
							pos  : '%s %v',
							zero : '%s  0',
						}
					});
					$('.entry-credit-total').val(tot_amount);
				});
			});
			   //CASH RECEIPTS END OF auto compute of debit credit total

			//Journal cr JS End

			//Journal gj JS Start
			$('.gj-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'general_journal/save_journal_gj', 
					data: $('.gj-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.gj-alert-success').slideDown();
							$('.main_txtbox').val("");
						}
						else if(data.success==2){
							$('.gj-alert-warning').slideDown();
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			$('.searchGJ-form').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'general_journal/search_gj', 
					data: $('.searchGJ-form').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.search-table > tbody:last').empty().fadeIn(1000);
							$(data.response).appendTo($('.search-table > tbody:last')).hide().fadeIn(1000);
						}
						else if(data.success==2){
							$('.search-alert-warning').slideDown();
							$('.search-table tbody').html('');
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			//GENERAL JOURNAL - auto compute of debit credit total
			$('.gj-form').on('keyup', '.entry-debit', function () {
				$('.entry-list').each(function(){
					var totalPoints = 0;
					$(this).find('.entry-debit').each(function(){
					    totalPoints += parseFloat($(this).val()); //<==== a catch  in here !! read below
					});
					var tot_amount = accounting.formatMoney(totalPoints, {
						symbol 		: '₱',
						precision 	: 2,
						thousand  	: ',',
						decimal   	: ".",
						format: {
							pos  : '%s %v',
							zero : '%s  0',
						}
					});
					$('.entry-debit-total').val(tot_amount);
				});
			});

			$('.gj-form').on('keyup', '.entry-credit', function () {
				$('.entry-list').each(function(){
					var totalPoints = 0;
					$(this).find('.entry-credit').each(function(){
					    totalPoints += parseFloat($(this).val()); //<==== a catch  in here !! read below
					});
					var tot_amount = accounting.formatMoney(totalPoints, {
						symbol 		: '₱',
						precision 	: 2,
						thousand  	: ',',
						decimal   	: ".",
						format: {
							pos  : '%s %v',
							zero : '%s  0',
						}
					});
					$('.entry-credit-total').val(tot_amount);
				});
			});
			//GENERAL JOURNAL END OF auto compute of debit credit total

			//GENERAL LEDGER 
			$('.form-gl-search').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'general_ledger/search_list', 
					data: $('.form-gl-search').serialize(),
					success: function (data) { 
						$(data.data).appendTo($('#datalist > tbody:last')).hide().fadeIn(1000);
						//$('#datalist > tbody:last').prepend(data.)
					}
				});
			});
			//GENERAL LEDGER
			//Journal gj JS End
            // aging JS
            $('.aging-report-print').click(function(e){
            	window.open(site_url+"aging/report?rt="+$('#aging_report_type').val(),'_blank');
            });
			// aging JS End

			// Management JS
			$('.management-report-print').click(function(e){
				window.open(site_url+"management/report?rt="+$('#mgt_report_type').val(),'_blank');
			});
			// Management JS End

			// chart account global module start
			$('.search-chartaccount').submit(function(e){
				e.preventDefault();
				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'site/search_chartaccount', 
					data: $('.search-chartaccount').serialize(),
					success: function (data) { 
						if(data.success==1){
							$('.tran_data').empty();
							$(data.response).appendTo($('.chart-table > tbody:last')).hide().fadeIn(1000);
						}
						else if(data.success==2){
							$('.chart-alert-warning').slideDown();
						}
						else if(data.success==3){
							for (i=0;i<=data.err.length;i++) {
								jQuery("#"+data.err[i]).addClass('error');
							};
						}
					}
				});
			});

			$('.entry-select').change(function(){
				$('.entry-text').val($(this).val().substring(0,5));

				$('.entry-subcode').val('');
				$('.entry-subname').val(null).trigger("change");

				$.ajax({ 
					type: 'POST', 
					datatype:'json',
					url: site_url+'site/get_sub', 
					data: {account_code :$('.entry-text').val()},
					success: function (data) { 
						if(data.success==1){
							$('.entry-subname').empty();			             	
							$('.entry-subname').append($(data.html));
						}
					}
				});

			});

			$('.entry-subname').change(function(){
				$('.entry-subcode').val($('.entry-subname').val());
			});
			   // chart account end

			   //adding entries
			   $('.btn-add-trans').click(function(){
			   	var e = $(this);
			   	var chckboxs = [];
			   	var checkboxElement = $("tbody.tran_data input:checked");
				   	if(checkboxElement.length){
				   		checkboxElement.each(function(){
				   			var checkEvent = $(this);
				   			var subsidiaryCode = checkEvent.data('subcode');
				   			var subsidiaryName = checkEvent.data('subname');
				   			var data = '<tr><td><input type="hidden" name="ap_entry[code][]" value="'+subsidiaryCode+'"/>'+subsidiaryCode+'</td><td><input type="hidden" name="ap_entry[accname][]" value="'+subsidiaryName+'"/>'+subsidiaryName+'</td><td><input type="text" class="form-control entry-debit" id="ap_trans_debit_amount" name="ap_entry[accdebit][]" value=""></td><td><input type="text" class="form-control entry-credit" id="ap_trans_credit_amount" name="ap_entry[acccredit][]" value=""></td><td><a href="#" class="btn-style-2 animate-4 pull-right btn-remove"><i class="fa fa-minus"></i></a></td></tr>';
				   			if (checkEvent.is(":checked")) {
				   				$('#tb_entries > tbody:last').prepend(data);
									//$( data).insertBefore( "#tb_entries > tbody > .row_total" );
									$("tbody.tran_data input:checked")[0].checked = false;
									$('.modal').modal('hide');
								}
								//$('#tb_entries > tbody:last').append(total_val); 
							});
					} else {
						$('.entries-alert-warning').slideDown();
					}
				});
				//end of adding entries

				//removing entries
				$('#tb_entries').on('click', '.btn-remove', function(){
					var e = $(this);
					e.closest('tr').remove();
				});
				//end of removing entries

				//Adding supplier name in the tbl enties
				$('.show-supplier').change(function() {
					var supp_name = $(this).val();
					var data = '<tr><td><input type="hidden" name="ap_entry[code][]" value="00000"/></td><td><input type="hidden" name="ap_entry[accname][]"  value=" '+supp_name+' "/> '+supp_name+' </td><td><input type="text" class="form-control entry-debit" id="ap_trans_debit_amount" name="ap_entry[accdebit][]" ></td><td><input type="text" class="form-control entry-credit" id="ap_trans_credit_amount" name="ap_entry[acccredit][]" value=""></td><td><a href="#" class="btn-style-2 animate-4 pull-right btn-remove"><i class="fa fa-minus"></i></a></td></tr>';
					$('#tb_entries > tbody:first').prepend(data);
				});
				// end of adding the supplier name

				//Adding expenses in the tbl enties
				$('.show-expenses').change(function() {
					var expense_name = $(this).val(); 
					var data = '<tr><td><input type="hidden" name="ap_entry[code][]" value="00000"/></td><td><input type="hidden" name="ap_entry[accname][]"  value=" '+expense_name+' "/> '+expense_name+'</td><td><input type="text" class="form-control entry-debit" id="ap_trans_debit_amount" name="ap_entry[accdebit][]" ></td><td><input type="text" class="form-control entry-credit" id="ap_trans_credit_amount" name="ap_entry[acccredit][]" value=""></td><td><a href="#" class="btn-style-2 animate-4 pull-right btn-remove"><i class="fa fa-minus"></i></a></td></tr>';
					$('#tb_entries > tbody:first').prepend(data);
				});
			}

