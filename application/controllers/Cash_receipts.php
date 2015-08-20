<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cash_receipts extends CI_Controller {
	public function index(){
		$this->load->model('journal_cr_model');
		$this->load->model('subsidiary_account_model');
		if ($this->session->userdata('islogged')) {
			$page_info = array(
								'page_tab'		=> 'Journal',
								'page_title' 	=> 'Cash Receipts' 
							);
			$this->load->view('parts/header',load_data($page_info));
			$this->load->view('parts/sidebar');
			$viewData = array(
				'journal_cr_customer' => $this->journal_cr_model->show_customer(),
				'journal_cr_bank' => $this->journal_cr_model->show_bank(),
				'account_title' => $this->subsidiary_account_model->get_accounts()
			);
			$this->load->view('modules/cash_receipts', $viewData);
			$this->load->view('parts/footer');
		}
		else{
			redirect('login');
		}
	}

	public function load_page(){
		$this->load->model('journal_cr_model');
		$this->load->model('subsidiary_account_model');
		if ($this->session->userdata('islogged')) {
			$this->session->set_userdata('page_tab', 'Journal');
			$this->session->set_userdata('page_title', 'Cash Receipts');
			$this->session->set_userdata('current_page', 'cash_receipts');
			$viewData = array(
				'journal_cr_customer' => $this->journal_cr_model->show_customer(),
				'journal_cr_bank' => $this->journal_cr_model->show_bank(),
				'account_title' => $this->subsidiary_account_model->get_accounts()
			);
			$this->load->view('modules/cash_receipts', $viewData);
		}
		else{
			redirect('login');
		}
	}

	public function save_journal_cr(){
		$this->load->model('journal_cr_model');
		$journal_cr_data = $this->input->post('cr');
		$ap_entry = $this->input->post('ap_entry');
		$err = validates(array($journal_cr_data), array());

		if (count($err)) {
			echo jcode(array(
					'success' 	=> 3,
					'err' 		=> $err
				));
		} else {
			$orNo = isset($journal_cr_data['cr_or_no']) ? $journal_cr_data['cr_or_no'] : '';
			$check_id = $this->journal_cr_model->journal_cr_exist($orNo);

			if ($check_id) {
				echo jcode(array('success' => 2));
			} else {
				$trans_data = array(
										'project_id' 				=> $this->session->userdata('project_id'),
										'cr_or_no' 					=> $journal_cr_data['cr_or_no'],
										'cr_or_date'				=> $journal_cr_data['cr_or_date'],
										'cr_master_name_customer'	=> substr($journal_cr_data['cr_master_name_customer'],5),
										'cr_sj_si_no'				=> $journal_cr_data['cr_sj_si_no'],
										'cr_master_name_bank'		=> $journal_cr_data['cr_master_name_bank'],
										'cr_cleared'				=> $journal_cr_data['cr_cleared'],
										'cr_cleared_date'			=> $journal_cr_data['cr_cleared_date'],
										'cr_or_amount'				=> $journal_cr_data['cr_or_amount'],
										'cr_particulars'			=> $journal_cr_data['cr_particulars'],
										'total_debit'				=> $journal_cr_data['total_debit'],
										'total_credit'				=> $journal_cr_data['total_credit']

									);
				$trans_id = $this->journal_cr_model->journal_cr_add($trans_data);

				for ($i = 0;$i<count($ap_entry['code']);$i++) {						
						$data = array(
												'cr_id' 				=> $trans_id, 
												'project_id'			=> $this->session->userdata('project_id'),
												'cr_trans_account_code' => $ap_entry['code'][$i],
												'cr_trans_sub_name'		=> $ap_entry['accname'][$i],
												'cr_trans_dr'			=> $ap_entry['accdebit'][$i],
												'cr_trans_cr'			=> $ap_entry['acccredit'][$i]
											);
						$this->journal_cr_model->journal_cr_trans_add($data);
				}
				echo jcode(array('success' => 1));
			}
			
		}
		
	}

	public function search_cr(){
		$this->load->model('journal_cr_model');
		$account_search = $this->input->post('searchCR');
		$data = $this->journal_cr_model->journal_cr_get($account_search['searchCR_orNo'],$account_search['searchCR_date']);
		$html = "";

		$err = validates(array($account_search), array());
		
		if (count($err)) {
			if ($err<1) {
				echo jcode(array(
					'success' 	=> 3,
					'err' 		=> $err
					));
			} else {
				if (!$data->num_rows()) {
					echo jcode(array(
						'success' 	=> 2
						));
				} else {
					foreach ($data->result() as $key) {
						$html .="
						<tr>
							<td>".$key->cr_or_no."</td>
							<td>".$key->cr_or_date."</td>
							<td>".$key->cr_master_name_customer."</td>
							<td>".$key->cr_particulars."</td>
							<td>".$key->cr_or_amount."</td>
							<td><a href='#' data-id='$key->cr_id' class='btn-style-1 account-report-print animate-4 pull-left'><i class='fa fa-print'></i></a></td>
						</tr>
						";
					}
					echo jcode(array('success' => 1,'response' => $html));
				}
				
			}
		}
	}

	public function cr_report(){
		$this->load->model('journal_cr_model');
		if ($this->session->userdata('islogged')) {
			$id = (int)$this->input->get('id');
			$html = $this->config->item('report_header');
			$viewData = array(
				'cr_entries' => $this->journal_cr_model->journal_get_entries($id)
				);
			$html.= $this->load->view('report/cr_entries', $viewData, true);
			$html.= $this->config->item('report_footer');
			pdf_create($html, 'EPS-Accounting-Report');
		}else {
			redirect('login');
		}
	}

	public function cr_summary_report(){
		$this->load->model("journal_cr_model");
		if ($this->session->userdata('islogged')) {
			$cr_or_no 	= $this->input->get('or');
			$cr_or_date	= $this->input->get('ord');
			$html = $this->config->item('report_header');
			$data = array(
					'accounts' => $this->journal_cr_model->journal_cr_get($cr_or_no,$cr_or_date)->result()
				);
			$html.= $this->load->view('report/cr_search_report', $data, true);
			$html.= $this->config->item('report_footer');
			pdf_create($html, 'filename');
		}
		else{
			redirect('login');
		}
	}
}
