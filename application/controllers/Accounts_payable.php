<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_payable extends CI_Controller {
	
	public function index(){
		$this->load->model('journal_ap_model');
		$this->load->model('bank_recon_model');
		$this->load->model('subsidiary_account_model');
		if ($this->session->userdata('islogged')) {
			$page_info = array(
				'page_tab' 		=> 'Journal',
				'page_title'	=> 'Accounts Payable' 
				);
			$this->load->view('parts/header',load_data($page_info));
			$this->load->view('parts/sidebar');
			$viewData = array(
				'accounts_payable' => $this->journal_ap_model->show_expense_name(),
				'bank_recon' => $this->bank_recon_model->show_supplier(),
				'account_title' => $this->subsidiary_account_model->get_accounts()
				);
			$this->load->view('modules/accounts_payable', $viewData);
			$this->load->view('parts/footer');
		}
		else{
			redirect('login');
		}
	}

	public function load_page(){
		$this->load->model('journal_ap_model');
		$this->load->model('bank_recon_model');
		$this->load->model('subsidiary_account_model');
		if ($this->session->userdata('islogged')) {
			$this->session->set_userdata('page_tab', 'Journal');
			$this->session->set_userdata('page_title', 'Accounts Payable');
			$this->session->set_userdata('current_page', 'accounts_payable');
			$viewData = array(
				'accounts_payable' => $this->journal_ap_model->show_expense_name(),
				'bank_recon' => $this->bank_recon_model->show_supplier(),
				'account_title' => $this->subsidiary_account_model->get_accounts()
				);
			$this->load->view('modules/accounts_payable', $viewData);
		}else{
			redirect('login');
		}
	}

	public function save_journal_ap(){
		$this->load->model('journal_ap_model');
		$journal_ap_data = $this->input->post('ap');
		$ap_entry = $this->input->post('ap_entry');
		$err = validates(array($journal_ap_data), array());

		if (count($err)) {
			echo jcode(array(
				'success' => 3, 
				'err' 	  => $err
				)
			);
		} else {

			$invNo = isset($journal_ap_data['ap_invoice_no']) ? $journal_ap_data['ap_invoice_no']: '';
			$check_id = $this->journal_ap_model->journal_ap_exist($invNo);
			
			if ($check_id) {
				echo jcode(array('success' => 2));
			} else {
				$trans_data = array(
					'project_id' 		=> $this->session->userdata('project_id'),
					'ap_invoice_no' 	=> $journal_ap_data['ap_invoice_no'],
					'ap_invoice_date'	=> $journal_ap_data['ap_invoice_date'],
					'ap_po_no'			=> $journal_ap_data['ap_po_no'],
					'ap_master_name'	=> substr($journal_ap_data['ap_master_name'],5),
					'ap_invoice_amount'	=> $journal_ap_data['ap_invoice_amount'],
					'ap_particulars'	=> $journal_ap_data['ap_particulars'],
					'total_debit'		=> $journal_ap_data['total_debit'],
					'total_credit'		=> $journal_ap_data['total_credit']
					);
				$trans_id = $this->journal_ap_model->journal_ap_add($trans_data);

				for ($i = 0;$i<count($ap_entry['code']);$i++) {						
					$data = array(
						'ap_id' 				=> $trans_id, 
						'project_id'			=> $this->session->userdata('project_id'),
						'ap_trans_account_code' => $ap_entry['code'][$i],
						'ap_trans_sub_name'		=> $ap_entry['accname'][$i],
						'ap_trans_dr'			=> $ap_entry['accdebit'][$i],
						'ap_trans_cr'			=> $ap_entry['acccredit'][$i]
						);
					$this->journal_ap_model->journal_ap_trans_add($data);
				}
				echo jcode(array('success' => 1));
			}
			
		}
	}

	public function search_ap(){
		$this->load->model('journal_ap_model');
		$account_search = $this->input->post('searchAP');
		$data = $this->journal_ap_model->journal_ap_get($account_search['searchAP_invNo'], $account_search['searchAP_date'], $account_search['searchAP_suppName'], $account_search['searchAP_po']);
		$html = "";

		$err = validates(array($account_search), array());
		
		
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
						<td>".$key->ap_invoice_no."</td>
						<td>".$key->ap_invoice_date."</td>
						<td>".$key->ap_master_name."</td>
						<td>".$key->ap_particulars."</td>
						<td>".$key->ap_invoice_amount."</td>
						<td><a href='#' data-id='$key->ap_id' class='btn-style-1 animate-4 pull-left account-report-print'><i class='fa fa-print'></i></a></td>
					</tr>
					";
				}
				echo jcode(array('success' => 1,'response' => $html));
			}

		}
		
	}

	public function ap_report(){
		$this->load->model('journal_ap_model');
		if ($this->session->userdata('islogged')) {
			$id = (int)$this->input->get('id');
			$html = $this->config->item('report_header');
			$viewData = array(
				'ap_entries' => $this->journal_ap_model->journal_get_entries($id)
				);
			$html.= $this->load->view('report/ap_entries', $viewData, true);
			$html.= $this->config->item('report_footer');
			pdf_create($html, 'EPS-Accounting-Report');
		}else {
			redirect('login');
		}
	}

	public function ap_summary_report(){
		$this->load->model("journal_ap_model");
		if ($this->session->userdata('islogged')) {
			
			$ap_invoice_no 		= $this->input->get('in');
			$ap_invoice_date 	= $this->input->get('invd');
			$ap_master_name 	= $this->input->get('mn');
			$ap_po_no 			= $this->input->get('po');
			$html = $this->config->item('report_header');

			$data = array(
					'accounts' => $this->journal_ap_model->journal_ap_get($ap_invoice_no,$ap_invoice_date,$ap_master_name,$ap_po_no)->result()
				);
			$html.= $this->load->view('report/ap_search_report', $data, true);
			$html.= $this->config->item('report_footer');
			pdf_create($html, 'filename');
		}
		else{
			redirect('login');
		}
	}
	
}
